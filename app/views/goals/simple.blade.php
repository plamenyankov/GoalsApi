@extends('layout.default')

@section('content')
<% Form::open(['route'=>'measure']) %>

<div class="large-6 columns select-top large-offset-3">
@include('goals.partials.description')
<button type="submit" class="tiny">Go</button>
<button  class="right tiny">Back</button>
    </div>
<%Form::close() %>
@stop
