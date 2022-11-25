@extends('layouts.app')

@section('content')

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>About website</h4>
                            @forelse($informations as $information)
                                <p>
                                    {!! $information->information !!}
                                </p>
                            @empty
                                <p>
                                    No new information!
                                </p>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-5">
                        @forelse($settings as $setting)
                            <img src="{{"storage/".$setting->web_image}}" class="img-fluid" alt="">
                        @empty
                            <img src="img/fullweb.png" class="img-fluid" alt="">
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Media of website.</h2>
                        </div>
                    </div>
                </div>
                @foreach($media->chunk(3) as $row_media)
                <div class="row">
                    @foreach($row_media as $value)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="featured-item">
                                <div class="thumb">
                                    <div class="thumb-img">
                                        <img src="{{"storage/".$value->image}}" alt="">
                                    </div>

                                </div>

                                <div class="down-content">
                                    <h4>{{$value->title}}</h4>

                                    <p>{{$value->description}} </p>

                                    <div class="text-button">

                                    </div>

                                </div>


                            </div>

                        </div>
                    @endforeach
                </div>

                @endforeach
            </div>
        </section>

        <section class="popular-places" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Team</span>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">

                    @forelse($teams as $team)
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="{{"/storage/".$team->picture}}" alt="">
                                </div>
                                <div class="text-content">
                                    <h4>{{$team->name}}</h4>
                                    <span>{{$team->position}}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/victor.jpg" alt="">
                                </div>
                                <div class="text-content">
                                    <h4>Victor Minchev</h4>
                                    <span>Web Maker</span>
                                </div>
                            </div>
                        </div>
                    @endforelse

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
