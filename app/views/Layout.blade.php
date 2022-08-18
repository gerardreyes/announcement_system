<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Announcement</title>
        {{HTML::script('jQuery/jquery.min.js')}}
        {{HTML::script('Bootstrap/js/bootstrap.bundle.min.js')}}
        {{HTML::style('Bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('FontAwesome/css/all.css')}}
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                @include('Header')
            </div>

            <div class="panel-body">
                @yield('Content')
            </div>
        </div>
    </body>
</html>