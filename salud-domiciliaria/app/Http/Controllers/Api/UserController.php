<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function indexPacientes(){

        $pacientes = User::where('is_profesional', 0)->get();

        return response()->json($pacientes);

    }

    public function showPaciente($id){

        $paciente = User::find($id);

        return response()->json($paciente);

    }
}
