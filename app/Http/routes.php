<?php

Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@index']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'UserController@logout']);
Route::get('projects', ['as' => 'view_projects', 'uses' => 'ProjectController@allProjects']);
Route::get('current', ['as' => 'view_current', 'uses' => 'ProjectController@viewCurrent']);
Route::get('completed', ['as' => 'view_completed', 'uses' => 'ProjectController@viewCompleted']);
Route::get('about-us', ['as' => 'about_us', 'uses' => 'MemberController@allMembers']);
Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'EmailController@contactForm']);
Route::post('contact-us', ['as' => 'contact_process', 'uses' => 'EmailController@contactProcess']);

Route::group(['prefix' => 'project'], function()
{
    //view single project
    Route::get('{slug}/', ['as' => 'view_project', 'uses' => 'ProjectController@view']);
    //watch episode (find by project + number + slug)
    Route::get('{project}/{number}/{slug}/', ['as' => 'watch_episode_slug', 'uses' => 'EpisodeController@watchEpisodeSlug']);
    //watch episode (find by project + number)
    Route::get('{project}/{number}/', ['as' => 'watch_episode', 'uses' => 'EpisodeController@watchEpisode']);
});

Route::group(['prefix' => 'blog'], function()
{
    Route::get('/', ['as' => 'view_posts', 'uses' => 'BlogController@viewPosts']);
    Route::get('{id}/{slug}/', ['as' => 'view_post_slug', 'uses' => 'BlogController@viewPostSlug']);
    Route::get('{id}/', ['as' => 'view_post', 'uses' => 'BlogController@viewPost']);
});

Route::get('join', ['as' => 'join', 'uses' => 'EmailController@joinForm']);
Route::post('join', ['as' => 'join_process', 'uses' => 'EmailController@joinProcess']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin'], function()
{
    Route::get('/', ['as' => 'admin_index', 'uses' => 'Admin\AdminController@index', 'middleware' => ['auth', 'admin'] ]);

});


