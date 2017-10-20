<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Log;
use App\Http\Model\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    const PAGE = 100;
    const VIEW_PATH = 'admin.pages.order.';
    const REDIRECT = '/admin/orders';
    const TITLE_MESS = 'Order';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $orders = Order::orderBy('status', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('orders'));
    }

    public function edit($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $order = Order::find($id);
        return view(self::VIEW_PATH . 'edit', compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $validator = Validator::make($request->all(), []);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $order = Order::find($id);
        $order->product = $request->get('product');
        $order->gender = $request->get('gender');
        $order->size = $request->get('size');
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $order->phone = $request->get('phone');
        $order->address = $request->get('address');
        $order->date = $request->get('date');
        $order->message = $request->get('message');
        $order->status = $request->get('status');
        $order->save();
        Log::store('Edit', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' #' . $id . ' has been edited');
    }
}
