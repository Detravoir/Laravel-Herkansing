@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin page') }}</div>
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <form method="GET" action="{{ url("update/{$post->id}") }}">
                                    <h4>{{$post->song_artist . " - " . $post->song_title}}</h4>
                                    <h5>Posted by {{$post->user_name}}</h5>
                                    Press button to hide or unhide the song.<br/>
                                    <button type="submit" class="btn btn-primary">
                                        @if($post->visable == '1')
                                            visable
                                        @elseif($post->visable == '0')
                                            hidden
                                        @endif
                                    </button>
                                    <br/>
                                    @if($user->permission == '1')
                                        <a href="{{url("/delete/{$post->id}")}}">Delete the song</a>
                                    @endif
                                    <br/>
                                    <br/>
                                    <br/>
                                </form>
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
