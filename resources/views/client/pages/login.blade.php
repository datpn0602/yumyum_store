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
                        <strong>{{ trans('messeage.login') }}</strong>
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
                    @if (session('notice'))
                        <div class="alert alert-{{ session('flag') }} alert-dismissible fade in">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ session('notice') }}
                        </div>
                    @endif
                    <form action="{{ route('user.getLogin') }}" method="POST" enctype="multipart/form-data">  
                        {{ csrf_field() }}              
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.email') }}<span class="required">*</span> </label>
                            <br>
                            <input type="email" id="email" name="email" title="Email" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>{{ trans('messeage.password') }}<span class="required">*</span></label>
                            <br>
                            <input type="password" id="password" name="password" title="User Name" class="form-control">
                            @if($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
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
