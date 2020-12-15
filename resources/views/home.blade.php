@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Keep forgetting what you want?</h1>
                    <div class="row">
                        <div class="col-md-7 pl-4">
                            <p class="pt-5 pr-5"><strong>The Wishlist</strong> is an easy to use web-based application that will help you collect,<br>
                                organize and keep track of the things you want.<br>
                                What’s on your wishlist?</p>
                            @if (Auth::check())
                                <h4>Welcome back, {{ Auth::user()->name }}</h4>
                                <a href="wishlist"><button class="btn btn-danger">See your wishlist</button></a>
                            @else
                                <a href="/register"><button class="btn btn-success">Sign up</button></a>
                                <a href="/login"><button class="btn btn-primary">Sign in</button></a>
                            @endif
                        </div>
                        <div class="col-md-5 pr-4">
                            <img class="card-img" src="https://i.pinimg.com/originals/4e/c2/82/4ec28257d45426031f3a567bd4191dbc.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
