<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; // Adicione esta linha

class UsuarioController extends Controller
{
    public function logar(Request $request)
    {
        $data = [];

        if ($request->isMethod('post')) {
            $login = $request->input('login');
            $senha = $request->input('senha');

            $credentials = ['login' => $login, 'password' => $senha];

            if (Auth::attempt($credentials)) {

                return redirect()->route('home');


            } else {

                dd($credentials);
                $request->session()->flash('err', 'Usuário ou senha inválidos');
                return redirect()->route('logar');
            }
        }

        return view('logar', $data);
    }


}
