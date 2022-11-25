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
                                    {!! \Illuminate\Support\Str::words($information->information, 50, '....') !!}
                                </p>
                            @empty
                                <p>
                                    No new information!
                                </p>
                            @endforelse
                            <div class="blue-button">
                                <a href="/about">Discover More</a>
                            </div>

                            <br>
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
                <div class="row">
                    @foreach($media->take(3) as $value)
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
                                    <a href="/about">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                    <div class="section-heading">
                        <span>Contact Us</span>
                        <h2>We can assist you at any time.</h2>
                    </div>
                    <!-- Modal button -->

                    <div class="blue-button">
                        <a href="/contact">Talk to us</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('header')
    <section class="banner" id="top" style="background-image: url({{asset('img/frame.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Open-source content management system</h2>
                        <div class="blue-button">
                            <a href="/account">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
