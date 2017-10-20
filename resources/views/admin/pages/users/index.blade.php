@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Bee's Users</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->level == 1)
                                                <div class="alert alert-success">
                                                    Admin
                                                </div>
                                            @else
                                                <div class="alert alert-danger">
                                                    Unknown
                                                </div>
                                            @endif
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $users->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

