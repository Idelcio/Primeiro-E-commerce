<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Adicionada a importação correta do Log

class ClienteService
{
    public function salvarUsuario(Usuario $user, Endereco $endereco)
    {
        try {

            $dbUsuario = Usuario::where('login', $user->login)->first(); // Verifica se o usuário já existe

            if ($dbUsuario) {
                return ['status' => 'err', 'message' => 'Usuário já cadastrado'];
            }



            DB::beginTransaction(); // Inicia a transação

            $user->save(); // Salva o usuário
            $endereco->usuario_id = $user->id; // Pega o id do usuário e salva no endereço
            $endereco->save(); // Salva o endereço
            DB::commit(); // Finaliza a transação

            return ['status' => 'ok', 'message' => 'Usuário cadastrado com sucesso'];
        } catch (\Exception $e) {
            // Tratar erro
            Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario', 'message' => $e->getMessage()]);
            DB::rollBack(); // Desfaz a transação
            return ['status' => 'err', 'message' => 'Não foi possível cadastrar o usuário'];
        }
    }
}
