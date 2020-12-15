@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            @if ( !Auth::check() )
                <h1 class="text-center">You're not signed in. Please <a href="{{ route('login') }}">{{ __('sign in') }}</a> to see your wishlist</h1>
                <hr>
            @else
                @foreach( $wishlist as $wish )
                    @if ( Auth::id() == $wish->user_id || Auth::id() == "1")
                        <div class="row mb-3 border-dark border">
                            <div class="col-12 row m-2">
                                <div class="col-2">
                                    <img class="img-thumbnail image-fluid rounded" height="" width="100%" src="{{ url('/images/'.$wish->thumbnail_name) }}">
                                </div>
                                <div class="col-5 align-self-center">
                                    <h1>{{ $wish->name }}</h1>
                                    <h3>{{ $wish->description }}</h3>
                                </div>
                                <div class="col-5 align-self-center">
                                    <h4>Added on {{ $wish->created_at->format('d/m/Y') }} <a class="text-danger" href="{{ route('wishlists.destroy', $wish->id)}}">(remove)</a></h4>
                                    <h1>
                                        <a href="{{ $wish->product_link }}">{{ $wish->price }}</a>
                                        <a href="{{ route('wishlists.edit', $wish->id)}}" class="btn btn-success w-25">Edit</a>
                                        <h3 class="">Added by: {{ $wish->user_name }}</h3>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection
