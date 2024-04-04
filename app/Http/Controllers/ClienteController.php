<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $cliente = Cliente::all();

   $clienteComFoto = $cliente->map(function($cliente){
    return[
        'nome' => $cliente->nome,
        'telefone'=> $cliente->telefone,
        'endereco' =>$cliente->endereco,
        'email'=> $cliente->email,
        'password'=> $cliente->password,
        'foto' => asset('storage/' . $cliente->foto),
    ];

   });
   return response()->json($clienteComFoto);
    }
   
    public function store(Request $request){
        $clienteData = $request->all();

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $nomefoto = time().'.'.$foto->getClientOriginalExtension();
            $caminhofoto= $foto->storeAs('imagens/cliente', $nomefoto,'public');
            $clienteData['foto']= $caminhofoto;
        }
        $cliente = Cliente::create($clienteData);
        return response()->json(['cliente'=>$cliente], 201);
}
}
