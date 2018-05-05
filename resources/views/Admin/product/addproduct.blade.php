@extends('adminlte::page')
@section('content')
    <div class="container">
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
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-group"
                           placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea cols="60" rows="5" name="desc"
                              placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price"
                           placeholder="Price"class="form-group">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="cat_id">Category:</label>
                    <select name="cat_id">
                        <option value=" ">No Data selected</option>
                        @foreach($cat as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
