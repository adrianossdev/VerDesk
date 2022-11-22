<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Cadastro;
use App\User;
use Illuminate\Http\Request;
use App\Usuario_Tipos;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Usuario_Tipos $usuario)
    {
       
        $tipo_usuario = $_SESSION['tipo'];
        if($tipo_usuario == 3){
        $cadastros = Usuario::paginate(5);
       
        //dd($tp_usuarios);
        return view('app.usuarios.usuarios', ['usuario' => $usuario,'cadastros' => $cadastros, 'request' => $request->all()]);
        }
        else
        return redirect()->route('app.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //dd($usuario);
        $tipo_usuario = $_SESSION['tipo'];
        if($tipo_usuario == 3){
          return view('app.usuarios.usuarios_show', ['usuario' => $usuario]);
        }
        else
        return redirect()->route('app.inicio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $tipo_usuario = $_SESSION['tipo'];
        if($tipo_usuario == 3){
        $cadastros = Usuario::all();
        $usuario_tipos= Usuario_Tipos::all();
        return view('app.usuarios.usuarios_show', ['usuario' => $usuario, 'cadastros' => $cadastros, 'usuario_tipos' => $usuario_tipos]);
        }
        else
        return redirect()->route('app.inicio');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {

        $tipo_usuario = $_SESSION['tipo'];
        if($tipo_usuario == 3){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'email' => 'email|unique:cadastros',
                'senha' => 'required|min:8|max:40',
                'senha2' => 'same:senha',
            ];
    
            $feedback = [
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'email.email' => 'O campo email precisa ser do tipo exemplo@exemplo.com',
                'email.unique' => 'O email informado já está vinculado a outra conta!',
                'required' => 'O campo :attribute precisa ser preenchido!',
                'senha.min' => 'O campo senha deve ter no mínimo 8 caracteres',
                'senha.max' => 'O campo senha deve ter no máximo 40 caracteres',
                'senha2.same' => 'Os campos de senha devem ser iguais!'
            ];
            $request->validate($regras,$feedback);
    
        $usuario->update($request->all());
        $usuario_tipos= Usuario_Tipos::all();
        return view('app.usuarios.usuarios_show', ['usuario' => $usuario, 'usuario_tipos' => $usuario_tipos]);
        }
        else
        return redirect()->route('app.inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
