@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route("admin.category.update",$cat->id)}}" method="POST" >
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-group" value="{{$cat->name}}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
@endsection