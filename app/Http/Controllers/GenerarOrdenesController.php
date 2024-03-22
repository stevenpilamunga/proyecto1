<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use DB;

class GenerarOrdenesController extends Controller


{
   
    public function index(Request $rq)
    {
      
    $periodos=DB::select("SELECT * FROM aniolectivo");
    $jornadas=DB::select("SELECT * FROM jornadas");
    $meses=$this->meses();
       return view('generarordenes.index')
        ->with('periodos', $periodos)
        ->with('jornadas', $jornadas)
        ->with('meses', $meses);
        
    
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
       

    }

    /**
     * Display the specified resource.   
     */
    public function show(string $id)
    {
        //
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

    
    private function meses()
    {
        $meses = [];
    
        for ($i = 1; $i <= 12; $i++) {
            $meses[] = Carbon::create()->month($i)->locale('es')->format('F');
    
        }
    
        return $meses;
    }

    public function generarOrdenes(Request $rq)
    {
        $datos=$rq->all();
       $anl_id=$datos['anl_id']; ///AÑO LECTIVO
       $jor_id=$datos['jor_id']; ///JORNADA
       $mes=$datos['mes']; ///MES

        $estudiantes=DB::select("SELECT * FROM matriculas m
                        Join estudiantes e ON m.est_id=e.id
                                WHERE m.anl_id=$anl_id
                                AND m.jor_id=$jor_id
                                AND m.mat_estado=1
                                        ");
      dd($estudiantes);

    
    }
    
}
