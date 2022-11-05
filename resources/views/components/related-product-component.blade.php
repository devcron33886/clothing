<div class="container">
    <div class="row">
        @foreach ($relatedProducts as $product)
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-product">
                    <div class="product-image">
                        @if($product->image)
                            <img src="{{ $product->getFirstMediaUrl('image','image') }}"
                                 alt="{{ $product->name }}" style="max-height: 600px !important; max-width: 400px !important;">
                        @endif
                        <div class="py-5 align-center">
                            <a href="{{ route('product-details',$product->slug) }}"
                               class="btn btn-primary pt-2"><i
                                    class="lni lni-eye"></i> View Details</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $product->category->name }}</span>
                        <h4 class="title">
                            <a href="{{ route('product-details',$product->slug) }}">{{ $product->name }}</a>
                        </h4>

                        <div class="price">
                            <span>{{ $product->formattedPrice() }}</span>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>
