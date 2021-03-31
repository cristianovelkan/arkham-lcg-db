<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|exists:users|email',
                'password' => 'required',
            ], [
                'email.required' => "O email deve ser fornecido.",
                'email.exists' => "Não existe nenhuma conta para o email informado.",
                'email.email' => "O email informado é inválido.",
                'password.required' => "Você deve informar a senha",
            ]);

            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }

            return $response;
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'status' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }

    }

    //
}
