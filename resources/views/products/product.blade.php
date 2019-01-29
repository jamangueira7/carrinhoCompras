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
                                        <a href="javascript:void(0);" class="btn btn-danger">Adicionar</a>
                                        <a href="{{ url('product',$product->id) }}" class="btn btn-info">Detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
