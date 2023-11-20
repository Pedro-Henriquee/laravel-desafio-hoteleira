@extends('layouts.main')

@section('title', 'Editar - Hoteleira')

@section('content')
<div id="quarto-create-container" class="col-md-6 offset-md-3">
    <h1>Editando quarto: {{$quarto->numero}}</h1>
    <form action="/quartos/update/{{$quarto->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Quarto</label>
            <input type="file" class="form-control-file" name="image" id="image">
            <img src="/img/quartos/{{$quarto->image}}" width="40px" alt="" srcset="">
        </div>
        <div class="form-group">
            <label for="numero">Número do Quarto</label>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="Número do quarto" value="{{$quarto->numero}}">
        </div>
        <div class="form-group">
            <label for="capacidade">Capacidade</label>
            <input type="text" class="form-control" name="capacidade" id="capacidade" placeholder="Capacidade" value="{{$quarto->capacidade}}">
        </div>
        <div class="form-group">
            <label for="preco_diaria">Preço - Diária</label>
            <input type="text" class="form-control" name="preco_diaria" id="preco_diaria" placeholder="Preço da diária" value="{{$quarto->preco_diaria}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Quarto">
    </form>
</div>
@endsection