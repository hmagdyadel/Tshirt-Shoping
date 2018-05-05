<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Category;
use App\Product;
use App\Tshirt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Admin.product.show', compact('products'));
    }

    public function addproduct()
    {
        $cat = Category::all();
        return view('Admin.product.addproduct', compact('cat'));
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $destinationPath = 'images';
        $file->move($destinationPath, $file->getClientOriginalName());
        $product = new Product();
        $product->title = $request->title;
        $product->imagepath = $file->getClientOriginalName();
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->cat_id = $request->cat_id;
        $product->save();
        return redirect()->route('admin.product.index');
    }

    public function edit(Product $product)
    {
        $category = Category::all();
        return view('Admin.product.edit', compact('category', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'price' => 'required|min:2',

        ]);
        $file = $request->file('image');
        $destinationPath = 'images';
        $file->move($destinationPath, $file->getClientOriginalName());

        $product->title = $request->title;
        $product->description = $request->desc;
        $product->imagepath = $file->getClientOriginalName();
        $product->price = $request->price;
        $product->cat_id = $request->cat_id;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');

    }

    public function AddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        return redirect()->route('shop.index');

    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $products = Product::where('title', 'like', "%$search%")->get();
        return view('shop.search', compact('products'));


    }

    public function Cart()
    {
        if (!Session::has('cart')) {
            return view('shop.shoping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shoping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function checkOut()
    {
        if (!Session::has('cart')) {
            return view('shop.shoping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkOut', compact('total'));
    }

    public function postcheckOut()
    {

    }
}
