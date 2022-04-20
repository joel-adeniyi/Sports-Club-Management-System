@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Team Category</li>
                
            </ol>
         
        </div>
    </div>
    <div class="d-flex justify-content-end col-12">
           
            <a href="{{ route('new.team') }}" class="btn btn-primary d-none d-lg-block m-l-15"> Add New Team Category</a>
        </div>
</div>

<!--  Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Team Category</h4>
                        <p>In this section, the category for teams are created. Two default categories have been chosen.</p>
                <p><b>First</b> are for players and coaches who are first choice in their team during match selection.</p>
                <p><b>Reserve</b> are for players and coaches who are the backup choice for their team during matches.</p>
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
                            <tbody>@foreach($allData as $key => $teams )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $teams->name }}</td>
                                <td>
                                <a href="{{ route('edit.team',$teams->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('delete.team',$teams->id) }}" class="btn btn-danger" id="delete" onclick="return confirm('Are you sure you want to delete this team?');"> Delete</a>
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
