<div class="col-lg-4 col-md-6 col-12">
    <div class="single-product">
        <div class="product-image">
            <img src="{{ $product->getFirstMediaUrl('image', 'preview') }}" alt="{{ $product->name }}"
                style="width: 100%;height: 100%;object-fit: cover">
            @if(!empty($label))
                <span class="new-tag">{{ $label }}</span>
            @endif


            @if ($product->status === 'Available')
                @if ($added)
                    <div class="button">
                        <button type="button" wire:click="remove" wire:loading.attr="disabled"
                            class="btn btn-danger" style="background-color:red !important;">
                            Remove
                        </button>
                    </div>
                @else
                    <div class="button">
                        <button type="button" wire:loading.attr="disabled" wire:click="add"
                            class="btn">
                            <i class="lni lni-cart"></i>
                            Add to Cart
                        </button>
                    </div>
                @endif
            @else
                <div class="button">
                    <button type="button" class="btn btn-warning"
                        disabled="">
                        <i class="fa fa-ban"></i>
                        Not Available
                    </button>
                </div>
            @endif

        </div>
        <div class="product-info">
            <span class="category">{{ $product->category->name }}</span>
            <h4 class="title">
                <a href="{{ route('product',$product->slug) }}">{{ $product->name }}</a>
            </h4>
            <ul class="review">

            </ul>
            <div class="price">
                <span>{{ $product->formattedPrice() }}</span>
            </div>
        </div>
    </div>

</div>

{{-- <div class="product rounded" wire:loading.class.delay="loading">
    <div class="product-img rounded">
        <a href="{{ route('products.details-view', $product->id) }}">
            <div style="height: 232px;overflow: hidden">
                <img style="width: 100%;height: 100%;object-fit: cover" class="rounded"
                    src="{{ $product->getFirstMediaUrl('image', 'preview') }}" alt="{{ $product->name }}">
                alt="">
            </div>
        </a>

        <div class="product-label">
            @if ($product->discount > 0)
                <span class="sale rounded">-{{ $product->discount }}%</span>
            @endif
            @if (!empty($label))
                <span class="new rounded-pill">{{ $label }}</span>
            @endif
        </div>
    </div>
    <div class="product-body rounded">
        <p class="product-category">{{ $product->category->name }}</p>
        <h3 class="product-name" style="height: 20px;">
            <a href="javascript:void(0);">
                {{ str_limit($product->name, 25) }}
            </a>
        </h3>
        <h4 class="product-price">
            {{ number_format($product->getRealPrice()) }}
            @if ($product->discount > 0)
                <del class="product-old-price">
                    {{ number_format($product->price) }}
                </del>
            @endif
            <small>/ {{ $product->measure }}</small>
        </h4>
        <div class="bg-white rounded m-2">
            @if ($product->status === 'Available')
                @if ($added)
                    <button type="button" wire:click="remove" wire:loading.attr="disabled"
                        class="btn btn-sm text-uppercase btn-danger rounded-sm center-block">
                        Remove
                    </button>
                @else
                    <button type="button" wire:loading.attr="disabled" wire:click="add"
                        class="btn btn-sm text-uppercase btn-success rounded-sm center-block">
                        <i class="fa fa-shopping-bag"></i>&nbsp;
                        Add to basket
                    </button>
                @endif
            @else
                <button type="button" class="btn btn-sm text-uppercase btn-danger rounded-sm center-block"
                    disabled="">
                    <i class="fa fa-ban"></i>
                    Out of stock
                </button>
            @endif
        </div>
    </div>

</div> --}}
