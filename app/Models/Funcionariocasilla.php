<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcionariocasilla
 * 
 * @property int $id
 * @property int $funcionario_id
 * @property int $casilla_id
 * @property int $rol_id
 * @property int $eleccion_id
 * 
 * @property Casilla $casilla
 * @property Eleccion $eleccion
 * @property Funcionario $funcionario
 * @property Rol $rol
 *
 * @package App\Models
 */
class Funcionariocasilla extends Model
{
	protected $table = 'funcionariocasilla';
	public $timestamps = false;

	protected $casts = [
		'funcionario_id' => 'int',
		'casilla_id' => 'int',
		'rol_id' => 'int',
		'eleccion_id' => 'int'
	];

	protected $fillable = [
		'funcionario_id',
		'casilla_id',
		'rol_id',
		'eleccion_id'
	];

	public function casilla()
	{
		return $this->belongsTo(Casilla::class);
	}

	public function eleccion()
	{
		return $this->belongsTo(Eleccion::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}

	public function rol()
	{
		return $this->belongsTo(Rol::class);
	}
}
