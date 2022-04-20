@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Contract Type</li>
            </ol>
            <a href="{{ route('new.contract') }}" class="btn btn-primary d-none d-lg-block m-l-15"> Add New Contract Type</a>
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
                        <h4 class="card-title">Contract Type</h4>
                        <p>This section displays every contract type.</p>
                        <p>A player will be under a specific contract term. Any new terms can be created here.</p>
                    </div>
                </div>
                @include('pages.flash-message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th witdh="1%">#</th>
                                <th>Type</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                            <tbody>@foreach($allData as $key => $contracts )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contracts->type }}</td>
                                <td>
                                <a href="{{ route('edit.contract',$contracts->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('delete.contract',$contracts->id) }}" class="btn btn-danger" id="delete" onclick="return confirm('Are you sure you want to delete this contract?');"> Delete</a>
                                </td>
                            </tr>
                            @endforeach	
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
