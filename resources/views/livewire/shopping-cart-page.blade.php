<div class="section">
    <div class="container">
        <div class="row">
            <section class="cart-items col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <strong><i class="fa fa-warning"></i> Problem! </strong>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif


                <div class="row">
                    <div class="col-md-9">
                        <div class="card py-2">

                            <div class="card-body p-0">
                                @if (count($cart))
                                    <div class="table-responsive">
                                        <table class="table table-hover table-border-less ">
                                            <thead>
                                                <tr>
                                                    <th class="hidden-xs">Image</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $cartItem)
                                                    <livewire:cart-item :product="$cartItem->associatedModel" :cart-item="$cartItem"
                                                        :key="$cartItem->id" />
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-info m-2 flat text-center">
                                        <h5>
                                            <i class="fa fa-warning"></i> You have no items in the shopping basket
                                        </h5>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-danger pull-right" wire:click="removeAll">
                                    <i class="fa fa-remove"></i>
                                    Remove all items
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 pt-2">
                        @if (count($cart))
                            <ul class="list-group">

                                <li class="list-group-item">
                                    <h4 class="text-center"> Cart Summary</h4>
                                </li>

                                <li class="list-group-item">
                                    Total
                                    <span class="pull-right" style=" background: white">
                                        {{ number_format(Cart::getSubTotal()) }} RWF
                                    </span>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('shop.check-out') }}" class="btn btn-success">

                                        Check out
                                    </a>

                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('shop') }}" class="btn btn-info">

                                        Continue Shopping
                                    </a>

                                </li>
                            </ul>
                        @endif
                    </div>
                </div>

            </section>

        </div>
    </div>
</div>
