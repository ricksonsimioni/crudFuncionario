@extends('templates.template')
@section('content')
      


<h1 class="text-center">@if(isset($users))Editar @else Cadastrar @endif</h1> <hr>
    <div class="col-8 m-auto">    

        <div class="col-8 m-auto">

            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach ($error->all() as $errors)
                     {{$errors}}
                    @endforeach
                </div>
            @endif
        </div>

        @if(isset($users)) 
            <form name="formEdit"  id="formEdit" method="post" action="{{url("update/$users->id")}}">
                @method('PUT')
        @else 
            <form name="formCad" id="formCad" method="post" action="{{url('criacaoUsuario')}}">
        @endif
          @csrf  

            <input class="form-control" type="text" name="nome" id="nome" value="{{$users->nome ?? ''}}" placeholder="Nome" required ><br>

            <input class="form-control" type="email" name="email" id="email" value="{{$users->email ?? ''}}" placeholder="Email" required><br>

            <input class="form-control" type="password" name="senha" id="senha" value="{{$users->senha ?? ''}}" placeholder="Senha"required><br>

            <select id="funcao_id" name="funcao_id" class="form-control" required>

                <option value="{{$users->relFuncao->id ?? ''}}">{{$users->relFuncao->descricao ?? 'Função:'}}</option>                 
                    @foreach ($funcao as $funcoes)

                        <option value="{{$funcoes->id}}">{{$funcoes->descricao}}</option>   
                        
                    @endforeach
            </select><br>

            <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" value="{{$users->data_nascimento ?? ''}}" placeholder="Data de nascimento" required><br>

            <input class="form-control" type="text" onkeypress="return somenteNumeros(event)"  name="salario" id="salario" value="{{$users->salario ?? ''}}" placeholder="Salário" required><br>

            <input class="btn btn-primary" type="submit" onclick="return validar()" value="@if(isset($users)) Editar @else Cadastrar @endif">

        </form>
      </div>

      <script type="text/javascript">

        function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9 && charCode != 46) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
         }
        }

        function validar(){

            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var senha = document.getElementById("senha").value;
            var funcao = document.getElementById("funcao_id").value;
            var data_nascimento = document.getElementById("data_nascimento").value;
            var salario = document.getElementById("salario").value;
            
            if(nome == ""){
                alert("Preencha o nome")
                
                return false;
            }  

            if(email == "" || email.indexOf('@') == -1 ){
                alert("Preencha o campo email corretamente.");
                
                return false;
            }

            if(senha == "" || senha.length < 6){
                alert('Preencha o campo senha corretamente, são necessário no mínimo 6 caracteres');
                
                return false;
            }

            if(funcao == ""  ){
                alert('Selecione uma opção do campo função.');
                
                return false;
            }

            var hoje = new Date();
            data_nascimento = new Date(data_nascimento);

            if(data_nascimento == " " || data_nascimento > hoje || data_nascimento < "01/01/1900"){
                alert('Preencha o campo data de nascimento corretamente.');
                
                return false;
            }

            if(salario == "" ){
                alert('Preencha o campo salário.');
                
                return false;
            }
            
            else  
            
            alert("Formulário enviado com sucesso");
            
            }

    </script>      
      
@endsection