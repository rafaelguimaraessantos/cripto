<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function generateToken(){
            $key = "segredo";
            $payload = [
                "iat" => time(),
                "exp" => time() + 3600,
                "sub" => "teste",
            ];

            // Adiciona o algoritmo como o terceiro argumento e o keyId como null
            $jwt = JWT::encode($payload, $key, 'HS256', null);

            // Definir o cookie com o JWT
            return response()->json(['token' => $jwt])
                ->cookie('auth_token', $jwt, 60); // 60 minutos
        }



   public function decodeToken(Request $request){
        $key = "segredo";

        if ($request->hasCookie('auth_token')) {
            $token = $request->cookie('auth_token');
            try {
                // Decodifique o token sem passar cabeçalhos
                $decoded = JWT::decode($token, new \Firebase\JWT\Key($key, 'HS256'));
                return response()->json(['decoded' => $decoded]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 401);
            }
        }

        return response()->json(['error' => 'Token não encontrado'], 401);
    }


}
