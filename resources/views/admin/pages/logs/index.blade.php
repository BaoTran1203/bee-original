@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Bee's Logs</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">User ID</th>
                                    <th style="text-align: center">User Name</th>
                                    <th style="text-align: center">User Email</th>
                                    <th style="text-align: center">Action</th>
                                    <th style="text-align: center">Module</th>
                                    <th style="text-align: center">Module Id</th>
                                    <th style="text-align: center">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)
                                    <tr>
                                        <td align="center">#{{$log->id}}</td>
                                        <td align="center">{{$log->user_id}}</td>
                                        <td>{{$log->user_name}}</td>
                                        <td>{{$log->user_email}}</td>
                                        <td align="center">
                                            @if($log->action === 'Add')
                                                {!! '<div class="alert-warning">' !!}
                                            @elseif($log->action === 'Edit')
                                                {!! '<div class="alert-info">' !!}
                                            @else
                                                {!! '<div class="alert-danger">' !!}
                                            @endif
                                            {{$log->action}}
                                            {!! '</div>' !!}
                                        </td>
                                        <td align="center">{{$log->module}}</td>
                                        <td align="center">{{$log->module_id}}</td>
                                        <td align="center">{{$log->created_at->format('M, d Y H:i')}}</td>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $logs->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

