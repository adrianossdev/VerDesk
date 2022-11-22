<?php

namespace App\Http\Controllers;

use App\Setor;
use App\Tipo;
use App\Chamado;
use App\User;
use App\Statu;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function inicio(){
       
            return view('app.inicio');
    }

    public function index(Request $request)
    {
        $setores = Setor::all();
        $tipos =  Tipo::all();
        $chamados = Chamado::paginate(5);
    
        return view('app.chamados.chamados_retorno', ['setores' => $setores, 'tipos' => $tipos, 'chamados' => $chamados, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $setores = Setor::all();
        $tipos =  Tipo::all();
        return view('app.chamados.novo_chamado',['setores' => $setores, 'tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setores = Setor::all();
        $tipos =  Tipo::all();

        $regras = [
            'assunto' => 'required|min:5|max:50',
            'setor_id' => 'required',
            'tipo_id' => 'required',
            'descricao' => 'required',
        ];

        $feedback = [
            'assunto.min' => 'O campo assunto precisa ter no mínimo 5 caracteres',
            'assunto.max' => 'O campo assunto precisa ter no máximo 50 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido!',
            'descricao.required' => 'O campo descrição precisa ser preenchido!',
            'setor_id.required' => 'O campo :attribute precisa ser selecionado!',
            'tipo_id.required' => 'O campo :attribute precisa ser selecionado!',
        ];

        $request->validate($regras,$feedback);
        Chamado::create($request->all());
        $msg = 'Chamado cadastrado com sucesso!'; 
        return view('app.chamados.novo_chamado', ['msg' => $msg, 'setores' => $setores, 'tipos' => $tipos]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        return view('app.chamados.chamados_show', ['chamado' => $chamado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        $setores = Setor::all();
        $tipos =  Tipo::all();
        return view('app.chamados.chamados_edit', ['chamado' => $chamado, 'setores' => $setores, 'tipos' => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamado $chamado)
    {
        $regras = [
            'assunto' => 'required|min:5|max:50',
            'setor_id' => 'required',
            'tipo_id' => 'required',
            'descricao' => 'required',
        ];

        $feedback = [
            'assunto.min' => 'O campo assunto precisa ter no mínimo 5 caracteres',
            'assunto.max' => 'O campo assunto precisa ter no máximo 50 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido!',
            'descricao.required' => 'O campo descrição precisa ser preenchido!',
            'setor_id.required' => 'O campo :attribute precisa ser selecionado!',
            'tipo_id.required' => 'O campo :attribute precisa ser selecionado!',
        ];
        $request->validate($regras,$feedback);
        $chamado->update($request->all());
        return view('app.chamados.chamados_show', ['chamado' => $chamado]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
