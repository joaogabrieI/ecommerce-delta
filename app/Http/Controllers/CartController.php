<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(User $user)
    {
        return view('profile.cart.index');
    }

    public function add(Product $product)
    {
        $userId = Auth::User()->USUARIO_ID;

        $cartItem = Cart::where('USUARIO_ID', $userId)->where('PRODUTO_ID', $product->PRODUTO_ID)->first();

        if ($cartItem) {
            // Se o produto já está no carrinho, atualiza a quantidade
            $cartItem->fill([
                'USUARIO_ID' => $userId,
                'PRODUTO_ID' => $product->PRODUTO_ID,
                'QTD_ITEM' => $cartItem->ITEM_QTD += 1
            ])->save();
        } else {
            // Se não, cria um novo item no carrinho
            Cart::create([
                'USUARIO_ID' => $userId,
                'PRODUTO_ID' => $product->PRODUTO_ID,
                'ITEM_QTD' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }
}
