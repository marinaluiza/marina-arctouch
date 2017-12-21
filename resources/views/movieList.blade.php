

<h2>Movies Upcoming</h2>
<div id="movieList">
    <div class="list-group">
        @foreach($result['results'] as $movie)
            <a onclick="showDetails('{{$movie['id']}}', '{{$result['page']}}')" href="#"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <ul>
                            <div><img src="{{$config['images']['base_url']}}/{{$config['images']['poster_sizes'][0]}}/{{$movie['poster_path']}}"></div>
                            <li>{{ $movie['title'] }}</li>
                            <li>
                                @foreach($movie['genre_ids'] as $genreId)
                                    {{ $genres[$genreId] }}@if(!$loop->last),@endif
                                @endforeach
                            </li>
                            <li>{{ $movie['release_date'] }}</li>
                        </ul>
                    </div>

                </div>
            </a>
        @endforeach
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for($i = 1; $i <= $result['total_pages']; $i++)
                <li><a onclick="upcomingMovies({{$i}})" href="#">{{$i}}</a></li>
            @endfor
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</div>


