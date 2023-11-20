@extends('layouts.main')

@section('title', 'Reservar')

@section('content')
 <div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/quartos/{{ $quarto->image }}" alt="imagem-quarto" class="img-fluid">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$quarto->numero}}</h1>
            <p class="quarto-quantity"><ion-icon name="people-outline">A</ion-icon> {{$quarto->capacidade}}</p>
            <p class="quarto-price"><ion-icon name="information-circle-outline">{{$quarto->preco_diaria}}</ion-icon></p>
            <p class="quarto-date"><ion-icon name="bed-outline"></ion-icon>{{ date('d/m/Y', $quarto->created_at->timestamp) }}</p>
            @if(!$hasUserJoined)
                <form action="/reservas/store/{{$quarto->id}}" method="post">
                    @csrf
                    <a href="/reservas/store/{{$quarto->id}}" class="btn btn-primary" id="quarto-submit" onclick="event.preventDefault(); this.closest('form').submit();">Reservar</a>
                </form>
            @else
                <p class="already-joined-msg">Você já reservou este quarto</p>
            @endif

        </div>
    </div>
 </div>
@endsection