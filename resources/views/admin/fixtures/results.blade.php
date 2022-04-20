@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"> Result: {{ $fixture->result }} {{ $fixture->outcome }} </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Result </li>
            </ol>
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
                        <h4 class="card-title">Goalscorers</h4>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:20%">Photo</th>
                                <th style="width:50%">Name</th>
                                <th style="width:20%">Goals</th>
                            </tr>
                        </thead>
                            <tbody>@foreach($goal_scorers as $key => $goal_scorer )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td><img class="img profile-pic-coach" src="{{ asset($goal_scorer->player->photo) }}" /></td>
								<td>{{ $goal_scorer->player->name }}</td>
                                <td>{{ $goal_scorer->goals_scored }}</td>
                            </tr>
                            @endforeach	
                        </tbody>
                    </table>
                </div>
              
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Assists</h4>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:20%">Photo</th>
                                <th style="width:50%">Name</th>
                                <th style="width:20%">Assists</th>
                            </tr>
                        </thead>
                            <tbody>@foreach($assists as $key => $assist )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td><img class="img profile-pic-coach" src="{{ asset($assist->player->photo) }}" /></td>
								<td>{{ $assist->player->name }}</td>
                                <td>{{ $assist->assists }}</td>
                            </tr>
                            @endforeach	
                        </tbody>
                    </table>
                </div>

                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Yellow Cards</h4>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:20%">Photo</th>
                                <th style="width:50%">Name</th>
                                <th style="width:20%">Yellow Cards</th>
                            </tr>
                        </thead>
                            <tbody>@foreach($yellow_cards as $key => $yellow_card )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td><img class="img profile-pic-coach" src="{{ asset($yellow_card->player->photo) }}" /></td>
								<td>{{ $yellow_card->player->name }}</td>
                                <td>{{ $yellow_card->yellow_cards }}</td>
                            </tr>
                            @endforeach	
                        </tbody>
                    </table>
                </div>
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Red Cards</h4>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:20%">Photo</th>
                                <th style="width:50%">Name</th>
                                <th style="width:20%">Red Cards</th>
                            </tr>
                        </thead>
                            <tbody>@foreach($red_cards as $key => $red_card )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td><img class="img profile-pic-coach" src="{{ asset($red_card->player->photo) }}" /></td>
								<td>{{ $red_card->player->name }}</td>
                                <td>{{ $red_card->red_cards }}</td>
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