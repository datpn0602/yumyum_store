@extends('layouts.auth')

@section('content')
	<div id="workspaces">
		<div class="header">
			<h3 class="pull-left">Stores</h3>
			<a href="{{ route('store.getAdd') }}">
				<button class="btn btn-primary pull-left"><i class="fa fa-plus-circle"></i> Create new Store</button>
			</a>
			<div class="clearfix"></div>
		</div>
		<div class="list-workspaces">
			@foreach($stores as $store)
				<div class="list-workspaces-item">
					<div class="item-body"><a href="#"><img src="/{{ config('image.paths.resource') }}/{{ $store->avatar }}" class="full_width"></a></div>
					<div class="item-footer m_t_5">
						<div class="pull-left">
							<strong><a href="#">{{ $store->name }}</a></strong><br>
						</div>
						<div class="text-right">
							<a href="{{ route('store.getEdit', $store->id) }}"><button class="btn btn-default btn-sm">Edit</button></a>
							<a href="{{ route('workspace.index', $store->name) }}" target="_blank"><button class="btn btn-success btn-sm">Open</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection