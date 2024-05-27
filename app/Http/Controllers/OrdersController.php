<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class OrdersController extends Controller
{
    public function index()
    {
        return view('profile.orders.index');
    }

    public function checkout()
    {
        $userId = Auth::id();
        $products = Cart::with(['products.images'])->where('USUARIO_ID', $userId)->where('ITEM_QTD', '>', 0)->get();
        $adresses = Address::where('USUARIO_ID', $userId)->where('ENDERECO_APAGADO', 0)->get();

        $subtotal = 0;
        foreach ($products as $cartItem) {
            $product = $cartItem->products;
            $discountedPrice = $product->PRODUTO_PRECO - ($product->PRODUTO_PRECO * $product->PRODUTO_DESCONTO / 100);
            $subtotal += $discountedPrice * $cartItem->ITEM_QTD;
        }

        return view('profile.orders.checkout', compact('products', 'adresses', 'subtotal'));
    }
}
