@extends('stores.layout')

@section('store_title', 'Create a new store')

@section('store_content')
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
	<form action="{{ route('store.getAdd') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
		    <label for="name">Store name</label>
		    <input type="text" class="form-control" id="name" placeholder="Please enter store' name" name="name" value="{{ old('name') }}">
		</div>
		<div class="form-group">
		    <label for="description">Address</label>
		    <input type="text" class="form-control" id="description" placeholder="Please enter address" name="address" value="{{ old('description') }}">
		</div>
		<div class="form-group">
		    <label for="description">Phone</label>
		    <input type="text" class="form-control" id="description" placeholder="Please enter phone" name="phone" value="{{ old('description') }}">
		</div>
		<div class="form-group">
		    <label for="description">Description</label>
		    <input type="text" class="form-control" id="description" placeholder="Please enter description" name="description" value="{{ old('description') }}">
		</div>
		<div class="form-group">
		    <label for="avatar">
		    	Avatar
		    	<div class="img-preview" style="height:100px;overflow:hidden;">
		    		<img src="/img/pizza.jpg" style="max-height:100%" alt="" class="img-thumbnail">
		    	</div>
		    </label>
		    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*">
		</div>
		<button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing..." class="btn btn-primary">Create</button>
	</form>
@endsection
