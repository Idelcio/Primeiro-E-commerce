@extends('layout')
@section('conteudo')

    <div class="col-12">
        <h2 class="mb-3">Logar</h2>
        <form action="{{ route('logar') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="cpf">Login</label>
                <input type="cpf" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Logar</button>
        </form>
    </div>
@endsection
