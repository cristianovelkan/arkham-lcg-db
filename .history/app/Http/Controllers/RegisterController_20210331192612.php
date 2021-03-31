<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6',
                'name' => 'required|min:3',
            ], [
                'email.required' => "O email deve ser fornecido.",
                'email.unique' => "Já existe uma conta para o email informado.",
                'email.email' => "O email informado é inválido.",
                'password.required' => "Você deve informar a senha",
                'password.min' => "Você deve informar uma senha com 6 caracteres",
                'name.required' => "Você deve informar um nome",
                'name.min' => "Você deve informar um nome maior.",
            ]);

            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }

            return $request->all();
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'status' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    //
}
