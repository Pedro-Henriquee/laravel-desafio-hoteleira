@extends('layouts.main')

@section('title', 'Minhas reservas - Hoteleira')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas reservas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-reservas-container">
    @if(count($reservas) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Número do Quarto</th>
                <th scope="col">Data de Check-in</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><a href="/quartos/{{ $reserva->quarto_id }}">{{ $reserva->quarto->numero }}</a></td>
                <td><a href="/quartos/{{ $reserva->quarto_id }}">{{ $reserva->data_checkin }}</a></td>
                <td>
                    <form action="/reservas/delete/{{ $reserva->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Cancelar reserva</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem reservas, <a href="/" style="text-decoration:none;">Reservar quarto</a></p>
    @endif
</div>
@endsection