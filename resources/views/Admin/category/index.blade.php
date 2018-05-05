@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class=" form-group">
                <a href="{{route("admin.category.add")}}" class="btn btn-primary"
                   style="padding:7px;font-size: 20px">Add Category</a>
                <a href="{{route("home")}}" class="btn btn-primary"
                   style="padding:7px;font-size: 20px;margin-left: 10px">Go to home</a>
            </div>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

                @foreach($category as $cat)
                    <tr>
                        <th>{{$cat->name}}</th>
                        <th>
                            <a href="{{route("admin.category.destroy",$cat->id)}}" class="btn btn-danger"><span
                                        class="fa fa-edit"></span>Delete</a>
                        </th>
                        <th>
                            <a href="{{ route('admin.category.edit', $cat->id) }}"
                               class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>
                        </th>

                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection