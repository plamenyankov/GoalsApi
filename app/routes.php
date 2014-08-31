<?php
Event::listen('Goals.*',function(){
   Mail::later(10,'emails.test',[],function($message){
      $message->to('p.s.yankov@abv.bg')->subject('Goallist');
   });
});
Route::get('/', function(){
    return View::make('home.body');
});
Route::get('goals/create',[
    'as'=>'goals_create',
    'uses'=>'GoalsController@create']);
Route::get('goals/{id}',  'GoalsController@show');

Route::get('goals','GoalsController@index');
Route::post('goals/type',[
    'as'=>'type',
    'uses'=> 'GoalsController@type'
]);
Route::post('goals/measure',[
    'as'=>'measure',
    'uses'=> 'GoalsController@measure'
]);
Route::post('goals/progression',[
    'as'=>'progression',
    'uses'=> 'GoalsController@progression'
]);
Route::post('goals/description',[
    'as'=>'description',
    'uses'=> 'GoalsController@description'
]);
Route::get('goals/store',[
    'as'=>'goals_create',
    'uses'=> 'GoalsController@store'
]);
Route::get('list',[
    'as'=>'list_show',
    'uses'=> 'ListController@show'
]);

