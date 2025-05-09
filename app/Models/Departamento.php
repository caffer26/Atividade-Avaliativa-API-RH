<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionario;

class Departamento extends Model
{
    protected $table = 'Departmentos';
    protected $fillable = ['nome'];

    public function employees()
    {
        return $this->hasMany(Funcionario::class);
    }
}
