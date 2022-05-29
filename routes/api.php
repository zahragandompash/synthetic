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
        Route::post('/delete/user','UserController@delete');
        Route::post('/list/user','UserController@list');
        //Contact Us
        Route::post('/delete/contact','ContactUsController@delete');
        Route::post('/list/contact','ContactUsController@list');
        Route::post('/send/email/contact','ContactUsController@sendEmail');

        //OurTeam
        Route::post('/add/team','OurTeamController@add');
        Route::post('/edit/team','OurTeamController@edit');
        Route::post('/delete/team','OurTeamController@delete');
        Route::post('/list/team','OurTeamController@list');

        //Partner
        Route::post('/add/partner','PartnerController@add');
        Route::post('/edit/partner','PartnerController@edit');
        Route::post('/delete/partner','PartnerController@delete');
        Route::post('/list/partner','PartnerController@list');

        //Projects
        Route::post('/add/partner','ProjectController@add');
        Route::post('/edit/partner','ProjectController@edit');
        Route::post('/delete/partner','ProjectController@delete');
        Route::post('/delete/image/partner','ProjectController@deleteImage');
        Route::post('/list/partner','ProjectController@list');

    });

});

//front

Route::group(['prefix' => '/app', 'middleware' => ['cors'], 'namespace' => 'api\api'], function () {
    Route::group(['prefix' => '/front'], function () {
        //Contact Us
        Route::post('/add/contact','ContactUsController@add');
        //OurTeam
        Route::post('/list/team','OurTeamController@list');
        //Partner
        Route::post('/list/partner','PartnerController@list');
        //Projects
        Route::post('/list/project','ProjectController@list');
    });

});
