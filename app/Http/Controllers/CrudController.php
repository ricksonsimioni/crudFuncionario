<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsFuncao;
use App\User;
use App\Http\Requests\StoreUserRequest;

class CrudController extends Controller
{

    private $objUser;
    private $objFuncao;
    public function __construct()
    {
        $this->objUser=new User();
        $this->objFuncao=new ModelsFuncao();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=$this->objUser->all();
        $funcao=$this->objFuncao->all();
        return view("listUser", compact('user', 'funcao'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcao= ModelsFuncao::all();
        $user=$this->objUser->all();  
        
        return view("create", compact('funcao','user')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $cad=$this->objUser->create([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'senha'=>$request->senha,
            'funcao_id'=>$request->funcao_id,
            'data_nascimento'=>$request->data_nascimento,
            'salario'=>$request->salario
        ]);
        if($cad){
            return redirect('/');
            alert("Criado com sucesso");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $users= User::find($user_id);
       
         return view("show", compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcao= ModelsFuncao::all();
        $users= User::find($id);
       
        return view("create", compact('funcao', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit=$this->objUser->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'senha'=>$request->senha,
            'funcao_id'=>$request->funcao_id,
            'data_nascimento'=>$request->data_nascimento,
            'salario'=>$request->salario
        ]);
        if($edit){            
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $posted = $request->all();
        
        $user = User::find($posted)->first();
        $delete = $user->delete();
 
        if($delete){
            return 'sucesso';
        }
            return 'erro';
    }

  
}
