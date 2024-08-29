<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        // buscar todos os produtos
        $listaProdutos = Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }

    public function categoria(Request $request, $idcategoria = 0)
    {
        $data = [];

        // select * from categorias
        $listaCategoria = Categoria::all();

        // select * from produtos limit 4
        $queryProduto = Produto::limit(4);

        if ($idcategoria != 0) {
            // select * from produtos where categoria_id = $idcategoria
            $queryProduto->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategorias"] = $listaCategoria;
        $data["idcategoria"] = $idcategoria;

        return view("categoria", $data);
    }

    public function adicionarCarrinho(Request $request, $idproduto = 0)
    {
        $data = [];

        // select * from produtos where id = $idproduto
        $prod = Produto::find($idproduto);

        if ($prod) {
            //Encontrou um produto


            // buscar da sessão o carrinho
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }

        return redirect()->route("home");
    }

    public function verCarrinho(Request $request)
    {


        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];

        return view("carrinho", $data);
    }


    public function excluirCarrinho(Request $request, $indice = 0)
    {
        $carrinho = session('cart', []);

        //verifica se o indice existe no array

        if (isset($carrinho[$indice])) {
            unset($carrinho[$indice]); //remove o item do array
        }

        session(['cart' => $carrinho]); //atualiza a sessão

        return redirect()->route("ver_carrinho");
    }
}
