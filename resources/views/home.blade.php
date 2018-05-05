@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="padding: 20px">


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route("admin.product.index")}}" class="btn btn-primary"
                       style="padding:5px;margin:5px;font-size: 25px">Product Setting</a>
                    <a href="{{route("admin.category.index")}}" class="btn btn-primary"
                       style="padding:5px;margin:5px;font-size: 25px">Category Setting</a>
                    <a href="{{route("admin.index")}}" class="btn btn-primary"
                       style="padding:5px;margin:5px;font-size: 25px">Admin Setting</a>
                        <a href="{{route("shop.index")}}" class="btn btn-primary"
                           style="padding:5px;margin:5px;font-size: 25px">Shop</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
