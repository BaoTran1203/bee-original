@extends('user.layouts.default')
@section('content')
    @include('user.pages.collection.product')
    @include('user.pages.collection.pagination')
    @include('user.pages.collection.detail')
@stop