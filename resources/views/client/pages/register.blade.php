@extends('client.master')  
@section('content') 
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home">
                        <a title="Go to Home Page" href="http://www.magikcommerce.com/">{{ trans('messeage.home') }}</a>
                        <span>&mdash;›</span>
                    </li>
                    <li class="category13">
                        <strong>{{ trans('messeage.register') }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-right-layout wow bounceInUp animated">
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9">
                <div class="page-title">
                    <h2>{{ trans('messeage.register') }}</h2>
                </div>
                <div class="static-contain">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade in">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('user.getRegister') }}" method="POST" enctype="multipart/form-data">  
                        {{ csrf_field() }}              
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.full_name') }}<span class="required">*</span></label>
                            <br>
                            <input type="text" id="name" name="name" title="User Name" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.email') }}<span class="required">*</span> </label>
                            <br>
                            <input type="email" id="email" name="email" title="Email" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.user_name') }}<span class="required">*</span></label>
                            <br>
                            <input type="text" id="username" name="username" title="User Name" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.password') }}<span class="required">*</span> </label>
                            <br>
                            <input type="password" id="password" name="password" title="Password" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.confirm_password') }}<span class="required">*</span> </label>
                            <br>
                            <input type="password" id="confirm_password" name="confirm_password" title="Password" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.address') }}</label>
                            <br>
                            <input type="text" id="address" name="address" title="Address" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.telephone') }}<span class="required">*</span></label>
                            <br>
                            <input type="text" name="phone" id="phone" title="Telephone" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <span class="require"><em class="required">* </em>{{ trans('messeage.*') }}</span>
                        <div>
                            <button type="submit" class="btn btn-success">{{ trans('messeage.submit') }}</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
