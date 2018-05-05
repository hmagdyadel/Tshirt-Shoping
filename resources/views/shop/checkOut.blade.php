@extends('layouts.master')
@section('title')
    Football Tshirt Shoping
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <h1 class="text-center">Checkout</h1>
            <h3>Your total:${{$total}}</h3>
            <form action="{{route('products.checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12 ">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="form-group">
                            <label for="card-name">Cart Holder Name</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="form-group">
                            <label for="cart-number">Credit Cart Number</label>
                            <input type="text" id="cart-number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-6 ">
                        <div class="form-group">
                            <label for="cart-expire-month">Expiration Month</label>
                            <input type="text" id="cart-expire-month" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-6 ">
                        <div class="form-group">
                            <label for="cart-expire-year">Expiration Year</label>
                            <input type="text" id="cart-expire-year" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="form-group">
                            <label for="cart-cvc">CVC</label>
                            <input type="text" id="cart-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>
@endsection