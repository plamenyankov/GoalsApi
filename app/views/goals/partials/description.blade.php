@extends('goals.simple')

@section('goalsettings')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<% Form::open(['route'=>'description']) %>
<div class="large-6 columns select-top large-offset-3 goal-form">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="start_date" class="datepicker" placeholder="Start date">
    <input type="text" name="deadline" class="datepicker" placeholder="Deadline">
    <textarea name="descr" placeholder="Description"></textarea>
    <button type="submit" class="tiny">Go</button>
    <button  class="right tiny">Back</button>
</div>
<%Form::close() %>
<script>
    $(function() {
        $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
@stop

