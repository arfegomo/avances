<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        try {
            
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'identificacion' => ['required', 'unique:'.User::class],
                'is_profesional' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                //'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'identificacion' => $request->identificacion,
                'celular' => $request->celular,
                'ubicacion' => $request->ubicacion,
                'is_profesional' => $request->is_profesional,
                'email' => $request->email,
                'password' => Hash::make($request->identificacion),
            ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return response()->noContent();

        } catch (\Throwable $th) {
            //throw $th;

            return response($th);
        }
        

    }

}
