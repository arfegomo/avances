<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Historia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoriaController extends Controller
{
    public function indexPaciente($id){

        $historias = Historia::with("profesional")
                                ->with("paciente")
                                ->where('paciente_id', $id)
                                ->get();

        return response()->json($historias);

    }

    public function store(Request $request){

        $historia = Historia::create($request->post());

        return response()->json([

            "historia" => $historia

        ]);

    }

    public function show($id){
        
        $historia = Historia::with('paciente')
                                ->where('id',$id)
                                ->first();

        return response()->json($historia);
        
    }

    public function update(Request $request, $id)
    {
         
        //$image = $request->file('firma')->store('public/firmas');

        $historia = Historia::find($id);  
        $historia->estado = $request->get('estado');
        $historia->firma = $request->get('firma');
        
        $historia->save();

        return response()->json([

            "historia" => $historia

        ]);        

    }
}
