@extends('layouts.auth')

@section('content')
	<div class="top {{ url()->current() == route('store.getAdd') ? 'flex' : '' }}">
		<div class="title">
			<h3>
				@yield('store_title')
			</h3>
		</div>
		@if( url()->current() != route('store.getAdd'))
			<div class="ws_menu">
				<ul class="nav nav-tabs" role="tablist">
			    	<li role="presentation" class="active"><a href="#profile" data-toggle="tab"><u>Store settings</u></a></li>
			    	<li role="presentation"><a href="#ws_admin" data-toggle="tab"><u>Store Admin</u></a></li>
			  	</ul>
			</div>
		@endif
	</div>
	<div class="main">
		@yield('store_content')
	</div>
@endsection
