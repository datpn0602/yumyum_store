@extends('layouts.master')

@section('add_css')
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/lib/cropper.css">
@endsection

@section('top_js')
    <script src="/js/lib/passwordStrength.js"></script>
    <script src="/js/lib/cropper.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="/js/auth.js"></script>
@endsection

@section('body_class','auth')

@section('main')
    <header class="container-fluid">
        <nav>
            <div class="nav-left pull-left">
                <a href="/">{{ trans('admin.YumYumStore') }}</a>
            </div>
            <div class="nav-right pull-right">
                <ul>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('login.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('login.register') }}</a></li>
                    @else
                        <li>
                            <div title="Account Settings">
                                <a href="{{ route('profile.getEdit') }}" class="circle">
                                    <i class="fa fa-cogs"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div title="Sign Out">
                                <a href="{{ url('/logout') }}" class="circle" 
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                </a>
                            </div>
                            {!! Form::open(['method' => 'POST', 'url' => 'logout', 'class' => 'log-form', 'id' => 'logout-form']) !!}
                                {{ csrf_field() }}
                            {!! Form::close() !!}
                        </li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </nav>
    </header>
    @if(Auth::check())
        <section class="container-fluid">
            <div class="row">
                <div class="sidebar pull-left">
                    <div class="top">
                        <div class="text-center">
                            <a href="#"><img src="/img/user.png" alt="" width="75" height="75" class="img-rounded"></a>
                            <a href="#">{{ Auth::user()->name }}</a>
                        </div>
                    </div>
                    <ul class="menu">
                        <li class="{{ $w or '' }}"><a href="{{ route('index') }}">{{ trans('admin.store') }}</a></li>
                        <li class="{{ $p or '' }}"><a href="{{ route('profile.getEdit') }}">{{ trans('admin.accountsetting') }}</a></li>
                    </ul>
                </div>
                <div class="wrapper-right">
                    <div id="content">
                        @yield('content')
                    </div>

                </div>
            </div>
        </section>
        
                    <footer>
                        <p class="pull-left">© 2018 YumYum Company Inc.</p>
                        <ul class="pull-right">
                            <li><a href="">Blog</a></li>
                            <li><a href="https://facebook.com/nhandat0602">Facebook</a></li>
                            <li><a href="mailto:phannhandat@gmail.com">Email</a></li>
                            <li><a href="">Website</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </footer>
    @else
        @yield('content')
    @endif
@endsection

@section('bottom_js')
    {{-- <script src="/js/auth.js"></script> --}}
@endsection