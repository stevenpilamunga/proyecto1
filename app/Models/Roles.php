<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $table='roles';
    protected $primaryKey='rol_id';
    
    public $fillable = [ 
        'rol_descripcion',  
    ];
    protected $cast=[
    'rol_descripcion'=>'string'
    ];
}
