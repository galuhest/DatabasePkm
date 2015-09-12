
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('css/bootstrap2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/databasePkm.css')}}" rel="stylesheet" type="text/css"/>
    <title>Database PKM | @yield('title')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
@section('navbar')
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Database PKM UI</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/pkm/add">Upload</a>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Browse PKM<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/pkm/showall">All</a></li>
                        <li><a href="/pkm/view/category/1">PKM-P</a></li>
                        <li><a href="/pkm/view/category/2">PKM-T</a></li>
                        <li><a href="/pkm/view/category/3">PKM-K</a></li>
                        <li><a href="/pkm/view/category/4">PKM-M</a></li>
                        <li><a href="/pkm/view/category/5">PKM-KC</a></li>
                        <li><a href="/pkm/view/category/6">PKM-AI</a></li>
                        <li><a href="/pkm/view/category/7">PKM-GT</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/pkm/chart">Growth Chart</a>
                </li>
                <li>
                    <form action="/pkm/q=search" class="input-group padding-2">
                        <input role="search" type="text" name="s" class="form-control" placeholder="search...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary" name="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </form>
                </li>
                <li class="right">
                    <a class="btn btn-sm btn-danger" href="/auth/logout">Log out</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@show
<div class="container">
    @yield('content')
@section('footer')
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <span class="glyphicon glyphicon-console" ></span> with <span class="glyphicon glyphicon-heart"></span> by PTI BEM Fasilkom UI 2015
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Footer -->
@show
</body>
</html>