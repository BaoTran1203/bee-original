@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">Bee's Contacts</h1>
            </div>

            <div class="col-lg-6">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{session()->get('success')}}</p>
                    </div><br/>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif

                {{ Form::open(array('route' => 'contacts.update', 'method' => 'put', 'files' => true)) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('address', 'Address' ) }}
                    {{ Form::text('address', $contact['address']->content, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('phone', 'Phone' ) }}
                    {{ Form::text('phone', $contact['phone']->content, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email' ) }}
                    {{ Form::text('email', $contact['email']->content, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('facebook', 'Facebook' ) }}
                    {{ Form::text('facebook', $contact['facebook']->content, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('instagram', 'Instagram' ) }}
                    {{ Form::text('instagram', $contact['instagram']->content, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::hidden('MAX_FILE_SIZE', '5242880') }}
                    {{ Form::file('image', ['class' => 'form-control', 'accept' => 'image/*', 'onchange' => 'loadFile(event)']) }}
                </div>

                <div class="form-group">
                    <img id="uploadPreview" src="{{url($contact['event']->content)}}"
                         alt="Preview image" style="object-fit: contain">
                </div>

                <div class="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    @include('admin.layouts.preview-image')
@stop