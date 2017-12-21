<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movies</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>


    </head>
    <body>
        <div class="container" id="content">


        </div>
    </body>
</html>
<script>
    function upcomingMovies(page) {
        var el = document.getElementById("content");
        var request = new XMLHttpRequest();
        request.open('GET', '/movieList/' + page, true);

        request.onload = function () {
            if (request.status >= 200 && request.status < 400) {
                // Success!
                var resp = request.responseText;
                el.innerHTML = resp;

            } else {
                el.innerHTML = "Error on loading movies";
            }
        };

        request.onerror = function () {
            el.innerHTML = "Error on loading movies";
        };

        request.send();
    }

    function showDetails(id, currentPage) {
        var request = new XMLHttpRequest();
        var el = document.getElementById("content");
        request.open('GET', '/showMovie/' + id + '/' + currentPage, true);

        request.onload = function () {
            if (request.status >= 200 && request.status < 400) {
                // Success!
                var resp = request.responseText;
                el.innerHTML = resp;
            } else {
                el.innerHTML = "Error";
            }
        };

        request.onerror = function () {
            el.innerHTML = "Error";
        };

        request.send();
    }
    window.onload = upcomingMovies(1);
</script>
