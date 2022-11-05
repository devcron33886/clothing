@extends('layouts.customer')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('category', $product->category->name) }}">{{ $product->category->name }}</a>
                        </li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ $product->getFirstMediaUrl('image', 'preview') }}" id="current"
                                        alt="#">
                                </div>
                                <div class="images">
                                    @foreach ($product->image as $key => $media)
                                        <img src="{{ $media->getUrl('thumb') }}" class="img" alt="#">
                                    @endforeach

                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category"><i class="lni lni-tag"></i> <a
                                    href="{{ route('category', $product->name) }}">{{ $product->category->name }}</a></p>
                            <h3 class="price">{{ $product->formattedPrice() }}</h3>
                            <p class="info-text">{{ $product->description }}</p>

                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    @if ($product->status === 'Available')
                                        <form action="{{ route('cart.addToCart', ['id' => $product->id]) }}"
                                            class="form-inline">
                                            <div class="row">

                                                <div class="col-6">
                                                    <input min="1" size="10" value="1" type="text"
                                                        max="{{ $product->qty }}" name="qty" class="form-control"
                                                        placeholder="Qty" id="qty{{ $product->id }}">
                                                </div>
                                                <div class="col-6">

                                                    <div class="button cart-button">
                                                        <button type="submit" class="btn">Add to
                                                            Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <span class="label label-warning">
                                            <i class="fa fa-info-circle"></i> Out Of Stock
                                        </span>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
