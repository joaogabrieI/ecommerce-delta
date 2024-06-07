<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductStock;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['images' => function ($query) {
            $query->whereIn('IMAGEM_ORDEM', [1]);
        }])->get();
        return view('home.index')->with(["products" => $products]);
    }

    public function show($id)
    {
        $product = product::find($id);
        $qtd = ProductStock::find($id);
        $images = ProductImage::where('PRODUTO_ID', $id)->get();
        return view("home.show")->with(["product" => $product, "qtd" => $qtd, "images" => $images]);
    }

    public function productsCategory()
    {
        $products = Product::with(['images' => function ($query) {
            $query->whereIn('IMAGEM_ORDEM', [1]);
        }])->get();
        $categories = Category::all();
        return view('home.productsCategory')->with(["products" => $products, "categories" => $categories]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');

        $products = Product::where('PRODUTO_NOME', 'LIKE', "%{$query}%")
            ->orWhere('PRODUTO_DESC', 'LIKE', "%{$query}%")
            ->with(['images' => function ($query) {
                $query->whereIn('IMAGEM_ORDEM', [1]);
            }])
            ->get();

        return view('home.search')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
