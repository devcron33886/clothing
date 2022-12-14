@extends('layouts.customer')
@section('title', '|Collection')
@section('description','The best fashion desinger in kigali with high quality dresses, suits , jump suits shirts etc.')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Collection</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">All Collections</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">

                    <div class="product-sidebar">

                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach (App\Models\Category::all() as $category)
                                    <li>
                                        <a href="{{ route('category', $category->slug) }}">{{ $category->name }}
                                        </a><span>({{ $category->products->count() }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">

                                        <h3 class="total-show-product">Showing:
                                            <span>{{ $products->count() }} {{ Str::plural('product', $products->count()) }}</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                 aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @forelse ($products as $item)
                                        <livewire:card-product :product="$item" label=""/>
                                    @empty
                                        <li>
                                            <div class="alert alert-info rounded-sm shadow-sm">
                                                <p>
                                                    Your search keyword could not math anything. Try with a different
                                                    keyword.
                                                </p>
                                            </div>
                                        </li>
                                    @endforelse
                                </div>

                                <div class="row">
                                    <div class="col-12">

                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                {{ $products->links() }}
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
