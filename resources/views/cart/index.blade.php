@extends('layouts.header')
@section('title')
    Lista de Produtos
@endsection
@section('cabecalho')
    Loja X
@endsection
@section('content')
    <div class="container">
        <div class="col-xs-12 col-md-6">
            @if(!empty($cart))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Valor unitário</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $c)
                        <tr>
                            <td><input type="hidden" value="{{$c['id']}}">{{$c['name']}}</td>
                            <td>{{$c['val']}}</td>
                            <td>{{$c['qtd']}}</td>
                            <td>{{$c['total']}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3">Total:</th>
                        <td >R$ {{number_format($total, 2, ',', '.')}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <a href="{{url('/')}}" class="btn btn-success">Escolher mais itens</a> <hr/>
                    <a href="{{url('shopping')}}" class="btn btn-info">Finalizar compra</a>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Não existe itens no carrinho.
                    <a href="{{url('/')}}" class="btn btn-success">Escolher itens</a> <hr/>
                </div>
            @endif
        </div>
    </div>



    @include('layouts.footer')
@endsection
@section('scripts')
    <script>

        function fillModal(id){
            $("#modalTable > tbody").html("");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "fill-modal/"+id,
                type: 'POST',
                data: id,
                success: function (result) {
                    $("#modalTable > tbody").html("<tr>" +
                        "<td>"+result.name +"<input id='id' type='hidden' value='"+result.id +"'></td>" +
                        "<td id='val'>R$" + result.price.toFixed(2).replace(".",",")+"</td>" +
                        "<td id='qtd'><input id='movie' onchange='calcTotal(this, "+result.price+")' type='number' min='1' max='10' value='1'/></td>" +
                        "<td id='total' >R$" + result.price.toFixed(2).replace('.',',')+"</td>" +
                        "</tr>");
                },
                error: function (errors) {
                    console.log(errors)
                }
            });
        }

        $('button#add').on('click', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "fill-cart",
                type: 'POST',
                data: {
                    id: $(this).parent().parent().find('#id').val(),
                    qtd: $(this).parent().parent().find('#movie').val(),
                    val: $(this).parent().parent().find('#val').text(),
                    toal: $(this).parent().parent().find('#total').text(),
                },
                success: function (result) {
                    console.log(result)
                    $('#closeModal').click();
                },
                error: function (errors) {
                    console.log(errors)
                }
            });
        })

        function calcTotal(target, val) {
            if(target.value <= 10){
                $('#total').html("R$" + (target.value * val).toFixed(2).replace('.',','))
            }
        }


    </script>
@endsection
