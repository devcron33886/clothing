@extends('layouts.customer')
@section('title', '|Shopping-cart')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Shopping Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">Shopping Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart section">
        <livewire:shopping-cart-page/>
    </div>

@endsection
