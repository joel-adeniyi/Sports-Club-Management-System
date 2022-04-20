@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Player Statistics</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view.player') }}">Players</a></li>
                <li class="breadcrumb-item active">Player Statistics</li>
            </ol>
            <!-- <a href="/" class="btn btn-success d-none d-lg-block m-l-15"> Dashboard</a> -->
        </div>
    </div>
</div>


<!-- Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="player_img">
                        <h4 class="card-title my-2">{{ $player->name }}</h4>
                        <img src="{{ asset($player->photo) }}" alt="player" class="img img-responsive player-img">
                    </div>
                </div>
                <div class="d-flex no-block align-items-center my-3">
                    <div>
                        <h4 class="card-title">Player Statistics</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-12">
                    <form class="form" method="post" action="{{ route('update.statistic',$player->statistic->id)}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="goals_scored" class="col-form-label">Goals Scored</label>
                                <div class="controls">
                                    <input type="number" name="goals_scored" value="{{ $player->statistic->goals_scored }}" class="form-control" required>
                                    @error('goals_scored')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="goals_conceded" class="col-form-label">Goals Conceded</label>
                                <div class="controls">
                                    <input type="number" name="goals_conceded" value="{{ $player->statistic->goals_conceded }}" class="form-control" required>
                                    @error('goals_conceded')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="assists" class="col-form-label">Assists</label>
                                <div class="controls">
                                    <input type="number" name="assists" value="{{ $player->statistic->assists }}" class="form-control" required>
                                    @error('assists')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="games_played" class="col-form-label">Games Played</label>
                                <div class="controls">
                                    <input type="number" name="games_played" value="{{ $player->statistic->games_played }}" class="form-control" required>
                                    @error('games_played')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="shots_taken" class="col-form-label">Shots Taken</label>
                                <div class="controls">
                                    <input type="number" name="shots_taken" value="{{ $player->statistic->shots_taken }}" class="form-control" required>
                                    @error('shots_taken')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="shots_missed" class="col-form-label">Shots Missed</label>
                                <div class="controls">
                                    <input type="number" name="shots_missed" value="{{ $player->statistic->shots_missed }}" class="form-control" required>
                                    @error('shots_missed')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="minutes_played" class="col-form-label">Minutes Played</label>
                                <div class="controls">
                                    <input type="number" name="minutes_played" value="{{ $player->statistic->minutes_played }}" class="form-control" required>
                                    @error('minutes_played')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="red_cards" class="col-form-label">Red Cards</label>
                                <div class="controls">
                                    <input type="number" name="red_cards" value="{{ $player->statistic->red_cards }}" class="form-control" required>
                                    @error('red_cards')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="yellow_cards" class="col-form-label">Yellow Cards</label>
                                <div class="controls">
                                    <input type="number" name="yellow_cards" value="{{ $player->statistic->yellow_cards }}" class="form-control" required>
                                    @error('yellow_cards')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                                  
                            <div class=" mt-3 d-grid gap-2   col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2 mx-auto  mx-sm-0">
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
