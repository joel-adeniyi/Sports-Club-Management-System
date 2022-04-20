@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('fixture.index') }}">Fixtures</a></li>
                <li class="breadcrumb-item active">Add Result</li>
            </ol>
            <!-- <a href="/" class="btn btn-success d-none d-lg-block m-l-15"> Dashboard</a> -->
        </div>
    </div>
</div>


<!-- Page Content -->

<div class="row">
    @if($num_players==0)
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Add Result</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-12">
                    <form class="form" method="post" action="{{ route('add.scores.post', ['fixture' => $fixture->id]) }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <label for="result" class="col-form-label">Result (e.g. 1-0) <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" name="result" class="form-control" required>
                                    @error('result')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                <label for="outcome" class="col-form-label">Outcome <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="outcome" id="outcome" class="form-control">
                                        <option value="" disabled>Select Outcome</option>
                                        <option value="Win">Win</option>
                                        <option value="Draw">Draw</option>
                                        <option value="Loss">Loss</option>
                                    </select>    
                                    @error('outcome')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="num_players" class="col-form-label"> Number of players that scored a goal, assisted, received a yellow or a red card<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" name="num_players" value="{{ $fixture->num_players }}" class="form-control" required>
                                    @error('num_players')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            
                           
                        </div>
                        <div class=" mt-3 d-grid gap-2   col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2 mx-auto  mx-sm-0">
                                <input class="btn btn-primary" type="submit" value="Submit" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($num_players>0)
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Add Statistics</h4>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-12">
                    <form class="form" method="post" action="{{ route('update.scores', ['fixture' => $fixture->id]) }}">
                        @csrf
                        @for($i=0;$i<$num_players;$i++)
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <label class="col-form-label"><b>Player</b><span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <select name="player[]" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select Player</option>
                                            @foreach($players as $player)
                                            <option value="{{ $player->id }}">{{ $player->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Goals <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" name="score[]" value="0" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <label class="col-form-label">Assists <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" name="assists[]" value="0" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="col-form-label">Yellow Cards <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" name="yellow_cards[]" value="0" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="col-form-label">Red Cards <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" name="red_cards[]" value="0" class="form-control" required>
                                    </div>
                                </div>

                                
                                

                            </div>

                        @endfor
                        <div class=" mt-3 d-grid gap-2   col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2 mx-auto  mx-sm-0">
                                <input class="btn btn-primary" type="submit" value="Submit" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection