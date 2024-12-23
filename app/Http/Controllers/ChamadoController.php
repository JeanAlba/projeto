<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chamado;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtém todos os chamados do DB utilizando o model Chamado 
        $chamados = Chamado::all();
        //Retorna a view 'chamado.index'
        return view('chamado.index', compact('chamados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Retorna a view 'chamado.create'
        return view('chamado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Cria uma nova instancia do model 'Chamado' com os dados fornecidos no request
        $chamado = new Chamado([
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status'),
            'id_usuario' => $request->input('id_usuario'),
            'id_tecnico' => $request->input('id_tecnico'),
            'id_categoria' => $request->input('id_categoria')
        ]);

        $chamado->save();
        return redirect()->route('chamado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Busca o chamado pelo id no banco e se encontrar retorna a view 'chamado.edit'
        $chamados = Chamado::findOrFail($id);
        return view('chamado.edit', compact('chamados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Busca o chamado pelo id no banco de dados
        $chamado = Chamado::findOrFail($id);

        //Atualiza os campos com os dados fornecidos no formulario
        $chamado->descricao = $request->input('descricao');
        $chamado->status = $request->input('status');
        $chamado->id_usuario = $request->input('id_usuario');
        $chamado->id_tecnico = $request->input('id_tecnico');
        $chamado->id_categoria = $request->input('id_categoria');

        $chamado->save();
        return redirect()->route('chamado.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Busca um chamado pelo Id no banco de dados e deleta caso encontrar
        $chamado = Chamado::findOrFail($id);

        $chamado->delete();
        return redirect()->route('chamado.index');
    }
}
