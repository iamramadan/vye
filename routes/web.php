<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\PollController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\searchController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\SearchHistoryController;
use App\Http\Controllers\CampaignContentController;

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
Route::get('/feeds/{thepage}/{name}',[FrontpageController::class, 'feed'])->name('feed')->middleware('auth');
Route::get('/',[FrontpageController::class,'index'])->name('index')->middleware('auth');
Route::get('/activity',[FrontpageController::class,'activity'])->name('activity')->middleware('auth');
Route::get('/userexplore',[FrontpageController::class,'explore'])->name('explorepage')->middleware('auth');
Route::get('/campaign',[FrontpageController::class,'campaign'])->name('campaign')->middleware('auth');
Route::get('/trending',[FrontpageController::class,'trending'])->name('trending')->middleware('auth');
Route::get('/notification',[FrontpageController::class,'notification'])->name('notification')->middleware('auth');
Route::get('/setting',[FrontpageController::class,'setting'])->name('setting')->middleware('auth');
Route::put('/reset-password', [authController::class,'resetpassword'])->name('reset-password')->middleware('auth');
Route::post('/signup', [authController::class,'signupstore'])->name('sign-up')->middleware('guest');
Route::get('/signup', [authController::class,'signup'])->name('sign-up')->middleware('guest');
Route::post('/signin',[authController::class,'signinstore'])->name('sign-in')->middleware('guest');
Route::get('/signin',[authController::class,'signin'])->name('sign-in')->middleware('guest');
Route::post('/logout',[authController::class,'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/activity',[FrontpageController::class, 'activity'])->name('activity');
});
Route::middleware('auth')->name('poll.')->group(function(){
    Route::get('/{campaign}/{name}',[PollController::class, 'index'])->name('index');
});


Route::middleware('auth')->name('profile.')->group(function(){
    Route::get('/myprofile',[ProfileController::class,'index'])->name('index');
    Route::get('/{name}',[ProfileController::class,'findprofile'])->name('findprofile');
    Route::post('/myprofile/update-profile',[ProfileController::class,'storeProfileImage'])->name('store');
});
Route::middleware('auth')->prefix('campaign')->name('campaign.')->group(function(){
    Route::get('/campaign/{name}',[CampaignsController::class, 'campaign'])->name('index');
    Route::get('/create/kyte-campaign',[CampaignsController::class, 'CreateCampaignPage'])->name('createpage');
    Route::post('/create',[CampaignsController::class, 'uploadCampaignImage'])->name('create');
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/{name}',[CampaignsController::class,'admin'])->name('index');
        Route::get('{name}/update',[CampaignsController::class,'updatepage'])->name('updatepage');
        Route::put('/update',[CampaignsController::class,'update'])->name('update');
        Route::get('{name}/retrievepoll',[PollController::class,'retrievepollspage'])->name('retrievepoll');
        Route::post('/retrievepoll',[PollController::class,'retrievepoll'])->name('pollretrieve');
        Route::get('/close',[CampaignsController::class,'admin'])->name('close');
        Route::get('/{name}/managepoll',[CampaignsController::class,'managepolls'])->name('manage');
        Route::get('/{campaign}/{poll}/managecontestants',[CampaignsController::class,'managecontestant'])->name('managecontestant');
        Route::get('/{campaign}/{poll}/update',[PollController::class,'updatepage'])->name('updatepollpage');
        Route::put('/poll/update',[PollController::class,'update'])->name('updatepoll');
        Route::get('/stats',[CampaignsController::class,'stats'])->name('stats');
    });
});

Route::middleware('auth')->prefix('posts')->name('post.')->group(function(){
    Route::get('/selectcampaign/p',[CampaignContentController::class, 'store'])->name('select');
    Route::post('/completepost',[CampaignContentController::class, 'completepost'])->name('completepost');
    Route::get('/createpost/{name}',[CampaignContentController::class,'index'])->name('create');
    Route::post('/createpost',[CampaignContentController::class,'createpostfrompage'])->name('createpost');
});
Route::middleware('auth')->prefix('poll')->name('poll.')->group(function(){
    Route::post('/create/{id}',[PollController::class, 'store'])->name('create');
    Route::put('/trash',[PollController::class, 'trash'])->name('trash');
    Route::middleware('auth')->prefix('contestant')->name('contestant.')->group(function(){
        Route::get('/{id}',[CandidatesController::class,'index'])->name('profile');
    });
});
Route::post('/search',[searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/comment',[CommentController::class, 'store'])->name('comment')->middleware('auth');
