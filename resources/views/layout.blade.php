<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('scriptsjs')
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5">
        <button class="navbar-toggler" style="border-color: blue;" type="button" data-toggle="collapse"
            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">E-commerce</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('categoria') }}" class="nav-item nav-link">Categorias</a>
                <a href="{{ route('cadastrar') }}" class="nav-item nav-link">Cadastrar</a>
            </div>
        </div>
        <a href="{{ route('ver_carrinho') }}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
    </nav>

    <div class="container mt-4">
        <div class="row">
            @if ($message = Session::get('err'))
                <div class="col-12">

                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
            @endif

            @if ($message = Session::get('ok'))
                <div class="col-12">

                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                </div>
            @endif


            <!-- Conteúdo da página -->
            @yield('conteudo')
        </div>
    </div>

    <!-- Scripts necessários para o funcionamento do Bootstrap -->

</body>

</html>
