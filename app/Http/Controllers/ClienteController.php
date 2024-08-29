<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\ClienteService;


class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $data = [];

        return view("cadastrar", $data);
    }

    public function cadastrarCliente(Request $request)
    {
        $values = $request->all();
        $usuario = new Usuario();
        $usuario->fill($values);
        $usuario->login = $request->input("cpf", "");

        $senha = $request->input("password", "");
        $usuario->password = Hash::make($senha); //criptografando a senha

        $endereco = new Endereco($values);
        $endereco->logradouro = $request->input("endereco", "");

        /* try {
            DB::beginTransaction(); //iniciar uma transação
            $usuario->save();
            $endereco->usuario_id = $usuario->id;
            $endereco->save();
            DB::commit(); //confirmando a transação
        } catch (\Exception $e) {

            DB::rollBack(); //desfaz a transação
        }
        */

        $clienteService = new ClienteService();
        $result = $clienteService->salvarUsuario($usuario, $endereco);


        $message = $result["message"];
        $status = $result["status"];

        $request->session()->flash($status, $message);




        return redirect()->route("cadastrar");
    }
}
