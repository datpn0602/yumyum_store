@extends('layouts.auth')

@section('content')
    <div class="top flex">
        <div class="wr">
            <h3>{{ $user->name }}</h3>
            <p>Account Settings</p>
        </div>
    </div>
    <div class="main">
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
        <form action="{{ route('profile.getEdit') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" value="{{ $user->name }}" name="fullname">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="{{ $user->username }}" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" value="{{ $user->phone }}" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" value="{{ $user->address }}" name="address">
            </div>
            <button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Updating..." class="btn btn-primary">Update infomations</button>
        </form>
        <hr>
        <form action="">
            <h4>Change password</h4>
            <div class="form-group">
                <label for="old-password">Old password</label>
                <input type="password" class="form-control" id="old-password" name="old-password">
            </div>
            <div class="form-group">
                <label for="new-password">New password</label>
                <input type="password" class="form-control" id="new-password" name="new-password">
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm new password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            </div>
        </form>
    </div>
@endsection
