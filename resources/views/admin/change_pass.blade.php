@extends('layouts.admin')

@section('content')

<!-- Title-->

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
       
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                
            </ol>
            
        </div>
    </div>
</div>


<!-- Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Change Password</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                
                <form class="form" method="post" action="{{ route('update.password') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">Current Password</label>
                        <div class="col-10">
                            <input class="form-control" type="password" name="current_password">
                            @error('current_password')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">New Password</label>
                        <div class="col-10">
                            <input class="form-control" type="password" name="new_password">
                            @error('new_password')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">Confirm Password</label>
                        <div class="col-10">
                            <input class="form-control" type="password" name="new_confirm_password">
                            @error('new_confirm_password ')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-10">
                            <input class="btn btn-primary" type="submit" value="Update" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
