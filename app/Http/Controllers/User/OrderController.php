<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $validator = Validator::make($request->all(), []);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $order = new Order;
        $order->product = $request->get('product');
        $order->gender = $request->get('gender');
        $order->size = $request->get('size');
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $order->phone = $request->get('phone');
        $order->address = $request->get('address');
        $order->date = $request->get('date');
        $order->message = $request->get('message');
        $order->save();
        Session::flash('message', "Thank you for your order. We will contact you later.");
        return back();
    }
}