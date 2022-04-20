@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Coaches</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                
            </ol>
			@if(Auth::user()->role==1)
            <a href="{{ route('new.coach') }}" class="btn btn-primary d-none d-lg-block m-l-15"> Add New Coach</a>
			@endif
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
                    <h4 class="card-title">Coaches</h4>
                        <p>This page contains the coaches registered with Westminster F.C.</p>
                    </div>
                </div>
                @include('pages.flash-message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Team Category</th>
                                <th>Squad</th>
                                <th>DOB</th>
                                <th>Gender</th>
								@if(Auth::user()->role==1)
                                <th>Actions</th>
								@endif
                            </tr>
                        </thead>
                            <tbody>@foreach($allData as $key => $coach )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td><img class="img img-responsive profile-pic-coach" src="{{ asset($coach->profile_photo_path) }}" /></td>
								<td>{{ $coach->name }}</td>
                                <td>{{ $coach->username }}</td>
                                <td>{{ $coach->email }}</td>
                                <td>{{ $coach->address }}</td>
                                <td style="white-space: nowrap">{{ $coach->phone }}</td>
                                <td style="white-space: nowrap">{{ \App\Models\Teams::find($coach->current_team_id)->name }} </td>
                                <td>{{ \App\Models\Squad::find($coach->current_squad_id)->name }} </td>
                                <td style="white-space: nowrap">{{ $coach->dob }}</td>
                                <td>{{ $coach->gender }}</td>
								@if(Auth::user()->role==1)
								<td style="white-space: nowrap">
									<a href="{{ route('edit.coach',$coach->id) }}" class="btn btn-primary">Edit</a>
									<a href="{{ route('delete.coach',$coach->id) }}" class="btn btn-danger" id="delete" onclick="return confirm('Are you sure you want to delete this coach?');"> Delete</a>
								</td>
								@endif
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
