@component('mail::message')
    <img src="{{ asset('images/logo/logo.png') }}" alt="" style="max-height: 200px">

    # ORDER {{ $order->order_no }} HAS BEEN PLACED.


    @component('mail::table')

        <table>
            <thead class="sr-only">
            <tr>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
            <span>
                <b>Oder date</b>
            </span>
                </td>
                <td> : {{ date('j M Y h:i a', strtotime($order->created_at)) }}</td>
            </tr>
            <tr><td><span><b>Oder No</b></span></td><td> : {{ $order->order_no }}</td></tr>
            <tr>
                <td>
            <span>
                <b>Client</b>
            </span>
                </td>
                <td> : {{ $order->user===null ? $order->client_name:$order->user->name }}</td>
            </tr>
            <tr>
                <td>
            <span>
            <b>Client phone</b>
            </span>
                </td>
                <td> : {{ \App\MyFunc::format_phone_us($order->client_phone) }}</td>
            </tr>
            <tr>
                <td>
            <span>
            <b>Email address</b>
            </span>
                </td>
                <td> : {{$order->email }}</td>
            </tr>
            <tr>
                <td>
            <span>
            <b>Shipping address</b>
            </span>
                </td>
                <td> : {{ $order->shipping_address}}</td>
            </tr>
            </tbody>
        </table>
    @endcomponent

    # Products ordered

    @component('mail::table')
        <table class="table table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->product->name }}</td>
                    <td>{{ number_format($orderItem->price) }}</td>
                    <td>{{ $orderItem->qty }}</td>
                    <td>{{ number_format($orderItem->price * $orderItem->qty) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3" class="align-content-lg-start">
                    Sub Total
                </th>
                <th>
                    {{ $order->formattedTotal() }}
                </th>
            </tr>
            <tr>
                <th colspan="3"  class="align-content-lg-start">
                    Shipping Fee
                </th>
                <th>
                    {{ $order->shipping->formattedPrice() }}
                </th>
            </tr>
            <tr>
                <th colspan="3"  class="align-content-lg-start">
                    Total
                </th>
                <th>
                    RWF {{ number_format($order->total + $order->shipping->price) }}
                </th>
            </tr>
            </tfoot>
        </table>
    @endcomponent

    # Note:

    <p>{{ $order->notes }}</p>

    @component('mail::button', ['url' => url('/'),'color' => 'success'])
        Shop Again
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
