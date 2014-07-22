@extends('layout')

@section('content')


    <div class="login-box">

        <h3 class="login-box-heading">Please sign in/up</h3>
        <h5 class="login-box-heading">With PivotalTracker user</h5>
        {{ Form::open(array('url' => 'users/login', 'role'=> 'form' )) }}

        <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            {{ Form::email('email',null, array('class' => 'form-control', 'placeholder' => 'Email', 'novalidate')) }}
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        </div>
        <div class="checkbox">
            <label> {{ Form::checkbox('remember',true) }} Recuerdame </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block sign-in" type="submit">
            Sign in/up <i class="fa fa-sign-in"></i> <img src="{{ asset('img/pivotal-icon.png') }}" class="sign-in-icon"/>
        </button>

        {{ Form::close() }}
    </div>

@stop