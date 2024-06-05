<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $success = $request->session()->get('success');
        $userId = Auth::id();
        $orders = Order::with(['items.product', 'status', 'address'])->where('USUARIO_ID', $userId)->get();
        return view('profile.orders.index')->with([
            'sucess' => $success,
            'orders' => $orders
        ]);
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

    public function store(Request $request)
    {
        $userId = Auth::id();
        $addressId = $request->endereco_id;

        $cartItems = Cart::with('products')->where('USUARIO_ID', $userId)->where('ITEM_QTD', '>', 0)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->withErrors('Seu carrinho está vazio.');
        }

        $total = 0;
        foreach ($cartItems as $cartItem) {
            $product = $cartItem->products;
            $discountedPrice = $product->PRODUTO_PRECO - ($product->PRODUTO_PRECO * $product->PRODUTO_DESCONTO / 100);
            $total += $discountedPrice * $cartItem->ITEM_QTD;
        }

        dd($order = Order::create([
            'USUARIO_ID' => $userId,
            'STATUS_ID' => 1, 
            'PEDIDO_DATA' => now(),
            'ENDERECO_ID' => $addressId,
        ]));

        foreach ($cartItems as $cartItem) {
            $product = $cartItem->products;
            $discountedPrice = $product->PRODUTO_PRECO - ($product->PRODUTO_PRECO * $product->PRODUTO_DESCONTO / 100);
            
            OrderItem::create([
                'PRODUTO_ID' => $cartItem->PRODUTO_ID,
                'PEDIDO_ID' => $order->PEDIDO_ID,
                'ITEM_QTD' => $cartItem->ITEM_QTD,
                'ITEM_PRECO' => $discountedPrice,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Pedido realizado com sucesso.');
    }
}
