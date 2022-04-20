@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Title -->

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

<!--Page Content -->

<div class="row">
<div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">Generate Statistical Reports</h4>
                        <p>On this page, you can generate club-wide reports on players, in order to assess performances.</p>
                        <p>Select the type of report, and a PDF file will be created.</p>
                        <p>If you have entered new player statistics recently, please note that the statistics server restarts every 30 seconds to apply new changes in the database.</p>
                        
                    </div>
                    
                </div>
                @include('pages.flash-message')
                <div class="col-12">
                        
                        <div class="row">

                            <div class="col-md-6">
                                <label for="" class="col-form-label">Type of Report <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select id="report_type_select" name="" required="" class="form-control">
                                        <option value="goals_scored">Number of Goals Scored</option>
                                        <option value="goals_conceded">Number of Goals Conceded</option>
                                        <option value="assists">Number of Assists</option>
                                        <option value="shots_taken">Most Amount of Shots Taken</option>
                                        <option value="shots_missed">Most Amount of Shots Missed</option>
                                        <option value="red_cards">Number of Red Cards</option>
                                        <option value="yellow_cards">Number of Yellow Cards</option>
                                        <option value="games_played">Number of Games Played</option>
                                    </select>
                                    
                                    <span class="text-danger"></span>
                                    
                                </div>
                            </div>

                            
                            
                            
                            

                            

                            
                            <div class="col-md-10 my-3">
                                <input class="btn btn-primary" type="submit" value="Generate Report" onclick="generate_report()" />
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var port = 5000
function generate_report() {
  var report_type_select = document.getElementById('report_type_select');
  var url = 'http://127.0.0.1' + ':' + port + '/report/' + report_type_select.value;
  window.location.href = url;
}
</script>

@endsection
