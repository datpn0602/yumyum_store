@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'login', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans('login.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'value' => "{{ old('email') }}", 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', trans('login.password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    {!! Form::checkbox('remember', '', ['class' => 'form-check-input']) !!}

                                    {!! Form::label('remember', trans('login.rememberme'), ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::button(trans('login.login'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    {{ trans('login.forgot') }}
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
