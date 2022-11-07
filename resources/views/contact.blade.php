@extends('layouts.customer')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Contact Us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Contact Us</h2>
                            <p>Feel free to drop us a message</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="single-info-head">
                                @foreach($settings as $setting)
                                    <div class="single-info">
                                        <i class="lni lni-map"></i>
                                        <h3>Address</h3>
                                        <ul>
                                            <li>{{ $setting->address ??'' }}</li>
                                        </ul>
                                    </div>


                                    <div class="single-info">
                                        <i class="lni lni-phone"></i>
                                        <h3>Call us on</h3>
                                        <ul>
                                            <li><a href="tel:{{ $setting->phone }}">{{ $setting->phone_number_1 }}</a></li>

                                        </ul>
                                    </div>


                                    <div class="single-info">
                                        <i class="lni lni-envelope"></i>
                                        <h3>Mail at</h3>
                                        <ul>
                                            <li>
                                                <a href="mailto:sales@igihozocouture.com">{{ $setting->email_1 ??'' }}</a>
                                            </li>

                                        </ul>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
