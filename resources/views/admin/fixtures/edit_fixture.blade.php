@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Edit Fixture</h4>
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
                        <h4 class="card-title">Edit Fixture</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-12">
                    <form class="form" method="post" action="{{ route('fixture.update', $fixture->id) }}">
                        @method('put')
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <label for="team_1_id" class="col-form-label">Team <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="team_1_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Team </option>
                                        @foreach($teams as $team)
                                        <option value="{{ $team->id }}"
                                            @if($fixture->team_1_id==$team->id)
                                                selected
                                            @endif
                                            >{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team_1_id')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <label for="team_2" class="col-form-label">Opponent<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="team_2" class="form-control" value="{{ $fixture->team_2 }}" required>
                                    @error('team_2')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="location" class="col-form-label">Location <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="location" value="{{ $fixture->location }}" class="form-control" required>
                                    @error('location')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="date" class="col-form-label">Date<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input class="form-control" type="date" value="{{ $fixture->date }}" id="date" name="date" required>
                                    @error('date')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <br/>
                            
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
