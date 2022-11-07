<footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo/logo.png') }}" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="footer-newsletter">
                            <h4 class="title">
                                Subscribe to our Newsletter
                                <span>Get all the latest information, Sales and Offers.</span>
                            </h4>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="newsletter-form-head">
                                <form action="{{ route('newsletters.subscribe') }}" method="POST"
                                    class="newsletter-form">
                                    @csrf
                                    <input type="email" name="email" placeholder="Email address here..."
                                        type="email">
                                    <div class="button">
                                        <button type="submit" class="btn">Subscribe<span
                                                class="dir-part"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <!-- Start Footer Middle -->
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Get In Touch With Us</h3>
                            @foreach ($settings as $setting)
                                <p class="phone">Phone: {{ $setting->phone_number_1 ?? '' }}</p>
                                <p class="phone">WhatsApp: {{ $setting->whatsapp ?? '' }}</p>
                                <p class="phone">Address: {{ $setting->address ?? '' }}</p>
                                <p class="mail">
                                    <a href="mailto:sales@igihozocouture.com">{{ $setting->email ?? '' }}</a>
                                </p>
                            @endforeach

                        </div>
                        <!-- End Single Widget -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Information</h3>
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('shop') }}">All Collections</a></li>
                                <li><a href="{{ route('home') }}">FAQs Page</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Shop Departments</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12">
                        <div class="copyright">
                            <p>&copy; Reserved<a href="{{ route('home') }}" rel="nofollow">
                                    {{ config('app.name') }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <ul class="socila">
                            <li>
                                <span>Follow Us On:</span>
                            </li>
                            <li><a href="javascript:void(0)" target="_blank"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li><a href="javascript:void(0)" target="_blank"><i
                                        class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)" target="_blank"><i class="lni lni-instagram"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
