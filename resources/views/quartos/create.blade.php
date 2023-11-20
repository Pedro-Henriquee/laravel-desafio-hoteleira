@extends('layouts.main')

@section('title', 'Hospedar quarto - Hoteleira')

@section('content')
<div id="quarto-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um quarto</h1>
    <form action="/quartos/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Quarto</label>
            <input type="file" class="form-control-file" name="image" id="image" placeholder="Número do quarto">
        </div>
        <div class="form-group">
            <label for="number">Número do Quarto</label>
            <input type="text" class="form-control" name="number" id="number" placeholder="Número do quarto">
        </div>
        <div class="form-group">
            <label for="capacity">Capacidade</label>
            <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Capacidade">
        </div>
        <div class="form-group">
            <label for="price">Preço - Diária</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Preço da diária">
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Quarto">
    </form>
</div>
@endsection