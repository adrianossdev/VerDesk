<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AcessoController extends Controller
{
    public function recuperarSenha(){
        return view('site.recuperar_senha');
    }

  public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
           $erro =  'Usuário e/ou senha inválido!';
        }
        if($request->get('erro') == 2){
            $erro =  'Necessário realizar login para ter acesso a página!';
         }
       return view('site.index', ['erro' => $erro]);
    }

    public function autenticar(Request $request){

      $regras = [
        'email' => 'email',
        'senha' => 'required'
      ];
      $feedback = [
        'email.email' => 'O campo email deve ser preenchido!',
        'senha.required' => 'O campo senha deve ser preenchido!'
      ];

      $request->validate($regras,$feedback);
        
      $email = $request->get('email');
      $senha = $request->get('senha');
      
      $user = new User();
      $usuario = $user->where('email', $email)
                      ->where('senha', $senha)
                      ->get()
                      ->first();
                      
      if(isset($usuario->nome)){
	     session_start();
         $_SESSION['nome'] = $usuario->nome;
         $_SESSION['email'] = $usuario->email;
         $_SESSION['id'] = $usuario->id; 
         $_SESSION['tipo'] = $usuario->usuario_tipo_id; 
         if($_SESSION['tipo'] !=1 ){
            return redirect()->route('app.inicio');
         }else
         return redirect()->route('chamado.create');
         
      }else
	   return redirect()->route('site.index',['erro' => 1]); 
    } 


    public function cadastro(){
        return view('site.cadastro');
    }

    public function cadastrar(Request $request){
        
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

        $usuario = new User();
        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->senha =  $request->input('senha');
        $usuario->save();
      
        $msg = 'Usuário cadastrado com sucesso!'; 

        return view('site.cadastro', ['msg' => $msg]);
       
    }


    public function sair(){
        session_destroy();
        return redirect()->route('site.index'); 
    }
   
}
