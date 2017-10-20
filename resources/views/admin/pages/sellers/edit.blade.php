@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Edit Slider</h1>
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
                {{Form::open(array('route' => ['sellers.update', $seller->id], 'method' => 'patch', 'files' => true))}}
                <div class="form-group">
                    {{ Form::text('id', $seller->id, ['class' => 'form-control','placeholder'=>'Slider ID']) }}
                    <br>
                    {{ Form::text('title', $seller->title, ['class' => 'form-control','placeholder'=>'Slider Title']) }}
                    <br>
                    {{ Form::select('selected', [0 => 'Hide', 1 => 'Show'] , $seller->selected , ['class' => 'form-control']) }}
                    <br>
                    {{ Form::hidden('MAX_FILE_SIZE', '5242880') }}
                    {{ Form::file('image', ['class' => 'form-control', 'accept' => 'image/*', 'onchange' => 'loadFile(event)']) }}
                </div>

                <div class="form-group">
                    <img id="uploadPreview" src="{{url($seller->image)}}" alt="Preview image"
                         style="object-fit: contain; border:solid">
                </div>

                <div class="form-group">
                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

    @include('admin.layouts.preview-image')
@stop