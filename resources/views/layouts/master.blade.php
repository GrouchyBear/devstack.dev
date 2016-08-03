<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- External Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>

    <!-- Internal Links -->
    <link rel="stylesheet" href="{{ URL::to('src/css/style.css') }}">

</head>
    <body>
    @include('includes.header')
        @yield('image')
        <div class="container">
            @yield('content')
        </div>




    <script src="http://cdnjs.cloudflare.com/ajax/libs/ocanvas/2.8.1/ocanvas.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Internal Links -->
    <script src="{{URL::to('src/js/typed.js')}}"></script>
    <script src="{{URL::to('src/js/app.js')}}"></script>
    <script src="{{URL::to('src/js/typing.js')}}"></script>
    </body>
</html>
