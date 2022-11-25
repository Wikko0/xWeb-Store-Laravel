@extends('layouts.app')

@section('content')

    <main>
        <section class="our-services">
            <div class="container">
                    <form method="POST" action="{{ route('Login') }}" id="submit">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="blue-button">
                                    <a href="#" id="form-submit" class="btn" onclick="document.getElementById('submit').submit()">Submit</a>
                                </div>

                                @if (Route::has('Reset Password'))
                                    <a class="btn btn-link" href="{{ route('Reset Password') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
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
