<div>

    <section class="hero-area">
        <div class="container">
            @if (Session::has('message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <p>
                                <i class="fa fa-check-circle"></i>
                                {{ Session::get('message') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">

                        <div class="tns-outer" id="tns1-ow">
                            <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0">
                                <button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i
                                        class="lni lni-chevron-left"></i></button>
                                <button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide
                                <span class="current">4</span> of 2
                            </div>
                            <div id="tns1-mw" class="tns-ovh">
                                <div class="tns-inner" id="tns1-iw">
                                    <div class="hero-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                        id="tns1"
                                        style="transform: translate3d(-50%, 0px, 0px); transition-duration: 0s;">
                                        @foreach ($slides as $item)
                                            <div class="single-slider tns-item tns-slide-cloned"
                                                style="background-image: url({{ $item->image->getUrl('preview') }});"
                                                aria-hidden="true" tabindex="-1">
                                                <div class="content">

                                                    <div class="button">
                                                        <a href="{{-- {{ route('shop') }} --}}" class="btn">Shop Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">

                            <div class="hero-small-banner" style="background-image: url('images/hero/dress.png');">
                                <div class="content">

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-6 col-12">

                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <a class="btn btn-outline-primary" href="{{-- {{ route('shop') }} --}}">Shop Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach (\App\Models\Product::with('category')->where('status', '=', 'Available')->limit(4)->inRandomOrder()->get() as $item)
                    <livewire:card-product :product="$item" label=""/>
                @endforeach
            </div>
        </div>
    </section>
    <!--New Products -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>New Products</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Models\Product::with('category')->where('status','=','Available')->limit(12)->get() as $item)
                    <livewire:card-product :product="$item" label="NEW" />
                @endforeach
            </div>
        </div>
    </section>

</div>

