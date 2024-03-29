<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 3:59 PM
 */

//------------- Without Authentication [ No Middleware ] ---------------//
Route::group(array('modules' => 'Admin', 'namespace' => 'Modules\Admin\Controllers'), function () {

    Route::any('forget-password-view', [
        'as'   => 'forget-password-view',
        'uses' => 'UserController@forget_password_view',
    ]);

    Route::any('sign-up', [
        'as'   => 'sign-up',
        'uses' => 'UserController@create_sign_up',
    ]);

    Route::any('signup', [
        'as'   => 'signup',
        'uses' => 'UserController@store_signup_info',
    ]);

});

//-------------- With Authentication [ Through Middleware ] ------------------//
Route::group(array('middleware' => 'auth', 'modules' => 'Admin', 'namespace' => 'Modules\Admin\Controllers'), function () {

    //Your routes belong to this module.
    /*Form Components*/

    include 'routes_permission.php';
    include 'routes_ac.php';

    Route::get('form-elements', function () {
        return view('admin::layouts.example_pages.form_elements');
    });

    /* Form Sample For Registration*/
    Route::get('reg-sample', function () {
        return view('admin::layouts.example_pages.reg_form');
    });

    Route::any('admin', [
        'as'   => 'admin',
        'uses' => 'AdminController@index',
    ]);

    Route::any('content-page', [
        'as'   => 'content-page',
        'uses' => 'AdminController@content_page',
    ]);

    Route::any('validation-page', [
        'as'   => 'validation-page',
        'uses' => 'AdminController@validation_page',
    ]);

    /**Menu Panel**/

    Route::get("menu-panel", [
        //"middleware" => "acl_access:branch",
        "as"   => "menu-panel",
        "uses" => "MenuPanelController@index",
    ]);

    Route::get("add-menu-panel", [
        //"middleware" => "acl_access:add-menu-panel",
        "as"   => "add-menu-panel",
        "uses" => "MenuPanelController@create",
    ]);

    Route::any("store-menu-panel", [
        //"middleware" => "acl_access:store-branch",
        "as"   => "store-menu-panel",
        "uses" => "MenuPanelController@store",
    ]);

    Route::any("search-menu-panel", [
        //"middleware" => "acl_access:search-menu-panel",
        "as"   => "search-menu-panel",
        "uses" => "MenuPanelController@search_menu_panel",
    ]);

    Route::any("view-menu-panel/{id}", [
        //"middleware" => "acl_access:view-branch/{id}",
        "as"   => "view-menu-panel",
        "uses" => "MenuPanelController@show",
    ]);

    Route::any("edit-menu-panel/{id}/{parent_menu_id}", [
        //"middleware" => "acl_access:edit-branch/{id}",
        "as"   => "edit-menu-panel",
        "uses" => "MenuPanelController@edit",
    ]);

    Route::any("update-menu-panel/{id}", [
        //"middleware" => "acl_access:update-branch/{id}",
        "as"   => "update-menu-panel",
        "uses" => "MenuPanelController@update",
    ]);

    Route::any("delete-menu-panel/{id}", [
        //"middleware" => "acl_access:delete-branch/{id}",
        "as"   => "delete-menu-panel",
        "uses" => "MenuPanelController@delete",
    ]);

    Route::any('menu-list', [
        //'middleware' => 'acl_access:exchange-rate',
        'as'   => 'menu-list',
        'uses' => 'MenuPanelController@get_ajax_menu_list',
    ]);

    //Permission Menu Panel Lists

    Route::any('sidebar-menu', [
        'as'   => 'sidebar-menu',
        'uses' => 'AdminController@sidebar_menu',
    ]);

    /*-----------Route Comes From USER Module-------------*/

    /*Route::get('routes', function() {
    \Artisan::call('route:list');
    return \Artisan::output();
     */
    /*Route::get('routes', function() {
    $routeCollection = Route::getRoutes();

    foreach ($routeCollection as $value) {
    echo $value->getPath() .'<br>';
    }
     */
    Route::any('user-list', [
        'middleware' => 'acl_access:user-list',
        'as'         => 'user-list',
        'uses'       => 'UserController@index',
    ]);

    Route::get('add-new-user', [
        'middleware' => 'acl_access:add-new-user',
        'as'         => 'add-new-user',
        'uses'       => 'UserController@add_new_user',
    ]);

    Route::any('add-user', [
        'middleware' => 'acl_access:add-user',
        'as'         => 'add-user',
        'uses'       => 'UserController@add_user',
    ]);

    Route::any('search-user', [
        'middleware' => 'acl_access:search-user',
        'as'         => 'search-user',
        'uses'       => 'UserController@search_user',
    ]);

    Route::any('show-user/{id}', [
        'middleware' => 'acl_access:show-user/{id}',
        'as'         => 'show-user',
        'uses'       => 'UserController@show_user',
    ]);

    Route::any('edit-user/{id}', [
        'middleware' => 'acl_access:edit-user/{id}',
        'as'         => 'edit-user',
        'uses'       => 'UserController@edit_user',
    ]);

    Route::any('update-user/{id}', [
        'middleware' => 'acl_access:update-user/{id}',
        'as'         => 'update-user',
        'uses'       => 'UserController@update_user',
    ]);

    Route::any('delete-user/{id}', [
        'middleware' => 'acl_access:delete-user/{id}',
        'as'         => 'delete-user',
        'uses'       => 'UserController@destroy_user',
    ]);

    /* Route::any('create-sign-up', [
    //'middleware' => 'acl_access:create-sign-up',
    'as' => 'create-sign-up',
    'uses' => 'UserController@create_sign_up'
     */

    Route::any('forget-password', [
        //    'middleware' => 'acl_access:forget-password-view',
        'as'   => 'forget-password',
        'uses' => 'UserController@forget_password',
    ]);

    Route::any('password-reset-confirm/{reset_password_token}', [
        //    'middleware' => 'acl_access:password-reset-confirm/{reset_password_token}',
        'as'   => 'password-reset-confirm',
        'uses' => 'UserController@password_reset_confirm',
    ]);

    Route::any('user-save-new-password', [
        //    'middleware' => 'acl_access:user-save-new-password',
        'as'   => 'user-save-new-password',
        'uses' => 'UserController@save_new_password']);

    /*Route::any('signup', [
    //    'middleware' => 'acl_access:signup',
    'as'   => 'signup',
    'uses' => 'UserController@store_signup_info',
    ]);*/

    Route::get('user-logout', [
        'as'   => 'user-logout',
        'uses' => 'UserController@logout',
    ]);

    Route::any('add-user', [
        'middleware' => 'acl_access:add-user',
        'as'         => 'add-user',
        'uses'       => 'UserController@add_user',
    ]);

    /*Role */

    Route::any('role', [
        'middleware' => 'acl_access:role',
        'as'         => 'role',
        'uses'       => 'RoleController@index',
    ]);

    Route::any('add-role', [
        'middleware' => 'acl_access:add-role',
        'as'         => 'add-role',
        'uses'       => 'RoleController@create',
    ]);

    Route::any('store-role', [
        'middleware' => 'acl_access:store-role',
        'as'         => 'store-role',
        'uses'       => 'RoleController@store_role',
    ]);

    Route::any('view-role/{slug}', [
        'middleware' => 'acl_access:view-role/{slug}',
        'as'         => 'view-role',
        'uses'       => 'RoleController@show',
    ]);

    Route::any('edit-role/{slug}', [
        'middleware' => 'acl_access:edit-role/{slug}',
        'as'         => 'edit-role',
        'uses'       => 'RoleController@edit',
    ]);

    Route::any('update-role/{slug}', [
        'middleware' => 'acl_access:update-role/{slug}',
        'as'         => 'update-role',
        'uses'       => 'RoleController@update',
    ]);

    Route::any('delete-role/{slug}', [
        'middleware' => 'acl_access:delete-role/{slug}',
        'as'         => 'delete-role',
        'uses'       => 'RoleController@destroy',
    ]);

    /*Role User*/

    Route::any('index-role-user', [
        'middleware' => 'acl_access:index-role-user',
        'as'         => 'index-role-user',
        'uses'       => 'RoleUserController@index',
    ]);

    Route::any('search-role-user', [
        'middleware' => 'acl_access:search-role-user',
        'as'         => 'search-role-user',
        'uses'       => 'RoleUserController@search_role_user',
    ]);

    Route::any('store-role-user', [
        'middleware' => 'acl_access:store-role-user',
        'as'         => 'store-role-user',
        'uses'       => 'RoleUserController@store',
    ]);

    Route::any('view-role-user/{id}', [
        'middleware' => 'acl_access:view-role-user/{id}',
        'as'         => 'view-role-user',
        'uses'       => 'RoleUserController@show',
    ]);

    Route::any('edit-role-user/{id}', [
        'middleware' => 'acl_access:edit-role-user/{id}',
        'as'         => 'edit-role-user',
        'uses'       => 'RoleUserController@edit',
    ]);

    Route::any('update-role-user/{id}', [
        'middleware' => 'acl_access:update-role-user/{id}',
        'as'         => 'update-role-user',
        'uses'       => 'RoleUserController@update',
    ]);

    Route::any('delete-role-user/{id}', [
        'middleware' => 'acl_access:delete-role-user/{id}',
        'as'         => 'delete-role-user',
        'uses'       => 'RoleUserController@destroy',
    ]);

    Route::any('user-profile', [
        'middleware' => 'acl_access:user-profile',
        'as'         => 'user-profile',
        'uses'       => 'UserController@create_user_info',
    ]);
    Route::any('add-profile', [
        'middleware' => 'acl_access:add-profile',
        'as'         => 'add-profile',
        'uses'       => 'UserController@create_profile',
    ]);

    Route::any('user-info/{value}', [
        'middleware' => 'acl_access:user-info/{value}',
        'as'         => 'user-info',
        'uses'       => 'UserController@user_info',
    ]);

    Route::any('inactive-user-dashboard', [
        'middleware' => 'acl_access:inactive-user-dashboard',
        'as'         => 'inactive-user-dashboard',
        'uses'       => 'UserController@inactive_user_dashboard',
    ]);
    Route::any('store-user-profile', [
        'middleware' => 'acl_access:store-user-profile',
        'as'         => 'store-user-profile',
        'uses'       => 'UserController@store_user_profile',
    ]);

    Route::any('edit-user-profile/{id}', [
        'middleware' => 'acl_access:edit-user-profile/{id}',
        'as'         => 'edit-user-profile',
        'uses'       => 'UserController@edit_user_profile',
    ]);

    Route::any('update-user-profile/{id}', [
        'middleware' => 'acl_access:update-user-profile/{id}',
        'as'         => 'update-user-profile',
        'uses'       => 'UserController@update_user_profile',
    ]);

    Route::any('store-meta-data', [
        'middleware' => 'acl_access:store-meta-data',
        'as'         => 'store-meta-data',
        'uses'       => 'UserController@store_meta_data',
    ]);

    Route::any('edit-meta-data/{id}', [
        'middleware' => 'acl_access:edit-meta-data/{id}',
        'as'         => 'edit-meta-data',
        'uses'       => 'UserController@edit_meta_data',
    ]);

    Route::any('update-meta-data/{id}', [
        'middleware' => 'acl_access:update-meta-data/{id}',
        'as'         => 'update-meta-data',
        'uses'       => 'UserController@update_meta_data',
    ]);

    Route::any('change-password-view', [
        'middleware' => 'acl_access:change-password-view',
        'as'         => 'change-password-view',
        'uses'       => 'UserController@change_user_password_view',
    ]);

    Route::any('update-password', [
        'middleware' => 'acl_access:update-password',
        'as'         => 'update-password',
        'uses'       => 'UserController@update_password',
    ]);

    Route::any('store-profile-image', [
        'middleware' => 'acl_access:store-profile-image',
        'as'         => 'store-profile-image',
        'uses'       => 'UserController@store_profile_image',
    ]);

    Route::any('edit-profile-image/{user_image_id}', [
        'middleware' => 'acl_access:edit-profile-image/{user_image_id}',
        'as'         => 'edit-profile-image',
        'uses'       => 'UserController@edit_profile_image',
    ]);
    Route::any('update-profile-image/{user_image_id}', [
        'middleware' => 'acl_access:update-profile-image/{user_image_id}',
        'as'         => 'update-profile-image',
        'uses'       => 'UserController@update_profile_image',
    ]);

});
