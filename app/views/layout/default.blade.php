<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Goals</title>


    <% HTML::style('css/main.css') %>
    <% HTML::style('css/foundation-icons.css') %>
    <% HTML::style('css/animate.css') %>
    <script src="<% URL::asset('js/jquery.js') %>"></script>
    <script src="<% URL::asset('js/foundation.min.js') %>"></script>
    <script src="<% URL::asset('js/handlebars-1.1.2.js') %>"></script>
    <script src="/goals/bower_components/chartjs/Chart.js"></script>


</head>
<body>
@include('partials.navbar')

<div class="row">

    @yield('content')

</div>
</body>
<script>
    $('.button').addClass('animated bounceInLeft');
    $('table').addClass('animated bounceInLeft');
    $('li').addClass('animated bounce');
    $(document).foundation();
</script>
</html>