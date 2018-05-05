@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class=" form-group">
                <a href="{{route("admin.product.add")}}" class="btn btn-primary"
                   style="padding:5px;font-size: 20px">Add product</a>
                <a href="{{route("home")}}" class="btn btn-primary"
                   style="padding:7px;font-size: 20px;margin-left:10px">Go to home</a>
            </div>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

                @foreach($products as $product)
                    <tr>
                        <th>{{$product->title}}</th>
                        <td><img src="{{asset("images/".$product->imagepath)}}"
                                 width="70px" height="70px"></td>
                        <th>{{$product->price."  $"}}</th>
                        <th>
                            <a href="{{route("admin.product.destroy",$product->id)}}" class="btn btn-danger"><span
                                        class="fa fa-edit"></span>Delete</a>
                        </th>
                        <th>
                            <a href="{{ route('admin.product.edit', $product->id) }}"
                               class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>
                        </th>

                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection