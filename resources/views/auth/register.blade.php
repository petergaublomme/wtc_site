@extends('app')

@section('content')

    <div class="container">
    <h2>New user:</h2>
    <hr/>

        @include('partials.error_list')

        <form method="POST" action="{{ url('/auth/register') }}">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="input-group" >
                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                    <input class="form-control" type="text" placeholder="Name" name="name"/>
                </div>

                <div class="input-group" >
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input class="form-control" type="text" placeholder="Email address" name="email"/>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input class="form-control" type="password" placeholder="Password" name="password"/>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input class="form-control" type="password" placeholder="Confirm password" name="password_confirmation"/>
                </div>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </form>
    </div>

@stop