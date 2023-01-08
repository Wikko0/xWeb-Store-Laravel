@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/style-shop.css')}}">

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
        <div class="app">
            <div class="closewindow">
                <span>x</span>
            </div>
            <h2>Cart Details</h2>
            <i class="fa fa-shopping-basket fa-3x" aria-hidden="true"></i>
            <p>You have choose the following items.</p>
            <div class="tooltipshop">No item entered</div>
            <div class="tooltipshop2">Choose a product</div>
            <div class="app-body">
                <ul class="list">
                </ul>
            </div>
            <form action="/charge" method="post">
                @csrf
                <input type="hidden" name="amount" value="50">

                    <input type="submit" value="Check out" class="openpopup">
                 </form>

            <div class="openpopup2">
                Clear Cart
            </div>
        </div>
        <div id="tray">
            <div class="count">

            </div>
            <i class="fa fa-shopping-basket fa-2x" aria-hidden="true"></i>
        </div>

        <h2> Buy website when choose products to add in your cart. Price: 50$</h2>

        <div id="market">

            <div class="items product">
                <img src="{{asset('img/buy.png')}}">
            </div>
        </div>
            </div>
        </section>
        <!-- END EDMO HTML (Happy Coding!)-->
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
