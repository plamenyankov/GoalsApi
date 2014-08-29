@extends('goals.simple')

@section('goalsettings')

<% Form::open(['route'=>'measure']) %>
<div class="large-6 columns large-offset-3">
    <div class="select-top">
        <label>Select Goal Measurement
            <select name="measure_type">
                <option value="time">Time</option>
                <option value="tasks">Tasks</option>
                <option value="tasks_time">Tasks & Time</option>
            </select>
        </label>
    </div>
<!--    <div class="">-->
        <label>Select Progression Type
            <select name="progression_type">
                <option value="linear">Linear</option>
                <option value="progressive">Progressive</option>
                <option value="regressive">Regressive</option>
                <option value="custom">Custom</option>
            </select>
        </label>

    <button type="submit" class="tiny">Go</button>
    <button  class="right tiny">Back</button>
</div>
<%Form::close() %>

@stop