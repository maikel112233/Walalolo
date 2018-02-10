<?php

namespace App\Http\Controllers;

use App\Contraoferta;
use App\Http\Requests\CreateContraofertaRequest;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContraofertaController extends Controller
{
    public function store(CreateContraofertaRequest $request)
    {

        Contraoferta::create([
            'comprador_user_id' => $request->input('comprador_user_id'),
            'vendedor_user_id' => $request->input('vendedor_user_id'),
            'producto_id' => $request->input('producto_id'),
            'oferta' => $request->input('oferta'),
        ]);

        return redirect('/');
    }

    public function oferta($nombre_usuario)
    {
        $userLogeado = User::where('nombre_usuario', $nombre_usuario)->first();

        return view('contraofertas.oferta', [
            'user' => $userLogeado
        ]);
    }

}