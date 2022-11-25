@extends('layouts.app')

@section('content')

    <main>
        <section class="our-services">
            <div class="container">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            <ul>{{session('success')}}</ul>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            @foreach ($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </div>
                    @endif
                </div>
                <form method="POST" action="/contact" id="submit">
                    @csrf

                    <div class="mb-3">
                        <label>Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('body') is-invalid @enderror">
                        @error('subject')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Body</label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror">{{old('body')}}</textarea>
                        @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <div class="blue-button">
                                <a href="#" id="form-submit" class="btn" onclick="document.getElementById('submit').submit()">Submit</a>
                            </div>
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
