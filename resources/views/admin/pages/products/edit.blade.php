@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Edit Product</h1>
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
                {{ Form::open(array('route' => ['products.update', $product->id], 'method' => 'patch', 'files' => true)) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::text('id', $product->id, ['class' => 'form-control','placeholder'=>'Product ID']) }}
                    <br>
                    {{ Form::select('selected', [0 => 'Hide', 1 => 'Show'] , $product->selected , ['class' => 'form-control']) }}
                    <br>
                    {{ Form::text('title', $product->title, ['class' => 'form-control','placeholder'=>'Product Name']) }}
                    <br>
                    {{ Form::textarea('description', $product->description, ['class' => 'form-control','placeholder'=>'Description']) }}
                    <br>
                    <div class="input-group">
                        {{ Form::number('price', $product->price, ['class' => 'form-control','placeholder'=>'Price']) }}
                        <span class="input-group-addon">VND</span>
                    </div>
                    <br>
                    {{ Form::hidden('MAX_FILE_SIZE', '5242880') }}
                    {{ Form::file('image', ['class' => 'form-control', 'accept' => 'image/*', 'onchange' => 'loadFile(event)']) }}
                </div>

                <div class="form-group">
                    <img id="uploadPreview" src="{{url($product->image)}}" alt="Preview image"
                         style="object-fit: contain; border:solid">
                </div>

                <div class="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @include('admin.layouts.preview-image')
@stop