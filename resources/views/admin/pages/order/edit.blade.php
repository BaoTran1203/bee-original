@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Edit Order</h1>
            </div>
            <div class="col-lg-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                {{ Form::open(array('route' => ['orders.update', $order->id], 'method' => 'patch', 'files' => true)) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-group">
                        {{ Form::label('id', 'Order ID: #'.$order->id) }}<br>
                        {{ Form::label('created_at', 'Created at: '.$order->created_at->format('M, d Y H:i')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('product', 'Product') }}
                        {{ Form::text('product', $order->product, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('gender', 'Gender') }}
                        {{ Form::select('gender', [0 => 'Male', 1 => 'Female'] , $order->gender , ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('size', 'Size') }}
                        {{ Form::select('size', [0 => 'S (12-14cm)', 1 => 'M (15-17cm)', 2 => 'L (18-20cm)'] , $order->size , ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', $order->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', $order->email, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('phone', 'Phone') }}
                        {{ Form::text('phone', $order->phone, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('address', 'Address') }}
                        {{ Form::text('address', $order->address, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('message', 'Message') }}
                        {{ Form::textarea('message', $order->message, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('date', 'Date') }}
                        {{ Form::date('date', $order->date, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', 'Status') }}
                        {{ Form::select('status', [0 => 'New', 1 => 'Wait', 2 => 'Done'] , $order->status , ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop