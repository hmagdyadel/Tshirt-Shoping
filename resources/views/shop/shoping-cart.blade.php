@extends('layouts.master')
@section('title')
    Football Tshirt Shoping
@endsection
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product['qty']}}</span>
                            <strong>{{$product['item']['title']}}</strong>
                            <span class="label label-success">{{$product['price']}}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle">Action
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">Delete all</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total:{{$totalPrice}}</strong>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('products.checkout')}}" class="btn btn-success">CheckOut</a>
            </div>
        </div>

    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in cart!</h2>
            </div>
        </div>
    @endif
@endsection