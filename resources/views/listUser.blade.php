@extends('templates.template')
@section('content')
    


<div class= "col-12 m-auto" style="100%"> 
<h1 class="text-center mt-3">Listagem de Funcionários</h1>



  <div class="col-10 m-auto">
      @csrf
        <table class="table text-center cell-border compact stripe" id="usersTable" style="100%" >
              <thead class="thead-dark">
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Função</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Salário</th>
                        <th scope="col">Ações</th>
                        

                      </tr>
                    </thead>
                    <tbody>                      
                      @foreach ($user as $users)
                      @php
                          $funcao=$users->find($users->id)->relFuncao;                          
                      @endphp
                          <tr>
                              <th>{{$users->id}}</th>
                              <td>{{$users->nome}}</td>
                              <td>{{$users->email}}</td>
                              <td>{{$funcao->descricao}}</td>
                              <td>{{date('d/m/Y', strtotime($users->data_nascimento))}}</td>
                              <td>{{$users->salario}}</td>  
                              <td>
                                  <a href="{{url("edit/$users->id/")}}">
                                    <button class="btn btn-primary">Editar</button>
                                  </a>                                 

                                  <a>
                                    <button onclick="excluir(this)" name="btn_delete" class="btn btn-danger" data-user_id="{{ $users->id }}">Deletar</button>
                                  </a> 
                                </td> 
            
                          </tr>                         
                      @endforeach
                          

                    </tbody>
                  </table>
                  
  <div class="text-left mt-6 mb-4">
    <a href="{{url('users/cadastro')}}">
      <button class="btn btn-success">Cadastrar novo funcionário</button>
    </a>       
</div>
                  
      </div>
    </div> 

      <script src="{{url("assets/axios-master/dist/axios.min.js")}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script>
        $(document).ready( function () {
        $('#usersTable').DataTable(
          {
            "language":{
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
              "sNext": "Próximo",
              "sPrevious": "Anterior",
              "sFirst": "Primeiro",
              "sLast": "Último"
          },
          "oAria": {
              "sSortAscending": ": Ordenar colunas de forma ascendente",
              "sSortDescending": ": Ordenar colunas de forma descendente"
          },
          "select": {
              "rows": {
                  "_": "Selecionado %d linhas",
                  "0": "Nenhuma linha selecionada",
                  "1": "Selecionado 1 linha"
                }
        }
    }
}
        );
        } );
    

        function excluir(e){
          var user_id = $(e).attr('data-user_id');   
          Swal.fire({
          title: 'Tem certeza que deseja excluir o funcionário?',
          text: "Isso é irreversível!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, deletar funcionário!',
          cancelButtonText: 'Não, cancelar!',
          }).then((result) => {
          if (result.value) { 
            axios.post("{{ url('/delete') }}",{
            user_id            
          })
          Swal.fire(
            'Deletado!',
            'O funcionário foi deletado com sucesso.',
            'success', 
            
            )
            
             
            }  
            setTimeout("window.location.reload(true)",800);
            //window.location.reload(true)          
})


  
          // axios.post("{{ url('/delete') }}",{
          //   user_id
          // })
        }
       
         

      </script>
@endsection
    