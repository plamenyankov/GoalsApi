@extends('layout.default')
@section('content')
@yield('goalsettings')

<div class="row">
<div class="large-6 columns large-offset-3">
    <hr>
    <h5 class="subheader inline">Type:</h5>
    <span class="subheader push-right-10"><%$goal['type']%></span>
    <hr>
</div>
</div>

<div class="row">
<div class="large-6 columns large-offset-3">
    <h5 class="subheader inline">Name:</h5>
    <span class="subheader push-right-10"><% Session::get('name') %></span>
    </div>
    </div>

<div class="row">
    <div class="large-6 columns large-offset-3">
        <hr>
    <h5 class="subheader inline">Start Date:</h5>
    <span class="subheader push-right-10"><% Session::get('start_date')%></span>
</div>
</div>
<div class="row">
    <div class="large-6 columns large-offset-3">
        <hr>
    <h5 class="subheader inline">Deadline:</h5>
    <span class="subheader push-right-10"><% Session::get('deadline')%></span>
</div>
</div>
<div class="row">
    <div class="large-6 columns large-offset-3">
        <hr>
    <h5 class="subheader inline">Description:</h5>
    <span class="subheader push-right-10"><%Session::get('description')%></span>
    <hr>
</div>
</div>

<div class="row">
    <div class="large-6 columns large-offset-3">
        <h5 class="subheader inline">Measure Type:</h5>
        <span class="subheader push-right-10"><% Session::get('measureType') %></span>
    </div>
</div>

<div class="row">
    <div class="large-6 columns large-offset-3">
        <hr>
        <h5 class="subheader inline">Progression Type:</h5>
        <span class="subheader push-right-10"><%Session::get('progress_type')%></span>
        <hr>
    </div>
</div>

<div class="row">
    <div class="large-6 columns large-offset-3">

        <h5 class="subheader inline">Progress Time:</h5>
        <span class="subheader push-right-10"><%Session::get('progress_time')%></span>
        <hr>
    </div>
</div>

<div class="row">
    <div class="large-6 columns large-offset-3">
        <h5 class="subheader inline">Frequency:</h5>
        <span class="subheader push-right-10"><%Session::get('frequency')%> times per week</span>
        <hr>
    </div>
</div>
<div class="row">
    <div class="large-6 columns large-offset-3">

        <h5 class="subheader inline">Start Value:</h5>
        <span class="subheader push-right-10"><%Session::get('startValue')%></span>
        <hr>
    </div>
</div>
<div class="row">
    <div class="large-6 columns large-offset-3">

        <h5 class="subheader inline">End Value:</h5>
        <span class="subheader push-right-10"><%Session::get('endValue')%></span>
        <hr>
    </div>
</div>
<div class="row">
    <div class="large-6 columns large-offset-3">

        <h5 class="subheader inline">Automatic Deadline Recalculation:</h5>
        <span class="subheader push-right-10"><%Session::get('deadlineAuto')%></span>
        <hr>
    </div>
</div>
<div  class="row">
    <div class="large-6 columns large-offset-3">
        <a href="<%route('goals_create') %>"><button class="button tiny">Save</button></a>
</div>
</div>
@stop
