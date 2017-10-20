@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Edit Mini Product</h1>
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
                {{ Form::open(array('route' => ['mini_products.update', $mini_product->id], 'method' => 'patch', 'files' => true)) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::text('id', $mini_product->id, ['class' => 'form-control','placeholder'=>'Mini Product ID']) }}
                    <br>
                    {{ Form::select('selected', [0 => 'Hide', 1 => 'Show'] , $mini_product->selected , ['class' => 'form-control']) }}
                    <br>
                    {{ Form::hidden('MAX_FILE_SIZE', '5242880') }}
                    {{ Form::file('image', ['class' => 'form-control', 'accept' => 'image/*', 'onchange' => 'loadFile(event)']) }}
                </div>

                <div class="form-group">
                    <img id="uploadPreview" src="{{url($mini_product->image)}}" alt="Preview image"
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