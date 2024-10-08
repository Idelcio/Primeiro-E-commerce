@extends('layout')
@section('conteudo')
    <h3>Carrinho</h3>

    @if (isset($cart) && count($cart) > 0) // Verifica se existe itens no carrinho
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $indice => $p)
                    <tr>
                        <th>

                            <a href="{{ route('carrinho_excluir', ['indice' => $indice]) }}"
                                class="btn btn-sm btn-danger">Remover</a>
                        </th>
                        <td>{{ $p->nome }}</td>
                        <td> <img src="{{ asset($p->foto) }}" height="50"></td>
                        <td>{{ $p->valor }}</td>
                        <td>{{ $p->descricao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum item no carrinho</p>
    @endif
@endsection
