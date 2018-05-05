@extends('adminlte::page')
@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('content')
    @if(count($errors))
        <div class="alert alert-danger alert-block">
            <button type="button" name="button" class="close" data-dismiss="alert">X</button>
            <strong>{{count($errors)}}</strong>
        </div>
    @elseif(session()->get('message'))
        <div class="alert alert-success  alert-block">
            <button type="button" name="button" class="close" data-dismiss="alert">X</button>
            <strong>{{session()->get('message')}}</strong>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class=" form-group">
                {{--/*<a href="{{'add'}}" class="btn btn-primary"
                   style="padding:5px;font-size: 20px">Add Admin</a>*/--}}
                <a href="{{route("home")}}" class="btn btn-primary"
                   style="padding:7px;font-size: 20px;margin-left:10px">Go to home</a>
            </div>
            <div class="box">
                <div class="portlet light">
                    <div class="portlet-body">
                        <div class="table-custom nav-justified">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#detail" data-toggle="tab"><i class="fa fa-user"></i> Detail</a>
                                </li>
                                <li>
                                    <a href="#email" data-toggle="tab"><i class="fa fa-envelope"></i> Email</a>
                                </li>
                                <li>
                                    <a href="#password" data-toggle="tab"><i class="fa fa-lock"></i>
                                        Password</a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="detail">
                                    <div class="portlet-body form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form role="form" class="form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-9">
                                                                <div class="form-control form-control-static">
                                                                    @foreach($users as $user)
                                                                        {{$user->name}}
                                                                    @endforeach
                                                                    <div class="form-control-focus"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">Email</label>
                                                            <div class="col-md-9">
                                                                <div class="form-control form-control-static">
                                                                    @foreach($users as $user)
                                                                        {{$user->email}}
                                                                    @endforeach
                                                                    <div class="form-control-focus"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">Password</label>
                                                            <div class="col-md-9">
                                                                <div class="form-control form-control-static">
                                                                    *********
                                                                    <div class="form-control-focus"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane " id="email">
                                    <div class="portlet-body form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form role="form" class="form-horizontal"
                                                      action="{{route('newEmail')}}" method="post">
                                                    {{csrf_field()}}

                                                    <div class="form-body">

                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">New
                                                                Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" class="form-control"
                                                                       name="email">
                                                                <div class="form-control-focus"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">Current
                                                                Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control"
                                                                       name="currentPassword">
                                                                <div class="form-control-focus"></div>
                                                                <span class="help-block ">Old Password</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-2 col-md-9">
                                                                    <button type="submit"
                                                                            class="btn btn-primary"
                                                                            style="margin: 10px">Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane" id="password">
                                    <div class="portlet-body form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form role="form" class="form-horizontal"
                                                      action="{{route('newPassword')}}"
                                                      method="post">
                                                    {{csrf_field()}}
                                                    <div class="form-body">
                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">Old
                                                                Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control"
                                                                       name="currentPassword">
                                                                <div class="form-control-focus"></div>
                                                                <span class="help-block ">Old Password</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">New
                                                                Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control"
                                                                       name="newPassword">
                                                                <div class="form-control-focus"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-md-3 control-label">Confirm
                                                                Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control"
                                                                       name="repassword">
                                                                <div class="form-control-focus"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-2 col-md-9">
                                                                    <button type="submit"
                                                                            class="btn btn-primary"
                                                                            style="margin: 10px">Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--/*
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>UserName</th>
                    <th>Email</th>

                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

                @foreach($users as $user)
                    <tr>
                        <th>{{$user->name}}</th>
                        <td>{{$user->email}}</td>


                        <th>
                            <a href="{{route("admin.destroy",$user->id)}}" class="btn btn-danger"><span
                                        class="fa fa-edit"></span>Delete</a>
                        </th>
                        <th>
                            <a href="{{ route('admin.edit', $user->id) }}"
                               class="btn btn-warning"><span class="fa fa-edit"></span>Edit</a>
                        </th>
                    </tr>
                @endforeach
            </table>
            */--}}

        </div>
    </div>

@endsection