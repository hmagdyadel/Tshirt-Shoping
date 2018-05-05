@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
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
            <form action="{{route("admin.product.update",$product->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-group"
                           placeholder="Category Name"value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea cols="60" rows="5" name="desc">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" class="form-group" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <img src="{{asset("images/".$product->imagepath)}}">
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="cat_id">Category:</label>
                    <select name="cat_id">
                        <option value=" ">No Data selected</option>
                        @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
@endsection