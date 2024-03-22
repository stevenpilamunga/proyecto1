<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerarOrdenes extends Model
{
    use HasFactory;
    protected $table='GenerarOrdenes';

    protected $primaryKey='ord_id';

    public $timestamps=false;

   

    protected $filiable =[
        'mat_id' ,
        'codigo' ,
        'fecha_registro' ,
        'valor_pagar' ,
        'fecha_pago' ,
        'valor_pagado' ,
        'estado' ,
        'mes' ,
        'responsable' ,
        'secuencial' ,
        'documento' ,
    ];


 public function matricula()
 {
    return $this->belongsTo(Matricula::class,'mat_id','id');
 }




}
