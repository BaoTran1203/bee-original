@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Bee's Orders</h1>
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
                                    <th>No.</th>
                                    <th>Product</th>
                                    <th>Gender</th>
                                    <th>Size</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>#{{$order->id}}</td>
                                        <td>{{$order->product}}</td>
                                        <td>{{($order->gender == 0) ? 'Male' : 'Female'}}</td>
                                        <td>
                                            @if($order->size == 0)
                                                S (12-14cm)
                                            @elseif($order->size == 1)
                                                M (15-17cm)
                                            @else
                                                L (18-20cm)
                                            @endif
                                        </td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{date("M, d Y", strtotime($order->date))}}</td>
                                        <td>{{$order->message}}</td>
                                        <td>{{$order->created_at->format('M, d Y H:i')}}</td>
                                        <td>
                                            @if($order->status == 0)
                                                <a href="{{route('orders.edit', $order->id)}}"
                                                   class="btn btn-danger">New</a>
                                            @elseif($order->status == 1)
                                                <a href="{{route('orders.edit', $order->id)}}"
                                                   class="btn btn-warning">Wait</a>
                                            @else
                                                <div class="btn btn-success">Done</div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $orders->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop