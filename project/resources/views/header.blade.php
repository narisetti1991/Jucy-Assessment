<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="col-md-12">
<div class="topnav">
    <a class="active" href="/project/public/">List</a>
    <a href="/project/public/details">Details</a>
    <a href="/project/public/locations">Locations</a>
    <div class="search-container">
        <form style="float: right" action="{{action('ContactController@index')}}">
            <input type="text" placeholder="Search.." value="{{isset($_GET['search']) ? $_GET['search']:''}}" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
</div>