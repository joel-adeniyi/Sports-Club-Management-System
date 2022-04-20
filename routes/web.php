<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TeamManagementController;
// use App\Http\Controllers\TeamController;
// use App\Http\Controllers\ContractController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\AllianceController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

//change password
Route::get('/change_pass', [App\Http\Controllers\UserController::class, 'changePass'])->name('change.pass');
Route::post('/update_pass', [App\Http\Controllers\UserController::class, 'UpdatePass'])->name('update.password');

//squad management routing
Route::get('/squad/manage', [App\Http\Controllers\TeamManagementController::class, 'ViewSquad'])->name('view.squad');
Route::get('/squad/add', [App\Http\Controllers\TeamManagementController::class, 'NewSquad'])->name('new.squad');
Route::post('/squad/save', [App\Http\Controllers\TeamManagementController::class, 'SaveSquad'])->name('save.squad');
Route::get('/squad/edit/{id}', [App\Http\Controllers\TeamManagementController::class, 'EditSquad'])->name('edit.squad');
Route::post('/squad/update{id}', [App\Http\Controllers\TeamManagementController::class, 'UpdateSquad'])->name('update.squad');
Route::get('/squad/delete{id}', [App\Http\Controllers\TeamManagementController::class, 'DeleteSquad'])->name('delete.squad');

//Team category routing
Route::get('/team/manage', [App\Http\Controllers\TeamController::class, 'ViewTeam'])->name('view.team');
Route::get('/team/add', [App\Http\Controllers\TeamController::class, 'NewTeam'])->name('new.team');
Route::post('/team/save', [App\Http\Controllers\TeamController::class, 'SaveTeam'])->name('save.team');
Route::get('/team/edit/{id}', [App\Http\Controllers\TeamController::class, 'EditTeam'])->name('edit.team');
Route::post('/team/update{id}', [App\Http\Controllers\TeamController::class, 'UpdateTeam'])->name('update.team');
Route::get('/team/delete{id}', [App\Http\Controllers\TeamController::class, 'DeleteTeam'])->name('delete.team');

// Contract Management routing
Route::get('/contract/manage', [App\Http\Controllers\ContractController::class, 'ViewContract'])->name('view.contract');
Route::get('/contract/add', [App\Http\Controllers\ContractController::class, 'NewContract'])->name('new.contract');
Route::post('/contract/save', [App\Http\Controllers\ContractController::class, 'SaveContract'])->name('save.contract');
Route::get('/contract/edit/{id}', [App\Http\Controllers\ContractController::class, 'EditContract'])->name('edit.contract');
Route::post('/contract/update{id}', [App\Http\Controllers\ContractController::class, 'UpdateContract'])->name('update.contract');
Route::get('/contract/delete{id}', [App\Http\Controllers\ContractController::class, 'DeleteContract'])->name('delete.contract');

//Coach Management Routing
Route::get('/coaches/view', [App\Http\Controllers\CoachController::class, 'ViewCoaches'])->name('view.coach');
Route::get('/coaches/add', [App\Http\Controllers\CoachController::class, 'NewCoach'])->name('new.coach')->middleware('AuthMiddleware');
Route::get('/coaches/edit/{id}', [App\Http\Controllers\CoachController::class, 'EditCoach'])->name('edit.coach')->middleware('AuthMiddleware');
Route::post('/coaches/save', [App\Http\Controllers\CoachController::class, 'SaveCoach'])->name('save.coach')->middleware('AuthMiddleware');
Route::post('/coaches/update{id}', [App\Http\Controllers\CoachController::class, 'UpdateCoach'])->name('update.coach')->middleware('AuthMiddleware');
Route::get('/coaches/delete{id}', [App\Http\Controllers\CoachController::class, 'DeleteCoach'])->name('delete.coach')->middleware('AuthMiddleware');

//Player Management Routing
Route::get('/players/view', [App\Http\Controllers\PlayerController::class, 'ViewPlayers'])->name('view.player');
Route::get('/players/add', [App\Http\Controllers\PlayerController::class, 'NewPlayer'])->name('new.player')->middleware('AuthMiddleware');
Route::get('/players/edit/{id}', [App\Http\Controllers\PlayerController::class, 'EditPlayer'])->name('edit.player')->middleware('AuthMiddleware');
Route::post('/players/save', [App\Http\Controllers\PlayerController::class, 'SavePlayer'])->name('save.player')->middleware('AuthMiddleware');
Route::post('/players/update{id}', [App\Http\Controllers\PlayerController::class, 'UpdatePlayer'])->name('update.player')->middleware('AuthMiddleware');
Route::get('/players/delete{id}', [App\Http\Controllers\PlayerController::class, 'DeletePlayer'])->name('delete.player')->middleware('AuthMiddleware');

//Player statistics
Route::get('/statistics/edit/{player}', [App\Http\Controllers\StatisticController::class, 'edit'])->name('edit.statistic');
Route::post('/statistics/update/{statistic}', [App\Http\Controllers\StatisticController::class, 'update'])->name('update.statistic');
Route::get('/statistics/generate/', [App\Http\Controllers\StatisticController::class, 'generate'])->name('generate.statistic');


//Fixture routes
Route::get('/fixture/add_scores/{fixture}', [App\Http\Controllers\FixtureController::class, 'addScores'])->name('add.scores');
Route::post('/fixture/add_scores/{fixture}', [App\Http\Controllers\FixtureController::class, 'addScoresPost'])->name('add.scores.post');
Route::post('/fixture/update_scores/{fixture}', [App\Http\Controllers\FixtureController::class, 'UpdateScores'])->name('update.scores');
Route::resource('fixture', FixtureController::class);

//Team routes
Route::resource('alliance', AllianceController::class);
Route::post('/alliance/add_coach/{alliance}', [AllianceController::class, 'addCoach'])->name('alliance.add.coach');
Route::post('/alliance/add_player/{alliance}', [AllianceController::class, 'addPlayer'])->name('alliance.add.player');
Route::get('/alliance/remove_coach/{coach_id}', [AllianceController::class, 'removeCoach'])->name('remove.coach');
Route::get('/alliance/remove_player/{player_id}', [AllianceController::class, 'removePlayer'])->name('remove.player');

});


