<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelsFuncao extends Model
{
    protected $table='funcao';

    public function relUser()
    {
        return $this->hasMany('App\User', 'funcao_id');
    }
}
