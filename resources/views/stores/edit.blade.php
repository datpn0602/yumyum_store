@extends('stores.layout')

@section('store_title', $data->name)

@section('store_content')

<div id="show-workspace">
  	<!-- Tab panes -->
  	<div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="profile">
			@if (count($errors) > 0)
			    <div class="alert alert-danger alert-dismissible fade in">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			@if (session('status'))
			    <div class="alert alert-success alert-dismissible fade in">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			        {{ session('status') }}
			    </div>
			@endif
			<form action="{{ route('store.getEdit', [$data->id]) }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" value="{{ $data->id }}" name="user_id">
				<div class="form-group">
				    <label for="name">Store name</label>
				    <input type="text" class="form-control" id="name" placeholder="your-restaurant-name" name="name" value="{{ $data->name }}">
				</div>
				<div class="form-group">
				    <label for="description">Address</label>
				    <input type="text" class="form-control" id="description" placeholder="Please enter address" name="address" value="{{ $data->address }}">
				</div>
				<div class="form-group">
				    <label for="description">Phone</label>
				    <input type="text" class="form-control" id="description" placeholder="Please enter phone" name="phone" value="{{ $data->phone }}">
				</div>
				<div class="form-group">
				    <label for="description">Description</label>
				    <input type="text" class="form-control" id="description" placeholder="description" name="description" value="{{ $data->description }}">
				</div>
				<div class="form-group">
				    <label for="avatar">
				    	Avatar
				    	<div class="img-preview" style="height:100px;overflow:hidden;">
				    		<img src="/{{ config('image.paths.resource') }}/{{ $data->avatar }}" style="max-height:100%" alt="" class="img-thumbnail">
				    	</div>
				    </label>
				    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*" >
				</div>
				<button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Updating..." class="btn btn-primary">Update Store</button>
			</form>
			<hr>
    	</div>
    	
  	</div>
		
</div>
	<div class="clearfix"></div>
@endsection
