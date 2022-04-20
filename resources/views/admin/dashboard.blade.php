@extends('layouts.admin')

@section('content')

<!--title-->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Home</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            
            
        </div>
    </div>
</div>


<!-- Page Content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="banner-section mb-5">
                    
                    
                    <h3 class="card-title text-center mt-3">Westminster F.C.</h3>
                </div>
                <div class="row">
                <h5 class="card-title text-center mt-3">Welcome to the Football Management System of Westminster F.C.</h5>
                        <p>Westminster F.C. was founded in 2022. There are currently {{$num_players}} players and {{$num_coaches}} coaches registered, across {{$num_alliances}} different teams.</p>
                        <p>This system allows you to manage players, teams, and fixtures. Get started by visiting the pages on the sidebar.</p>
                        
                
                <div class="d-flex no-block align-items-center">
                    <div>
                        @if($fixtures->count()>0)
                        <h4 class="card-title">Latest Fixtures and Events</h4>
                        @endif
                    </div>
                </div>
                
                <div class="row mb-5">
                    @foreach($fixtures as $fixture)
                        <a @if($fixture->result && $fixture->outcome)
                            href="{{ route('fixture.show', $fixture->id) }}"
                            @endif 
                            class="fixture-card col-md-4">
                            <div class="card shadow rounded mb-2">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-2">
                                            <h4 class="card-title">{{ date("d", strtotime($fixture->date)) }}</h4>
                                            <h6 class="card-subtitle mb-0"> {{ date("M", strtotime($fixture->date)) }} </h6>
                                        </div>
                                        <div class="
                                        @if($fixture->result && $fixture->outcome)
                                        col-8
                                        @else
                                        col-10
                                        @endif
                                        ">
                                            <h4 class="card-title">{{ \App\Models\Alliance::find($fixture->team_1_id)->name }} VS {{ $fixture->team_2 }}</h4>
                                            <h6 class="card-subtitle mb-0"> {{ $fixture->location }} </h6>
                                        </div>
                                        @if($fixture->result && $fixture->outcome)
                                        <div class="col-2">
                                            @if($fixture->outcome == "Win")
                                            <h4 class="card-title text-success">{{ $fixture->outcome }}</h4>
                                            @else
                                            <h4 class="card-title text-primary">{{ $fixture->outcome }}</h4>
                                            @endif
                                            <h6 class="card-subtitle mb-0"> {{ $fixture->result }} </h6>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
