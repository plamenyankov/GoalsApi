@extends('layout.default')

@section('content')
<div class="row">
    <div class="large-12 columns">

        <h2 class="subheader">You have <% $count %> goals!</h2>
        <% $goals->links() %>

        <table class="responsive">
            <thead>
            <tr>
                <th width="200">Goal</th>
                <th width="350">Description</th>
                <th width="200">Deadline</th>
                <th width="200">Progress</th>
            </tr>
            </thead>
            <tbody>
            @foreach($goals as $goal)
            <tr>
                <td><% link_to('goals/'.$goal['id'],$goal['name'],['id'=>$goal['id']]) %></td>
                <td><% $goal['description'] %></td>
                <td>@if( isset($goal['subgoal']))
                    @foreach($goal['subgoal'] as $go)
                    <% $go['end_date'] %>
                    @endforeach
                    @endif</td>
                <td>Content Goes Here</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <p><a href="<% route('goals_create')%>"><button class="button animated bounceInLeft tiny"><i class="fi-plus size-16"></i> Add Goal</button></a></p>
    </div>

</div>
@stop