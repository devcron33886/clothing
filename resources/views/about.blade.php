@extends('layouts.customer')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">About Us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="#">
                        <a href="https://www.youtube.com/shorts/tlHCnvk96eM">
                            class="glightbox video"><i class="lni lni-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">

                    <div class="content-right">
                        <h2>{{ config('app.name') }} - Your Trusted & Reliable Fashion Designer.</h2>
                        <p>Igihozo La maison de Couture is a social enterprise founded by two women and one man, and is into
                            tailoring and garment business.
                            To face and solve the problems of clothing industry, the efficiency of each link in apparel
                            production needs to be enhanced.
                        </p>

                    </div>
                </div>
            </div>
            <div class="row align-items-center py-4 ml-2">
                <div class="col-lg-6 col-md-12 col-12 ml-2 mr-2">
                    <div class=" content-left">
                        <h2>Vision</h2>
                        <p>The enterprise was founded by two women and one man with a vision to positively impacting the
                            society by supporting homeless girls through giving them opportunities to training, fighting
                            against poverty and in the process protecting them from sexual abuse and unplanned pregnancies
                            due to poverty as well as protecting their mental health.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-right">
                        <h2>Goals</h2>
                        <p>The enterprise goal is to have a factory big enough to take in many young girls for capacity
                            building and to increase the productivity of made in Rwanda clothes since second hand clothes
                            are not allowed on the Rwandan market anymore.</p>
                    </div>
                </div>
            </div>
    </section>
@endsection
