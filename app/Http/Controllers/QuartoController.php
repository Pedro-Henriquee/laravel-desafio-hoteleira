<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quarto;

class QuartoController extends Controller {

  public function index() {
    $quartos = Quarto::all();
    return view('quartos.index', ['quartos' => $quartos]);
  }

  public function listarDisponiveis() {

    $search = request('search');

    if($search) {
      $quartos = Quarto::whereRaw('DATE(created_at) = ?', [$search])
                 ->where('disponivel', true)
                 ->get();
    }
    else {
      $quartos = Quarto::where([
        ['disponivel', '=', true]
        ])->get();
    }

    return view('quartos.index', ['quartos' => $quartos, 'search' => $search]);
  }

  public function create() {
    return view('quartos.create');
  }

  public function store(Request $request) {

    $quarto = new Quarto;

    $quarto->numero = $request->number;
    $quarto->capacidade= $request->capacity;
    $quarto->preco_diaria = $request->price;

    //Imagem
    if($request->hasFile('image') && $request->file('image')->isValid()) {

      $requestImage = $request->image;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . $extension;

      $requestImage->move(public_path('img/quartos'), $imageName);

      $quarto->image =  $imageName;

    }

    $quarto->save();

    return redirect('/')->with('msg', 'Quarto criado com sucesso!');

  }

  public function show($id) {

    $quarto = Quarto::findOrFail($id);

    $user = auth()->user();
    $hasUserJoined = false;

    if($user) {
      $userEvents = $user->reservas->toArray();
      foreach($userEvents as $userEvent) {
        if($userEvent['id'] == $id)  {
          $hasUserJoined = true;
        }
      }
    }

    return view('quartos.show', ['quarto' => $quarto, 'hasUserJoined' => $hasUserJoined]);

  }


  public function edit($id) {

    $quarto = Quarto::findOrFail($id);

    return view('quartos.edit', ['quarto' => $quarto]);
  }

  public function update(Request $request) {

    $data = $request->toArray();

    //Imagem
    if($request->hasFile('image') && $request->file('image')->isValid()) {

      $requestImage = $request->image;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension;

      $requestImage->move(public_path('img/quartos'), $imageName);

      $data['image'] =  $imageName;

    }

    Quarto::findOrFail($request->id)->update($request->all());

    return redirect('/')->with('msg', 'Registro editado com sucesso!');
  }


}
