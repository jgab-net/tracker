<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('users','UsersController');

Route::post('token',  'Tappleby\AuthToken\AuthTokenController@store');


Route::group(array('prefix'=>'api', 'before' => 'auth.token'), function(){
    Route::controller('sync','SyncController');

    Route::group(array('prefix'=>'stories'), function(){
        Route::get('{id}/start', array('uses'=> 'StoryController@start'));
        Route::get('{id}/pause', 'StoryController@pause');
        Route::get('{id}/stop', 'StoryController@stop');
        Route::resource('/', 'StoryController');
    });


    Route::get('me', 'Tappleby\AuthToken\AuthTokenController@index');
});




Route::resource('debug', 'TestController');

Route::controller('/', 'DashboardController');

Event::listen('auth.token.valid', function($user){
    Auth::setUser($user);
});


App::missing(function($e){
    echo "404";
    exit;
});

/*
Route::get('access', function(){

    $request = Requests::get(
        'https://www.pivotaltracker.com/services/v5/me',
        array('Accept' => 'application/json'),
        array('auth' => array('agonzalez@stcsolutions.com.ve', 'Exito.pivot'))
    );

    return $request->body;
});

Route::pattern('id', '[0-9]+');

Route::get('model', function(){

    $user = User::with('projects.stories')->get();

    return Response::json($user);
});























*/