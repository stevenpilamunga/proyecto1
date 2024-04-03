<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class GenerarOrdenes extends Model
{
    
    protected $table='ordenes_generadas';

    protected $primaryKey='ord_id';

    public $timestamps=false;



    protected $fillable = [
        'mat_id', // Agrega 'mat_id' aquí
        // Agrega otros campos que desees permitir asignación masiva
        'fecha',
        'mes',
        'codigo',
        'valor',
        'fecha_pago',
        'tipo',
        'estado',
        'responsable',
        'obs',
        'identificador',
        'motivo',
        'vpagado',
        'f_acuerdo',
        'ac_no',
        'especial_code',
        'especial',
        'numero_documento',
    ];

    public function matricula()
    {
        return $this->belongsTo(Matricula::class,'mat_id','id');
    }
    

    use HasFactory;
}
