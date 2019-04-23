<?php

app()->singleton('App\Services\Twitter', function() {
    return new \App\Services\Twitter('asdfsdafsdfdsf');
});

Route::get('/', function(){
    dd(app('App\Example'));

    return view('welcome');
});

Route::resource('projects', 'ProjectsController');

Route::post('projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');