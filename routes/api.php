<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//admin
Route::group(['prefix' => '/app', 'middleware' => ['cors'], 'namespace' => 'api\admin'], function () {
    Route::group(['prefix' => '/admin'], function () {
        Route::post('/getToken','UserController@getToken');
        Route::post('/login',[
            'uses' => 'CustomAccessTokenController@issueUserToken'
        ]);
    });

});
Route::group(['prefix' => '/app', 'middleware' => ['cors','auth:api'], 'namespace' => 'api\admin'], function () {
    Route::group(['prefix' => '/admin'], function () {
        //user
        Route::post('/add/user','UserController@add');
        Route::post('/edit/user','UserController@edit');
        Route::get('/delete/user','UserController@delete');
        Route::get('/list/user','UserController@list');
        //Contact Us
        Route::get('/delete/contact','ContactUsController@delete');
        Route::get('/list/contact','ContactUsController@list');
        Route::post('/send/email/contact','ContactUsController@sendEmail');

        //OurTeam
        Route::post('/add/team','OurTeamController@add');
        Route::post('/edit/team','OurTeamController@edit');
        Route::get('/delete/team','OurTeamController@delete');
        Route::get('/list/team','OurTeamController@list');

        //Partner
        Route::post('/add/partner','PartnerController@add');
        Route::post('/edit/partner','PartnerController@edit');
        Route::get('/delete/partner','PartnerController@delete');
        Route::get('/list/partner','PartnerController@list');

        //Projects
        Route::post('/add/partner','ProjectController@add');
        Route::post('/edit/partner','ProjectController@edit');
        Route::get('/delete/partner','ProjectController@delete');
        Route::get('/delete/image/partner','ProjectController@deleteImage');
        Route::get('/list/partner','ProjectController@list');

    });

});

//front

Route::group(['prefix' => '/app', 'middleware' => ['cors'], 'namespace' => 'api\api'], function () {
    Route::group(['prefix' => '/front'], function () {
        //Contact Us
        Route::get('/add/contact','ContactUsController@add');
        //OurTeam
        Route::get('/list/team','OurTeamController@list');
        //Partner
        Route::get('/list/partner','PartnerController@list');
        //Projects
        Route::get('/list/project','ProjectController@list');
    });

});
