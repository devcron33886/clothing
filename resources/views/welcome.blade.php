@extends('layouts.customer')
@section('styles')
@endsection

@section('title', ' - Home')
@section('description','Igihozo couture is the best fahion designer shop located in in Kigali City tower(KCT) 2nd Floor (F7).')

@section('content')
    <livewire:home-page :slides="$slides" :categories="$categories" />
    <section class="banner section">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner" style="background-image:url('{{ $category->image->getUrl('preview') }}')">
                            <div class="content">
                                <h2 class="text-white">{{ $category->name }}</h2>

                                <div class="button">
                                    <a href="product-grids.html" class="btn">Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="shipping-info">
        <div class="container">
            <ul>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
