@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Bee's Sellers</h1>
            </div>

            <div class="col-lg-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{session()->get('success')}}</p>
                    </div><br/>
                @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sellers as $seller)
                                    <tr>
                                        <td>{{$seller->id}}</td>
                                        <td><img src="{{url($seller->image)}}" width="100px"
                                                 height="100px"></td>
                                        <td>{{$seller->title}}</td>
                                        <td>
                                            <?php
                                            $btnStyle = ($seller->selected == 1) ? 'btn btn-primary' : 'btn btn-danger';
                                            ?>
                                            <a href="{{ route('sellers.edit', $seller->id) }}">
                                                {{Form::submit('Edit', ['class' => $btnStyle])}}
                                            </a>
                                        </td>
                                        <td>
                                            {{ Form::open(array('route' => ['sellers.destroy', $seller->id], 'method' => 'delete', 'files' => true)) }}
                                            {{ csrf_field() }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onClick' => 'return confirm("Are you sure to delete ?")']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $sellers->render() !!}
                        </div>
                        <a href="{{route('sellers.create')}}">
                            {{ Form::submit('Add', ['class' => 'btn btn-warning']) }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop