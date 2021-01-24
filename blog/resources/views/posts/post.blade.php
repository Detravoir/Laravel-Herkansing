@extends('layouts.app');

@section('content');

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post Song</div>
                    @if(count($errors) > 0 )
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif

                    @if(session('response'))
                        <div class="alert alert-succes">{{session('response')}}</div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('addSong') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="songname" class="col-md-4 col-form-label text-md-right">Song name</label>

                                <div class="col-md-6">
                                    <input id="songname" type="text" class="form-control @error('songname') is-invalid @enderror" name="songname" required>

                                    @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="artist" class="col-md-4 col-form-label text-md-right">Artist</label>

                                <div class="col-md-6">
                                    <input id="artist" type="text" class="form-control @error('artist') is-invalid @enderror" name="artist" required>

                                    @error('artist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" required>

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">Song url</label>

                                <div class="col-md-6">
                                    Voer hier de youtube link in.<br/>
                                    Voer hier alleen het deel van de link in <br/>
                                    NA watch?v= en voor de & <br/>
                                    <b>Voorbeeld:</b><br/>
                                    https://www.youtube.com/watch?v=<u><b>8GW6sLrK40k</b></u>&ab_channel=ElectronicGems
                                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" required>

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add song
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
