<?php

use App\Http\Controllers\Api\HistoriaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Historia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])
    ->get('/user', function (Request $request) {
    return $request->user();
    }
);

Route::group(['middleware' => ['auth']], function(){
    
    Route::get('pacientes', [UserController::class, 'indexPacientes']);
    Route::get('historia/{id}', [HistoriaController::class, 'indexPaciente']);
    Route::get('paciente/{id}', [UserController::class, 'showUser']);    
    Route::post('historia', [HistoriaController::class, 'store']);
    Route::get('firmar-historia/{id}', [HistoriaController::class, 'show']);
    Route::put('historia-update/{id}', [HistoriaController::class, 'update']);
    Route::put('user-update/{id}', [UserController::class, 'update']);
    Route::get('user-show/{id}', [UserController::class, 'showUser']); 
    Route::put('password-change/{id}', [UserController::class, 'passwordChange']); 
       
});

    Route::post('register', [RegisteredUserController::class, 'store']);
