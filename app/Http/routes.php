<?php

Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@index']);

Route::get('logout', ['as' => 'auth.logout', 'uses' => 'UserController@logout']);
Route::get('projects', ['as' => 'view_projects', 'uses' => 'ProjectController@allProjects']);
Route::get('current', ['as' => 'view_current', 'uses' => 'ProjectController@viewCurrent']);
Route::get('completed', ['as' => 'view_completed', 'uses' => 'ProjectController@viewCompleted']);

Route::get('project/{slug}/', ['as' => 'view_project', 'uses' => 'ProjectController@view']);
Route::get('about-us', ['as' => 'about_us', 'uses' => 'MemberController@allMembers']);

Route::get('join', ['as' => 'join', 'uses' => 'EmailController@joinForm']);
Route::post('join', ['as' => 'join_process', 'uses' => 'EmailController@joinProcess']);

Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'EmailController@contactForm']);
Route::post('contact-us', ['as' => 'contact_process', 'uses' => 'EmailController@contactProcess']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

