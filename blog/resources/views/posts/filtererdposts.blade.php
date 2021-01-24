@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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
