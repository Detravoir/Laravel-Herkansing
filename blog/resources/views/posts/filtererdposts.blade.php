@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="col-lg-8">

                        <form method="POST" action='{{url("/filter")}}'>
                            {{csrf_field()}}
                            <label for="filter">Filter between genres</label>
                            <br/>
                            <select name="filter">
                                <option>Choose genre</option>
                                @foreach($array as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default">Filter</button>
                        </form>

                        <form method="POST" action='{{url("/search")}}'>
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for ...">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    Search
                                </button>
                            </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)

                                <h4>{{$post->song_artist . " - " . $post->song_title}}</h4>

                                <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/{{$post->song_url}}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                                <h5>Posted by {{$post->user_name}}</h5>

                                <br/>
                                <br/>
                            @endforeach
                        @else

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
