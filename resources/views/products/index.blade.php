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
            @foreach($products as $product)
                <!-- First product box start here-->
                    <div class="prod-info-main prod-wrap clearfix">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div class="product-image">
                                    <img src="img/{{$product->image}}" class="img-responsive">
                                    <span class="tag2 hot">
                                HOT
                            </span>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-deatil">
                                    <h5 class="name">
                                        <a href="#">
                                            {{$product->name}}
                                        </a>
                                        <a href="#">
                                            <span>{{$product->category->name}}</span>
                                        </a>

                                    </h5>
                                    <p class="price-container">
                                        <span>{{ 'R$' . number_format($product->price, 2, ',', '.')}}</span>
                                    </p>
                                    <span class="tag1"></span>
                                </div>
                                <div class="description">
                                    <p>{{$product->description}} </p>
                                </div>
                                <div class="product-info smart-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button onClick="fillModal({{$product->id}})" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Adicionar
                                            </button>
                                            {{--<a href="javascript:void(0);" class="btn btn-danger">Adicionar</a>--}}
                                            <a href="{{ url('product',$product->id) }}" class="btn btn-info">Detalhes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product -->
                @endforeach
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adiconar item ao carrinho de compras</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table" id="modalTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Valor unitário</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Fechar</button>
                                <button type="button" id="add" class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container">
        {{ $products->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}
    </div>




    @include('layouts.footer')
@endsection
@section('scripts')
    <script>

        function fillModal(id){
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
                $('#myModal').html("R$" + (target.value * val).toFixed(2).replace('.',','))
            }
        }


    </script>
@endsection
