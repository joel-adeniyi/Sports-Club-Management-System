@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{$alliance->name}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                
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
                @include('pages.flash-message')
                <div class="text-center mb-5">
                    <h4 class="card-title">{{ $alliance->name}}</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h6 class="card-title">Add New Coach</h6>
                            </div>
                        </div>
                        <form class="form" method="post" action="{{ route('alliance.add.coach', $alliance->id) }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-9">
                                    <select name="coach" required class="form-control">
                                        <option value="" selected="" disabled="">Select Coach</option>
                                        @foreach($coaches as $coach)
                                        <option value="{{ $coach->id }}">{{ $coach->name }}
                                            @if($coach->alliance)
                                            - {{$coach->alliance->name}}
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('coach')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add Coach" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                    <div class="d-flex no-block align-items-center">
                            <div>
                                <h6 class="card-title">Add New Player</h6>
                            </div>
                        </div>
                        <form class="form" method="post" action="{{ route('alliance.add.player', $alliance->id) }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-9">
                                    <select name="player" required class="form-control">
                                        <option value="" selected="" disabled="">Select player</option>
                                        @foreach($players as $player)
                                        <option value="{{ $player->id }}">{{ $player->name }} 
                                            @if($player->alliance)
                                            - {{$player->alliance->name}}
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('player')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add Player" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center mt-5">
                            <div>
                                <h4 class="card-title">Coaches</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($teamCoaches as $coach)
                            <div class="col-md-4">
                                <a href="{{ route('remove.coach', $coach->id) }}" class="remove-memeber">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                                <div class="card shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img img-responsive profile-pic-coach" src="{{ asset($coach->profile_photo_path) }}" />
                                            </div>
                                            <div class="col-10">
                                                <h4 class="card-title">{{ $coach->name }}</h4>
                                                <h6 class="card-subtitle mb-0"> Coach </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center mt-5">
                            <div>
                                <h4 class="card-title">Players</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($teamPlayers as $player)
                            <div class="col-md-4">
                                <a href="{{ route('remove.player', $player->id) }}" class="remove-memeber">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                                <a href="{{ route('edit.statistic',$player->id) }}" class="fixture-card">
                                    <div class="card shadow rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img class="img img-responsive profile-pic-coach" src="{{ asset($player->photo) }}" />
                                                </div>
                                                <div class="col-10">
                                                    <h4 class="card-title">{{ $player->name }}</h4>
                                                    <h6 class="card-subtitle mb-0"> {{ \App\Models\PlayerPosition::find($player->player_position_id)->name }} </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center mt-5">
                            <div>
                                <h4 class="card-title">Statistics</h4>
                            </div>
                        </div>
                        <div class="row">
                            @if($mostGoalsScored && $mostGoalsScored->goals_scored>0)
                            <a href="{{ route('edit.statistic',$mostGoalsScored->player->id) }}" class="fixture-card col-md-4">
                                <div class="card shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img img-responsive profile-pic-coach" src="{{ asset($mostGoalsScored->player->photo) }}" />
                                            </div>
                                            <div class="col-8">
                                                <h4 class="card-title">{{ $mostGoalsScored->player->name }}</h4>
                                                <h6 class="card-subtitle mb-0"> Most Goals Scored </h6>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="card-title text-primary">{{ $mostGoalsScored->goals_scored }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif

                            @if($mostAssists && $mostAssists->assists>0)
                            <a href="{{ route('edit.statistic',$mostAssists->player->id) }}" class="fixture-card col-md-4">
                                <div class="card shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img img-responsive profile-pic-coach" src="{{ asset($mostAssists->player->photo) }}" />
                                            </div>
                                            <div class="col-8">
                                                <h4 class="card-title">{{ $mostAssists->player->name }}</h4>
                                                <h6 class="card-subtitle mb-0"> Most Assists </h6>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="card-title text-primary">{{ $mostAssists->assists }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                            
                            @if($mostYellowCards && $mostYellowCards->yellow_cards>0)
                            <a href="{{ route('edit.statistic',$mostYellowCards->player->id) }}" class="fixture-card col-md-4">
                                <div class="card shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img img-responsive profile-pic-coach" src="{{ asset($mostYellowCards->player->photo) }}" />
                                            </div>
                                            <div class="col-8">
                                                <h4 class="card-title">{{ $mostYellowCards->player->name }}</h4>
                                                <h6 class="card-subtitle mb-0"> Most Yellow Cards </h6>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="card-title text-primary">{{ $mostYellowCards->yellow_cards }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif

                            @if($mostRedCards && $mostRedCards->red_cards>0)
                            <a href="{{ route('edit.statistic',$mostRedCards->player->id) }}" class="fixture-card col-md-4">
                                <div class="card shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img img-responsive profile-pic-coach" src="{{ asset($mostRedCards->player->photo) }}" />
                                            </div>
                                            <div class="col-8">
                                                <h4 class="card-title">{{ $mostRedCards->player->name }}</h4>
                                                <h6 class="card-subtitle mb-0"> Most Red Cards </h6>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="card-title text-primary">{{ $mostRedCards->red_cards }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif

                            @if($leastGoalsConceded && $leastGoalsConceded->goals_conceded>0)
                            <a href="{{ route('edit.statistic',$leastGoalsConceded->player->id) }}" class="fixture-card col-md-4">
                                <div class="card shadow rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img img-responsive profile-pic-coach" src="{{ asset($leastGoalsConceded->player->photo) }}" />
                                            </div>
                                            <div class="col-8">
                                                <h4 class="card-title">{{ $leastGoalsConceded->player->name }}</h4>
                                                <h6 class="card-subtitle mb-0"> Least Goals Conceded </h6>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="card-title text-primary">{{ $leastGoalsConceded->goals_conceded }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
