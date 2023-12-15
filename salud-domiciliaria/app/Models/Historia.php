<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;

    protected $fillable = [
        "profesional_id",
        "paciente_id",
        "estado",
        "antecedentes",
        "evolucion",
        "concepto",
        "recomendaciones",
        "firma"
    ];

    public function profesional(){

        return $this->belongsTo(User::class, 'profesional_id');

    }

    public function paciente(){

        return $this->belongsTo(User::class, 'paciente_id');

    }
}
