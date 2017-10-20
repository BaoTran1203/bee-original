@extends('admin.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center">
                    <strong>Stop right there!!!</strong>
                </h1>

                <div class="alert alert-danger">
                    <ul>
                        <li>You don't have enough permission to do anything in here.</li>
                        <li>If you were collaborator, please contact admin to setup your
                            permission.
                        </li>
                        <li>Or if you don't have any question, click
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                here
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            to logout
                        </li>
                    </ul>
                </div>
                <br/>
            </div>
        </div>
    </div>
@stop