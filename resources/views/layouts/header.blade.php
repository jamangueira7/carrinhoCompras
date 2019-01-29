<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/fontawesome/release/v5.6.3/css/all.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('img/shopping.ico')}}" >
    @yield('css')
</head>
<body>


<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container2">
        <div class="topnav">
            <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </div>
</div>

<div class="wide">
    <div class="col-xs-2 logo">Loja X</div>
</div>



<script>
    $(function() {
        /*Tooltip*/
        $('[data-toggle="tooltip"]').tooltip();

        /*Datatable*/
        $(document).ready(function(){
            $('.change-status').change(function() {
                id = $(this).data('id');
                $.ajax({
                    url:'../admin/change-status',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { 'id' : id },
                    success: function(data){
                        console.log(data);
                    },
                });
            });

            $('#search').DataTable( {
                "searching": true,
                "ordering": false,
                "language": {
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
                    }
                }
            });
        });
    });
</script>
