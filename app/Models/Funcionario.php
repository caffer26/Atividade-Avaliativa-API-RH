<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;

class Funcionario extends Model
{
    protected $table = 'Funcionarios';
    protected $fillable = ['nome', 'email', 'id_departamento'];

    public function department()
    {
        return $this->belongsTo(Departamento::class);
    }
}
