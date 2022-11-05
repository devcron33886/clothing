<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function shopProducts(Request $request)
    {
        $cat = $request->input('cat');
        $search = $request->input('search');

        $products = Product::available()
        ->with('category')
            ->when($cat, function (Builder $builder, $cat) {
                $builder->whereHas('category', function (Builder $builder) use ($cat) {
                    $builder->where('name', '=', $cat);
                });
            })
            ->when($search, function (Builder $builder, $search) {
                $builder->where('name', 'LIKE', "%$search%")
                    ->orWhere('price', 'LIKE', "%$search%")
                    ->orWhereHas('category', function (Builder $builder) use ($search) {
                        $builder->where('name', 'LIKE', "%$search%");
                    });
            })
            ->latest()
            ->paginate(10);

        $products->appends(['search' => $search, 'cat' => $cat]);

        return view('clients.products', compact('products'));
    }

    public function orders()
    {
        return view('clients.my-orders');
    }

    public function productDetails(Product $product)
    {
        $onOder = OrderItem::query()->where('product_id', $product->id)->limit(20)->get();
        $alsoBoughtProducts = collect([]);
        if ($onOder) {
            $alsoBoughtProducts = Product::with('category')
                ->whereHas('orderItems', function (Builder $builder) use ($onOder, $product) {
                    $builder->whereIn('order_id', $onOder->pluck('order_id'))
                        ->where('product_id', '!=', $product->id);
                })->inRandomOrder()->limit(8)->get();
        }
        if ($alsoBoughtProducts->isEmpty()) {
            $alsoBoughtProducts = Product::with('category')
                ->where('category_id', $product->category_id)->inRandomOrder()
                ->limit(8)->get();
        }

        return view('clients.product_detail', compact('product', 'alsoBoughtProducts'));
    }
}
