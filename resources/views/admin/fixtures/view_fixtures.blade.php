@extends('layouts.admin')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Fixtures</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Fixtures</li>
            </ol>
          
		</div>
    </div>
    <div class="col-12 d-flex justify-content-end">
    <a href="{{ route('fixture.create') }}" class="btn btn-primary  "> Add Fixture</a>
    </div>
</div>

<!--Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Fixtures</h4>
                        <p>All past, current and future fixtures and results are created and displayed here.</p>
                    

                    </div>
                </div>
                @include('pages.flash-message')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Team </th>
                                <th>Opponent</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Result</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                            <tbody>@foreach($fixtures as $key => $fixture )
                            <tr>
                                <td>{{ ++$key }}</td>
								<td>{{ \App\Models\Alliance::find($fixture->team_1_id)->name }}</td>
								<td>{{ $fixture->team_2 }}</td>
                                <td>{{ $fixture->location }}</td>
                                <td>{{ $fixture->date }}</td>
                                <td><b>{{ $fixture->result }} {{ $fixture->outcome }}</b></td>
								<td style="white-space: nowrap">
                                    @if($fixture->score_added==0)
                                        <a href="{{ route('add.scores', ['fixture' => $fixture->id]) }}" class="btn btn-primary">Add Result</a>
                                    @else
                                        <button class="btn btn-primary" disabled>Result Added</button>
                                    @endif
                                    @if($fixture->result && $fixture->outcome)
                                    <a href="{{ route('fixture.show', $fixture->id) }}" class="btn btn-primary">Results</a>
                                    @endif
									<a href="{{ route('fixture.edit', $fixture->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('fixture.destroy', ['fixture' => $fixture->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this fixture?');">Delete</button>
                                    </form>
                                </td>
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