@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
       
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Players</li>
            </ol>
            @if(Auth::user()->role==1)
            <a href="{{ route('new.player') }}" class="btn btn-primary d-none d-lg-block m-l-15"> Add New Player</a>
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
                        <h4 class="card-title">Players</h4>
                        <p>This page contains the players registered with Westminster F.C.</p>
                    </div>
                </div>
                @include('pages.flash-message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Team Category</th>
                                <th>Squad</th>
                                <th>Contract</th>
                                <th>Player Position</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Address</th>

                                <th>Actions</th>
                    
                            </tr>
                        </thead>
                            <tbody>@foreach($allData as $key => $player )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td><img class="img profile-pic-coach" src="{{ asset($player->photo) }}" /></td>
								<td>{{ $player->name }}</td>
                                <td>{{ \App\Models\Teams::find($player->team_id)->name }}</td>
                                <td>{{ \App\Models\Squad::find($player->squad_id)->name }} </td>
                                <td>{{ \App\Models\Contracts::find($player->contract_id)->type }} </td>
                                <td>{{ \App\Models\PlayerPosition::find($player->player_position_id)->name }} </td>
                                <td style="white-space: nowrap">{{ $player->phone }}</td>
                                <td style="white-space: nowrap">{{ $player->dob }}</td>
                                <td>{{ $player->address }}</td>
                                
                                <td style="white-space: nowrap">
									<a href="{{ route('edit.statistic',$player->id) }}" class="btn btn-primary">Statistics</a>
                                    @if(Auth::user()->role==1)
									<a href="{{ route('edit.player',$player->id) }}" class="btn btn-primary">Edit</a>
									<a href="{{ route('delete.player',$player->id) }}" class="btn btn-danger" id="delete" onclick="return confirm('Are you sure you want to delete this player?');"> Delete</a>
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
