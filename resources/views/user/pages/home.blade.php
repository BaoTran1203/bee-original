@extends('user.layouts.default')
@section('content')
    <div class="sukienqc">
        <div class="container">
            <div class="row">
                <img src="{{url($contact['event']->content)}}" alt="Event"
                     class="img-responsive">
            </div>
        </div>
    </div>
    @include('user.pages.home.slider')
    @include('user.pages.home.seller')
    @include('user.pages.home.product')
    @include('user.pages.home.detail')
    @include('user.pages.home.tonghop')
@stop