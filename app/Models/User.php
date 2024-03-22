<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
       protected $primaryKey='usu_id';

    protected $filiables = [
        'rol_id',
        'name',
        'usu_nombres',
        'email',
        'password',
        'usu_telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    'rol_id'=>'integer',
    'email_verified_at' => 'datetime',
    'usu_nombres'=>'string',
    'usu_telefono'=>'string',
    'password' => 'hashed',
    ];
}
