@extends('layouts.master')
@section('title')
    Football Tshirt Shoping
@endsection
@section('content')
    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{asset("images/".$product->imagepath)}}" alt="image 1"
                     style="max-height:150px" class="img-responsive">
                <div class="caption">
                    <h3>{{$product->title}}</h3>
                    <p class="desc">{{$product->description}}</p>
                    <div class="clearfix"><div class="pull-left price">{{$product->price}}$</div>
                        <a href="{{route('product.addToCart',['id'=>$product->id])}}" role="button" class="btn btn-success pull-right">
                            Add To Cart</a></div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
@endsection
