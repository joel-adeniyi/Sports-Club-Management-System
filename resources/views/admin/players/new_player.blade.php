@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        
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
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Player Registration</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-12">
                    <form class="form" method="post" action="{{ route('save.player') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <label for="team" class="col-form-label">Team Category<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="team" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Team</option>
                                        @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="squad" class="col-form-label">Squad <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="squad" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Squad</option>
                                        @foreach($squads as $squad)
                                        <option value="{{ $squad->id }}">{{ $squad->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('squad')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="contract" class="col-form-label">Contract <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="contract" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Contract</option>
                                        @foreach($contracts as $contract)
                                        <option value="{{ $contract->id }}">{{ $contract->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('contract')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="player_position" class="col-form-label">Player Position <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="player_position" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Player Position</option>
                                        @foreach($player_positions as $player_position)
                                        <option value="{{ $player_position->id }}">{{ $player_position->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('player_position')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="name" class="col-form-label">Full Name <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" required>
                                    @error('address')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="phone" class="form-control" required>
                                    @error('phone')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="dob" class="col-form-label">Date of birth <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input class="form-control" type="date" id="dob" name="dob" required>
                                    @error('dob')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="photo" class="col-form-label">Photo <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="file" name="photo" class="form-control" id="photo" required>
                                    @error('photo')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <br/>
                           
                            <div class=" mt-3 d-grid gap-2   col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2 mx-auto  mx-sm-0">
                                <input class="btn btn-primary" type="submit" value="Add Player" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
