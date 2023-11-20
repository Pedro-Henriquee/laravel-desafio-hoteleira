@extends('layouts.main')

@section('title', 'Quartos - Hoteleira')

@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um quarto</h1>
        <form action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurando pela data...">
        </form>
    </div>
    <div id="quartos-container" class="col-md-12">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Quartos disponíveis</h2>
        @endif
            <div id="cards-container" class="row">
        @foreach($quartos as $quarto)
            <div class="card col-md-3">
                <img src="/img/quartos/{{ $quarto->image }}" alt="quarto">
                <div class="card-body">
                    <p class="card-date">{{ \Carbon\Carbon::parse($quarto->created_at)->format('d/m/Y') }}</p>
                    <h5 class="card-number">Número: {{ $quarto->numero }}</h5>
                    <p class="card-capacity">Capacidade de pessoas: {{ $quarto->capacidade }}</p>
                    <p class="card-price">Preço diária: R${{ $quarto->preco_diaria }}</p>
                    <a href="/quartos/{{ $quarto->id }}" class="btn btn-warning reserve-btn"><ion-icon name="arrow-redo-circle-outline"></ion-icon>Reservar</a>
                    <a href="quartos/edit/{{ $quarto->id }}" class="btn btn-secondary edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                </div>
            </div>
        @endforeach
            @if(count($quartos) == 0 && $search)
                <p style="padding-left: 7px;">Não foi possível encontrar nenhum quarto com a data {{ $search }}! <a href="/" style="text-decoration: none;">Ver todos</a></p>
            @elseif(count($quartos) == 0)
                <p>Não há quartos disponíveis!
        @endif
    </div>
@endsection