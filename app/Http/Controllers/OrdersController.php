<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;

class OrdersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('role:admin');
	}

    public function index(Request $request)
    {
    	$orders = Order::paginate(5);
    	return view('orders.index',compact('orders'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
