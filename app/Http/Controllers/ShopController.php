<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __invoke(Request $request)
    {
        $cat = $request->input('cat');
        $search = $request->input('search');

        $products = Product::available()
        ->with(['category', 'media'])
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
            ->paginate(15);

        $products->appends(['search' => $search, 'cat' => $cat]);

        return view('shop.index', compact('products'));
    }
}
