@extends('adminlte::page')
@section('content')
    <div class="container">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="add" method="POST" enctype="multipart/form-data">

            {{csrf_field()}}

            {{ method_field('POST') }}
            <div class="thumbnail addproduct">
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" name="name" class="form-group"
                           placeholder="Category Name">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
