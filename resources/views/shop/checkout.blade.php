@extends('layouts.customer')
@section('title', '|Check out')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Check out</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('shop') }}">All Collections</a></li>
                        <li>Check out</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout-wrapper section">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success flat">
                    <p>
                        <i class="fa fa-check-circle"></i>
                        {{ Session::get('message') }}
                    </p>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('order.store') }}" method="post">
                                @csrf
                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <div class="form-group  {{ $errors->has('client_name')?'has-error':''}} ">
                                            <label for="client_name" class="control-label">Name</label>
                                            <input type="text" placeholder="Full name"
                                                   value="{{Request::old('client_name')}}"
                                                   class="form-control rounded-sm" name="client_name"
                                                   id="client_name" maxlength="120">
                                            @if ($errors->has('client_name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('client_name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  {{ $errors->has('email')?'has-error':''}} ">
                                            <label for="client_email" class="control-label">Email</label>
                                            <div>
                                                <input type="email" placeholder="Email address"
                                                       value="{{Request::old('email')}}"
                                                       class="form-control rounded-sm" name="email"
                                                       id="client_email" maxlength="120">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="form-group  {{ $errors->has('shipping_address')?'has-error':''}} ">
                                            <label for="shipping_address" class="control-label">Address</label>
                                            <input type="text" placeholder="Shipping address"
                                                   value="{{Request::old('shipping_address')}}"
                                                   class="form-control rounded-sm" name="shipping_address"
                                                   id="shipping_address" maxlength="120">
                                            @if ($errors->has('shipping_address'))
                                                <span class="text-danger">
                                                   {{ $errors->first('shipping_address') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  {{ $errors->has('client_phone')?'has-error':''}}">
                                            <label for="client_phone" class="control-label">Phone</label>
                                            <input type="text"
                                                   placeholder="Phone number"
                                                   value="{{Request::old('client_phone')}}" maxlength="13"
                                                   class="form-control rounded-sm" name="client_phone"
                                                   id="client_phone">
                                            @if ($errors->has('client_phone'))
                                                <span class="text-danger">
                                                  {{ $errors->first('client_phone') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                                            <select
                                                class="form-control select2 {{ $errors->has('payment') ? 'is-invalid' : '' }}"
                                                name="payment_id" id="payment_id">
                                                @foreach($payments as $id => $payment)
                                                    <option
                                                        value="{{ $payment->id }}" {{ old('payment_id') == $payment->id ? 'selected' : '' }}>{{ $payment->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('payment'))
                                                <span class="text-danger">{{ $errors->first('payment') }}</span>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shipping_id">{{ trans('cruds.order.fields.shipping') }}</label>
                                            <select
                                                class="form-control select2 {{ $errors->has('shipping') ? 'is-invalid' : '' }}"
                                                name="shipping_id" id="shipping_id">
                                                @foreach($shippings as $shipping)
                                                    <option
                                                        value="{{ $shipping->id }}" {{ old('shipping_id') == $shipping->id ? 'selected' : '' }}>{{ $shipping->title }}
                                                        ({{ $shipping->formattedPrice() }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('shipping'))
                                                <span class="text-danger">{{ $errors->first('shipping') }}</span>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.order.fields.shipping_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group  {{ $errors->has('notes')?'has-error':''}}">
                                            <label for="notes" class="control-label">Note</label>
                                            <textarea rows="5" maxlength="2000"
                                                      style="resize: vertical"
                                                      placeholder="Write something extra here.. like notes. (Optional)"
                                                      class="form-control rounded-sm" name="notes"
                                                      id="notes">{{Request::old('notes')}}</textarea>
                                            @if ($errors->has('notes'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('notes') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group py-2">
                                    <button type="submit" class="btn btn-success btn-lg rounded-sm" id="btnSubmit">
                                        <i class="fa fa-check-circle"></i>
                                        Place Your Order
                                    </button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subtotal Price:</p>
                                    <p class="price">$144.00</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Shipping Price:</p>
                                    <p class="price">$10.50</p>
                                </div>

                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Price:</p>
                                    <p class="price">FRW {{ number_format(Cart::getTotal()) }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script>
        $(function () {
            var $checkoutForm = $('#checkoutForm');
            $checkoutForm.validate({
                rules: {
                    payment_id: "required",
                },
                messages: {
                    payment_id: {
                        required: "Please choose payment method",
                        // minlength: jQuery.format("Enter at least {0} characters"),
                        // remote: jQuery.format("{0} is already in use")
                    }
                }
            });

        });
    </script>
@stop
