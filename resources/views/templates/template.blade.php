<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' media='screen' href="{{url('assets/bootstrap-4.1.3/dist/css/bootstrap.min.css')}}">
    <link rel='stylesheet'  href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript">
        $(document).ready( function () {
            $('#usersTable').DataTable();
        } );
    </script>


    <script src="main.js"></script>
</head>
<body>
    @yield('content')

    

    <script src="{{url("assets/axios-master/dist/axios.min.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"></script>


    
    
    
    
</body>
</html>