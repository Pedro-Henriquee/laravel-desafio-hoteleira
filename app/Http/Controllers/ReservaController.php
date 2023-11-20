<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Quarto;

class ReservaController extends Controller
{
    public function index() {

        $user = auth()->user();

        $reservas = $user->reservas;

        return view("reservas.index", ['reservas' => $reservas]);
    }

    public function store($id) {

        $user = auth()->user();

        $quarto = Quarto::findOrFail($id);

        $reserva = new Reserva;

        $reserva->user_id = $user->id;
        $reserva->quarto_id = $quarto->id;
        $reserva->data_checkin = date('Y-m-d');
        $reserva->data_checkout = null;

        $reserva->save();

        return redirect('/')->with('msg', 'Sua reserva para o quarto '.$quarto->numero.' foi confirmada com sucesso!');
    }

    public function destroy($id) {
        $user = auth()->user();

        Reserva::findOrFail($id)->update(['dt_checkout' => date('Y-m-d')])->delete();

        return redirect('/reservas')->with('msg', 'Sua reserva foi cancelada com sucesso!');
    }
}
