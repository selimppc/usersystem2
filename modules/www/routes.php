<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 3:59 PM
 */
//-------------- With Authentication [ Through Middleware ] ------------------//
Route::group(array('modules'=>'Www', 'namespace' => 'Modules\Www\Controllers'), function() {
    Route::any('registration', [
        'as' => 'registration',
        'uses' => 'RegistrationController@index'
    ]);
    Route::any('com-signup', [
        'as' => 'com-signup',
        'uses' => 'RegistrationController@com_admin_store'
    ]);


    /*
     * User Request for join start
     * */

    Route::get('request', [
        #'middleware' => 'acl_access:request',
        'as' => 'request',
        'uses' => 'RegistrationController@create'
    ]);

    Route::post('request', [
        #'middleware' => 'acl_access:request',
        'as' => 'request',
        'uses' => 'RegistrationController@store'
    ]);


    Route::get('user-confirmation/{remember_token}',[
        #'middleware'=> 'acl_access:user-confirmation/{remember_token}',
        'as'=>'user-confirmation',
        'uses'=>'RegistrationController@user_confirm']);

    Route::post('user-confirmation', [
        #'middleware'=> 'acl_access:user-confirmation',
        'as' => 'user-confirmation',
        'uses' => 'RegistrationController@update'
    ]);

    Route::get('user-activation/{remember_token}',[
        #'middleware'=> 'acl_access:user-activation/{remember_token}',
        'as'=>'user-activation',
        'uses'=>'RegistrationController@user_activation'
    ]);

    /*
     * User Request for join end
     * */


});

