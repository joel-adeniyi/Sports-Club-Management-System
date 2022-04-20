@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Squads</li>
            </ol>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-end">


        <a href="{{ route('new.squad') }}" class="btn btn-primary d-none d-lg-block m-l-15"> Add New Squad</a>
    </div>

</div>


<!-- Page Content -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Squads</h4>
                        <p>The squads for each team are created here.</p>
                        <p>A squad is for the amount of players that a team fields during a match.</p>
                    </div>
                </div>
                @include('pages.flash-message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th witdh="1%">#</th>
                                <th>Name</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($allData as $key => $squads )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $squads->name }}</td>
                                <td>
                                    <a href="{{ route('edit.squad',$squads->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('delete.squad',$squads->id) }}" class="btn btn-danger" id="delete" onclick="return confirm('Are you sure you want to delete this squad?');"> Delete</a>
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