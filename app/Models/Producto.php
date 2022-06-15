<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $tipo
 * @property $genero
 * @property $precio
 * @property $marca
 * @property $color
 * @property $talle
 * @property $foto
 * @property $categoria
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'tipo' => 'required',
		'genero' => 'required',
		'precio' => 'required',
		'marca' => 'required',
		'color' => 'required',
		'talle' => 'required',
		'foto',
    'stock' => 'required',
		'categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo','genero','precio','marca','color','talle','foto','stock','categoria'];



}
