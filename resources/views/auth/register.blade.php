@extends('layouts.app')

@section('content')
    <main>
        <section class="our-services">
<div class="container">
    <div class="row justify-content-center">
                    <form method="POST" action="{{ route('Register') }}" id="submit">
                        @csrf



                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="blue-button">
                                    <a href="#" id="form-submit" class="btn" onclick="document.getElementById('submit').submit()">Register</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </section>
    </main>
@endsection

@section('header')
    <section class="banner banner-secondary" id="top" style="background-image: url({{asset('img/banner.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>{{Route::currentRouteName()}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
