<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    
    public function indexPacientes(){

        $pacientes = User::where('is_profesional', 0)->get();

        return response()->json($pacientes);

    }

    public function showUser($id){

        $paciente = User::find($id);

        return response()->json($paciente);

    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         $user = User::find($id);  
         $user->name = $request->get('name');
         $user->last_name = $request->get('last_name');
         $user->email = $request->get('email');
         $user->ubicacion = $request->get('ubicacion');
         $user->celular = $request->get('celular');

         if($request->get('password') != null){
         
            $user->password = Hash::make($request->get('password'));
            $user->password_change_at = Carbon::now();

        }else{

         unset($user->password);   
         
        }
        
        $user->save();

        return response()->json([

            "user" => $user

        ]);        

    }

    public function passwordChange(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::find($id);           
         
        $user->password = Hash::make($request->get('password'));
        $user->password_change_at = Carbon::now();
        
        $user->save();

        return response()->json([

            "user" => $user

        ]);        

    }
}
