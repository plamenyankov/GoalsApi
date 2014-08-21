@extends('layout.default')

@section('content')
<script type="text/x-handlebars" id="test">
hello    {{type}}
</script>
<div class="messages"></div>
<script type="text/x-handlebars">
{{view App.FlashListView}}
{{outlet}}
</script>
<script type="text/x-handlebars" id="loading">
Loading...
</script>
<script type="text/x-handlebars" id="pagination">
<div class="pagination-centered">
<ul class="pagination">
  <li class="arrow unavailable"><a href="">&laquo;</a></li>
  {{#each totalPages}}
  <li class="current"><a href="">1</a></li>
  {{/each}}
  <li class="arrow"><a href="">&raquo;</a></li>
</ul>
</div>
</script>
<script type="text/x-handlebars" id="_alert">
<div data-alert >
  {{message}}
  <a href="#/goals" class="close">&times;</a>
</div>
</script>

<script type="text/x-handlebars" id="buttons">
<div class="button-bar ">
  <ul class="button-group radius round">
    <li><a href="#" {{action 'prevPage'}} class="tiny small large button  secondary [disabled]">
    <i class="fi-arrow-left  size-16"></i></a></li>
    <li><a href="#" {{action 'nextPage'}} class="tiny small large button  secondary [disabled]">
    <i class="fi-arrow-right size-16"></i></a></li>
  </ul>
</div>
</script>
<script type="text/x-handlebars" id="components/ember-goals">
<h4>Component</h4>
{{name}}
{{#each inputs}}
{{this}}
{{/each}}
</script>
<script type="text/x-handlebars" id="goals">
<div class="row">
 <div class="large-12 columns">
 {{partial "goalscontrols"}}
<h2 class="subheader">You have {{controller.content.length}} goals!</h2>
{{ember-goals style="width:600px,height:200px"}}
<div class="button-bar ">
  <ul class="button-group radius round">
    <li><a href="#" {{action 'prevPage'}} class="tiny small large button  secondary [disabled]">
    <i class="fi-arrow-left  size-16"></i></a></li>
    <li><a href="#" {{action 'nextPage'}} class="tiny small large button  secondary [disabled]">
    <i class="fi-arrow-right size-16"></i></a></li>
  </ul>
</div>
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
    {{#each}}
    <tr>
        <td>{{#link-to 'goal' id}}{{name}}{{/link-to}}</td>
        <td>{{description}}</td>
        <td>{{deadline}}</td>
        <td>Content Goes Here</td>
    </tr>
    {{/each}}
</tbody>
    </table>
<p>{{#link-to 'goals.new'}}<button class="button animated bounceInLeft tiny"><i class="fi-plus size-16"></i> Add Goal</button>{{/link-to}} </p>
</div>
{{outlet}}
</div>
</script>
<script type="text/x-handlebars" id="goal/_edit">
{{input type="text" value=ch.description}}
<button class="tiny right" {{action 'done'}} >done</button></div>
</script>
<script type="text/x-handlebars" id="goal/_target">
{{input type="text" value=chh.1.target}}
<button class="tiny right" {{action 'done'}} >done</button></div>
</script>
<script type="text/x-handlebars" id="goal">
    <div class="row">
 <div class="large-12 columns">
<div>
{{#link-to "goals.index" class="tiny small large button back-btn"}}<i class="fi-arrow-left  size-16"></i> Back{{/link-to}}
<h1>{{name.description}}</h1>
   <h3 class="goal-title">{{ch.id}}. {{ch.name}} - <small> {{ch.date}}</small></h3>
<article class="media">
<div class="description"> {{ch.description}}
<button class="tiny right">edit</button></div>
</article>
</div>
{{partial 'goal/edit'}}

{{#each chh}}
<article class="media">
<div class="description">{{plusOne _view.contentIndex}}. {{target}} -- {{time}} </div>
</article>
{{/each}}
<p>{{#link-to 'goal.new'}}<button class="button animated bounceInLeft tiny">
<i class="fi-plus size-16"></i> Add</button>{{/link-to}} </p>
 </div>
{{outlet}}
 </div>
</script>
<script type="text/x-handlebars" id="bbb">
{{input valueBinding="fff"  placeholder="BBB" id="additional" }}
</script>
<script type="text/x-handlebars" id="first">
first
</script>
<script type="text/x-handlebars" id="second">
second
</script><script type="text/x-handlebars" id="containgoal">
main
</script>
<script type="text/x-handlebars" id="aaa">
    <div class="large-6 columns">
    <form {{action addGoal on="submit"}}>
{{chhh}}

 {{view Ember.TextField type="hidden" valueBinding="ch.id"}}
{{view Ember.TextField valueBinding="targetv" classBinding="errorname:error" placeholder="Target" id="name" }}
{{#if errorname}} <small class="error">{{errorname}}</small>{{/if}}
{{view Ember.TextField valueBinding="time" classBinding="errord:error" placeholder="Time" id="description" }}
{{#if errord}} <small class="error">{{errord}}</small>{{/if}}
<button type="submit" class="tiny">Submit</button>
<button {{action 'cancel'}} class="right tiny">Cancel</button>
</form>
</div>
</script>
<script type="text/x-handlebars" id="goal/new">
<div class="large-6 columns">
    <form {{action addGoal on="submit"}}>
    {{{dynamic}}}

   {{view Ember.TextField type="hidden" valueBinding="ch.id"}}
{{view Ember.TextField valueBinding="targetv" classBinding="errorname:error" placeholder="Target" id="name" }}
{{#if errorname}} <small class="error">{{errorname}}</small>{{/if}}
{{view Ember.TextField valueBinding="time" classBinding="errord:error" placeholder="Time" id="description" }}
{{#if errord}} <small class="error">{{errord}}</small>{{/if}}
<button type="submit" class="tiny">Submit</button>
<button {{action 'cancel'}} class="right tiny">Cancel</button>
</form>
</div>
</script><script type="text/x-handlebars" id="goals/new">
<div class="large-6 columns">
    <form {{action addGoal on="submit"}}>
{{view Ember.TextField valueBinding="name" classBinding="errorname:error" placeholder="Add Goal" id="name" }}
{{#if errorname}} <small class="error">{{errorname}}</small>{{/if}}
{{view Ember.TextField valueBinding="description" classBinding="errord:error" placeholder="Date" id="description" }}
{{#if errord}} <small class="error">{{errord}}</small>{{/if}}
<button type="submit" class="tiny" >Submit</button>
<button {{action 'cancel' id}} class="right tiny">Cancel</button>
</form>
</div>
</script>
<script type="text/x-handlebars" id="_goalscontrols">
<dl class="sub-nav" style="float: right; margin-top: 1em;">
    <dt><i {{bind-attr class="sortAscending:fi-arrow-down:fi-arrow-up"}} size-16"></i> Sort by:</dt>
    <dd><a {{action pushSort 'name'}}>Name</a> </dd>
    <dd><a {{action pushSort 'description'}}>Description</a> </dd>
</dl>
</script>

@stop