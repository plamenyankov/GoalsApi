@extends('layout.default')

@section('content')
<div class="row">
<div class="large-6 columns large-offset-3">

    @if($errors->any())
    <ul>
    @foreach($errors->all() as $err)
    <li><% $err %></li>
    @endforeach
    </ul>
    @endif
    <% Form::open(['route'=>'type']) %>
    <div class="select-top">
            <label>Select Box
                <select name="goal_type">
                    <option value="simple">simple</option>
                    <option value="complex">complex</option>
                </select>
            </label>
    </div>
    <button type="submit" class="tiny">Submit</button>
    <button  class="right tiny">Cancel</button>
    <%Form::close() %>
</div>
</div>
@stop