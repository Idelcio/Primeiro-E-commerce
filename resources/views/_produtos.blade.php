@if (isset($lista))
    <div class="row">
        @foreach ($lista as $prod)
            <div class="col-12 col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset($prod->foto) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $prod->nome }} - R$ {{ $prod->valor }}</h5>
                        <a href="{{ route('adicinar_carrinho', ['idproduto' => $prod->id]) }}"
                            class="btn btn-sm btn-secondary">Adicionar Item</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
