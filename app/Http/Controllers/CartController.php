<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Session;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
    	$this->validate($request, [
    		'product_id' => 'required|exists:products,id',
    		'quantity' => 'required|integer|min:1'
    	]);

    	$product = Product::find($request->get('product_id'));
    	$quantity = $request->get('quantity');

    	Session::flash('flash_product_name',$product->name);

    	$cart = $request->cookie('cart',[]);

    	if(array_key_exists($product->id, $cart)) {
    		$quantity += $cart[$product->id];
    	}

    	$cart[$product->id] = $quantity;

    	return redirect('catalogs')->withCookie(cookie()->forever('cart',$cart));
    }
}
