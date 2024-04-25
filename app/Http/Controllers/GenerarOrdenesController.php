<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdenesExport;
use Illuminate\Http\Request;
use App\Models\GenerarOrdenes;
use DB;
use Auth;


class GenerarOrdenesController extends Controller

{
    /**
     * Display a listing of the resource.
     * 
     
     */
    public function index(Request $rq) 
    {
        //

        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $meses=$this->meses();
        $ordenes=DB::select("SELECT o.especial,fecha,j.jor_descripcion,o.mes,a.anl_descripcion
        FROM ordenes_generadas o
        JOIN matriculas m ON m.id=mat_id
        JOIN jornadas j ON j.id=m.jor_id
        JOIN aniolectivo a ON a.id=m.anl_id
        GROUP BY o.especial,o.fecha,
        j.jor_descripcion,
        o.mes,
        a.anl_descripcion
        ORDEr BY o.especial
        
        ");
        // $meses=$this->meses();
        return view('generarordenes.index')
        ->with('periodos',$periodos)
        ->with('jornadas',$jornadas)
        ->with('meses',$meses)
        ->with('ordenes',$ordenes);
        


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($especial)
{
    // Define la consulta SQL con un marcador de posición para el parámetro $especial
    $query = "SELECT * FROM ordenes_generadas o
              JOIN matriculas m ON o.mat_id = m.id
              JOIN estudiantes e ON m.est_id = e.id
              JOIN jornadas j ON m.jor_id = j.id
              JOIN especialidades es ON m.esp_id = es.id
              JOIN cursos c ON m.cur_id = c.id
              WHERE especial = ?";

    // Ejecuta la consulta pasando el parámetro $especial como segundo argumento
    $ordenes = DB::select($query, [$especial]);

    // Muestra los resultados


       return view('generarordenes.show')
    ->with('ordenes',$ordenes);
      
    } 
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function meses(){
        return[

            '1'=>'Enero',
            '2'=>'Febrero',
            '3'=>'Marzo',
            '4'=>'Abril',
            '5'=>'Mayo',
            '6'=>'Junio',
            '7'=>'Julio',
            '8'=>'Agosto',
            '9'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre'
        ];
        return $meses;
    }

    public function mesesLetras($nmes){
     $result=" ";
     $nmes==1?$result="E":"";
     $nmes==2?$result="F":"";
     $nmes==3?$result="M":"";
     $nmes==4?$result="A":"";
     $nmes==5?$result="MY":"";
     $nmes==6?$result="J":"";
     $nmes==7?$result="JL":"";
     $nmes==8?$result="AG":"";
     $nmes==9?$result="S":"";
     $nmes==10?$result="O":"";
     $nmes==11?$result="N":"";
     $nmes==12?$result="D":"";
    // 
    }

    public function generarOrdenes(Request $rq){
        $datos=$rq->all();
        $anl_id=$datos['anl_id'];
        $jor_id=$datos['jor_id'];
        $mes=$datos['mes'];


        $nmes=$this->mesesLetras($mes);
        $campus="G";
       
        $validar=DB::select("SELECT * FROM ordenes_generadas o
        JOIN matriculas m ON m.id=o.mat_id
        WHERE m.anl_id=$anl_id 
        AND m.jor_id=$jor_id
        AND o.mes=$mes");
        if(empty($validar)){
 
            $secuenciales=DB::selectone("SELECT max(especial) as secuencial from ordenes_generadas");

            $sec = $secuenciales->secuencial + 1;
    
    
            $estudiantes=DB::select("SELECT *, m.id AS mat_id FROM matriculas m 
            JOIN estudiantes e ON m.est_id=e.id
            JOIN jornadas j ON m.jor_id=j.id
            JOIN cursos c ON m.cur_id=c.id
            JOIN especialidades es ON m.esp_id=es.id
            WHERE m.anl_id=$anl_id
            AND m.jor_id=$jor_id
            AND m.mat_estado=1 
    ");
            $valor_pagar=75;
            
            
                foreach($estudiantes as $e)
                {
                   
    
                    $input['mat_id']=$e->mat_id; //id de la matricula
                    $input['fecha']=date('y-m-d');
                    $input['mes']=$mes;
                    $input['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id;   //MGM3IF-MAT_ID
                    $input['valor']=$valor_pagar;//
                    $input['fecha_pago']=NULL;//da el banco
                    $input['tipo']=NULL;
                    $input['estado']=0;//0=pendiente;pagado=1
                    $input['responsable']=Auth::user()->usu_nombres;//nomrbe del responsable
                    $input['obs']=NULL;
                    $input['identificador']=NULL;
                    $input['motivo']=NULL;
                    $input['vpagado']=0;//da el banco
                    $input['f_acuerdo']=NULL;
                    $input['ac_no']=NULL;
                    $input['especial_code']=NULL;
                    $input['especial']=$sec;//
                    $input['numero_documento']=NULL;//numero de edocumento que pago el usuario
                    GenerarOrdenes::create($input);
                    
    
                }
                return redirect(route('generar_ordenes') );
    
    
        }else {
            dd("YA EXISTE");
        }
}
public function eliminaorden(Request $rq){
  $dt=$rq->all(); 
  $especial=$dt['especial'];
  $ordenes=GenerarOrdenes::where('especial',$especial)->delete();
  return redirect(route('generar_ordenes'));
}
public function mostrar($secuencial){
    $estudiantes=DB::select("SELECT * from ordenes_generadas o 
                            JOIN matriculas m ON m.id=o.mat_id
                            JOIN estudiantes e ON e.id=m.est_id
                            JOIN especialidades esp ON esp.id = m.esp_id
                            JOIN cursos cur ON cur.id = m.cur_id
                            JOIN jornadas jor ON jor.id=m.jor_id
                            where secuencial=$secuencial
                            order by e.est_nombres
                            limit 20
                 ");
    return view('generaOrdenes.mostrar')
        ->with('estudiantes', $estudiantes)
        ->with('secuencial', $secuencial);
}

public function buscar(Request $rq) {

    // Realiza la consulta utilizando el valor de $dato
    $dato=($rq->buscar);
    $secuencial=($rq->secuencial);
    $estudiantes = DB::select("SELECT * 
                            FROM ordenes_generadas o
                            JOIN matriculas m ON m.id = o.mat_id
                            JOIN estudiantes e ON e.id = m.est_id
                            JOIN especialidades esp ON esp.id = m.esp_id
                            JOIN cursos cur ON cur.id = m.cur_id
                            JOIN jornadas jor ON jor.id=m.jor_id
                            WHERE (UPPER(e.est_nombres) LIKE UPPER('%$dato%') OR UPPER(e.est_apellidos) LIKE UPPER('%$dato%')) AND secuencial=$secuencial;
    ");

    // Pasa los resultados de la consulta y $dato a la vista
    return view('generaOrdenes.buscar')
        ->with('estudiantes', $estudiantes)
        ->with('secuencial', $secuencial);
}
 



//excel


// return Excel::download(new ordenesExportar($secuencial), 'ordenes.xlsx');
public function exportarOrdenes($especial)
{
// $orden = GeneraOrdenes::where('secuencial', $secuencial)->get();
$ordenes = GenerarOrdenes::select(
DB::raw("'CO' as CO"),
'estudiantes.est_cedula',
'ordenes_generadas.codigo'
)
->join('matriculas', 'matriculas.id', '=', 'ordenes_generadas.mat_id')
->join('estudiantes', 'estudiantes.id', '=', 'matriculas.est_id')
->where('ordenes_generadas.especial', $especial)
->get();




// dd($orden);


return Excel::download(new OrdenesExport($ordenes), 'ordenes.xlsx');
}
}
