<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = '/home'; // Esta propiedad indica a dónde redirigir después del inicio de sesión
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'redirectTo' => $this->redirectTo, // Devuelve la ruta de redirección después del inicio de sesión
            ]);
        } else {
            // Autenticación fallida
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas',
            ], 401); // 401 indica no autorizado, pero puedes ajustar según tus necesidades
        }
    }
}
