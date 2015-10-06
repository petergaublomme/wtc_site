@extends('app')

@section('content')

    <div class="container">
    <h2>Login:</h2>
    <hr/>

        @include('partials.error_list')

        <form method="POST" action="{{ url('/auth/login') }}">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input class="form-control" type="text" placeholder="Email address" name="email"/>
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                <input class="form-control" type="password" placeholder="Password" name="password"/>
            </div>

            <div class="input-group">
                <div class="checkbox">
            		<label><input type="checkbox" name="remember"> Remember Me</label>
            	</div>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </form>
    </div>

@stop