@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Teams</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
               
            </ol>
            <a href="{{ route('alliance.create') }}" class="btn btn-primary d-none d-lg-block m-l-15"> Add New Team</a>
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
                        <h4 class="card-title">Teams</h4>
                        <p>All teams that represent Westminster F.C. during fixtures are displayed here.</p>
                        <p>View a team to manage its players and coaches.</p>
                    </div>
                </div>
                @include('pages.flash-message')

                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th witdh="1%">#</th>
                                <th>Name</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                            <tbody>@foreach($teams as $key => $team )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $team->name }}</td>
                                <td style="white-space: nowrap;">
                                <a href="{{ route('alliance.show',$team->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('alliance.edit',$team->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('alliance.destroy', ['alliance' => $team->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team?');">Delete</button>
                                </form>
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
