@extends('goals.simple')

@section('goalsettings')

<% Form::open(['route'=>'progression']) %>
<div class="large-6 columns large-offset-3">
    <div class="select-top">
        <label>Set Progress Time
            <select name="progress_type">
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="custom">Custom</option>
            </select>
        </label>
        <label>Set Frequency
            <select name="frequency">
                <option value="1">1/week</option>
                <option value="2">2/week</option>
                <option value="3">3/week</option>
                <option value="4">4/week</option>
                <option value="5">5/week</option>
                <option value="6">6/week</option>
                <option value="7">7/week</option>
                <option value="custom">Custom</option>
            </select>
        </label>
    <input type="text" name="prog_val" placeholder="Progression value (example:5,10,... min or other measurement)">
    <input type="text" name="start_val" placeholder="Start Value">
    <input type="text" name="end_val" placeholder="End Value">
<label>Automatic Deadline Recalculation:</label>
            <label for="radio1" class="inline"><input name="auto" type="radio" id="radio1" value="no" required="">NO</label>
            <label for="radio2" class="inline"><input name="auto" type="radio" id="radio2" value="yes" required="">YES</label>
<hr>
    <button type="submit" class="tiny">Go</button>
    <button  class="right tiny">Back</button>
</div>
</div>
<%Form::close() %>

@stop