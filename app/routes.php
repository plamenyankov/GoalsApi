<?php
Event::listen('Goals.*',function(){
   Mail::later(10,'emails.test',[],function($message){
      $message->to('p.s.yankov@abv.bg')->subject('Goallist');
   });
});
Route::get('/', function(){
    return View::make('home.body');
});

Route::resource('goals', 'GoalsController');
Route::post('goals/type',[
    'as'=>'type',
    'uses'=> 'GoalsController@type'
]);
Route::post('goals/descr',[
    'as'=>'measure',
    'uses'=> 'GoalsController@measure'
]);
Route::resource('targets', 'TargetsController');
