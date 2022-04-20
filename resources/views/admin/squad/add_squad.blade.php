@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view.squad') }}">Squads</a></li>
                <li class="breadcrumb-item active">Add New Squad</li>
            </ol>
            <!-- <a href="/" class="btn btn-success d-none d-lg-block m-l-15"> Dashboard</a> -->
        </div>
    </div>
</div>


<!--Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Add New Squad</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-6">
                    <form class="form" method="post" action="{{ route('save.squad') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Squad Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                            @error('name')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="d-grid gap-2   col-10 col-sm-6 col-md-4 col-lg-6 col-xl-5 mx-auto  mx-sm-0">

                                <input class="btn btn-primary" type="submit" value="Add Squad" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
