<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jugador
 *
 * @property $id
 * @property $Nombre
 * @property $Apellido
 * @property $Posicion
 * @property $Dorsal
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jugador extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre', 'Apellido', 'Posicion', 'Dorsal'];



}
