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

Route::get('/', function()
{
	return View::make('UI');
});

Route::post('newplayer','ReadyController@newplayer');

Route::get('result','GameController@win');

Route::post('score','GameController@score');

Route::get('opponent',function()
{
    $app=  app();
    $status=Input::get('status');
    $control=$app->make('ReadyController');
    if($status==1)
    {
       return $control->callAction('search',$parameters = array());
    }
    if($status==2)
    {
       return $control->callAction('wait',$parameters = array());
    }

}
        );
    
Route::get('done','GameController@delete');
