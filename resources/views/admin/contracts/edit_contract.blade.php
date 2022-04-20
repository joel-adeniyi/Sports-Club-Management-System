@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view.contract') }}">Contracts</a></li>
                <li class="breadcrumb-item active">Edit Contract Terms</li>
            </ol>
            <!-- <a href="/" class="btn btn-success d-none d-lg-block m-l-15"> Dashboard</a> -->
        </div>
    </div>
</div>

<!--  Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Edit Contract Terms</h4>

                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-6">
                    <form class="form" method="post" action="{{ route('update.contract',$editData->id)}}">
                        @csrf
                        <div class="form-group row">
                            <label for="type" class="col-2 col-form-label">Contract</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="type" id="type" value="{{ $editData->type }}">
                                @error('type')
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
</div>

@endsection
