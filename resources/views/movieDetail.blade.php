<h2>Movie Detail</h2>
<div class="row">
    <div class="col-md">
        <div><img src="{{$config['images']['base_url']}}/{{$config['images']['poster_sizes'][3]}}/{{$movie['poster_path']}}"></div>
    </div>
    <div class="col-md">
        <ul>
            <li>{{$movie['title']}}</li>
            <li>{{$movie['genres']}}</li>
            <li>{{$movie['overview']}}</li>
            <li>{{$movie['release_date']}}</li>
        </ul>
    </div>
</div>

<button type="button" class="btn btn-light" onclick="upcomingMovies({{$page}})">Voltar</button>

