@extends('layouts.master')
@section('title')
    Football Tshirt Shoping
@endsection
@section('content')
    <div class="container" style="color: #00a7d0; background-color: #1c2d3f;padding: 20px">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1>Sign Up</h1>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('client.signup')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>


            </div>
        </div>
    </div>
@endsection
