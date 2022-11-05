<?php

namespace App\Http\Controllers;

    use App\Mail\NotifyClientMail;
    use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\PaymentMethod;
    use App\Models\ShippingType;
    use App\Models\User;
    use App\Notifications\NewOrderNotification;
    use Cart;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Notification;

    class CheckoutController extends Controller
    {
        public function index()
        {
            if (Cart::isEmpty()) {
                return redirect()->route('shop');
            }
            $cart = Cart::getContent();
            $payments = PaymentMethod::all();
            $shippings = ShippingType::orderBy('price', 'DESC')->get();

            return view('shop.checkout', compact('cart', 'payments', 'shippings'));
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'client_name' => 'required',
                'email' => 'required|email',
                'shipping_address' => 'required',
                'client_phone' => 'required| min:10',
            ]);

            if (Cart::isEmpty()) {
                return redirect()->route('shop');
            }
            DB::beginTransaction();
            $order = new Order();
            $order->setOrderNo();
            $order->client_phone = $request->input('client_phone');
            $order->email = $request->input('email');
            $order->client_name = $request->input('client_name');
            $order->shipping_address = $request->input('shipping_address');
            $order->payment_id = $request->input('payment_id');
            $order->shipping_id = $request->input('shipping_id');
            $order->notes = $request->input('notes');
            $order->total = Cart::getTotal();
            $order->status = 'Pending';
            $order->save();

            $cart = Cart::getContent();
            foreach ($cart as $cartItem) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $cartItem->id;
                $orderItem->price = $cartItem->price;
                $orderItem->qty = $cartItem->quantity;
                $order->orderItems()->save($orderItem);
            }

            DB::commit();
           /* Mail::to($order->email)->send(new NotifyClientMail($order));*/
            $users = User::whereHas('roles', function ($q) {
                return $q->where('title', 'Admin');
            })->get();
            Notification::send($users, new NewOrderNotification($order));

            Cart::clear();

            return redirect()->route('order.success', ['id' => encryptId($order->id)]);

        }

    }
