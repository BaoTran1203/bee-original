<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Log;
use App\Http\Model\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    const PAGE = 20;
    const VIEW_PATH = 'admin.pages.products.';
    const IMG_PATH = 'images/products/';
    const REDIRECT = '/admin/products';
    const TITLE_MESS = 'Product';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $products = Product::orderBy('created_at', 'desc')
            ->paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('products'));
    }

    public function create()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        return view(self::VIEW_PATH . 'create');
    }

    public function store(ProductRequest $request)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $product = new Product;
        $request_id = $request->get('id');
        $request_title = $request->get('title');
        $request_description = $request->get('description');
        $request_price = $request->get('price');
        $request_image = $request->file('image');

        $validator = Validator::make($request->all(), []);
        $validator->after(function ($validator) use ($request_id) {
            if ($this->checkID($request_id)) {
                $validator->errors()->add('id', 'ID has been duplicated. Choose another ID.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product->id = $request_id;
        $product->title = $request_title;
        $product->description = $request_description;
        $product->price = $request_price;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $request_image->move(public_path(self::IMG_PATH), $fileName);
            $product->image = self::IMG_PATH . $fileName;
        }
        $product->save();
        Log::store('Add', self::TITLE_MESS, $product->id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $product->id . ' has been added');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $product = Product::find($id);
        return view(self::VIEW_PATH . 'edit', compact('product', 'id'));
    }

    public function update(ProductRequest $request, $id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $product = Product::find($id);
        $request_id = $request->get('id');
        $request_title = $request->get('title');
        $request_description = $request->get('description');
        $request_price = $request->get('price');
        $request_selected = $request->get('selected');
        $request_image = $request->file('image');

        $validator = Validator::make($request->all(), []);
        $validator->after(function ($validator) use ($product, $request_id) {
            if ($product->id !== $request_id && $this->checkID($request_id)) {
                $validator->errors()->add('id', 'ID has been duplicated. Choose another ID.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product->id = $request_id;
        $product->title = $request_title;
        $product->description = $request_description;
        $product->price = $request_price;
        $product->selected = $request_selected;
        if ($request->hasFile('image')) {
            $old = public_path() . '/' . $product->image;
            if (File::exists($old)) {
                File::delete($old);
            }
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $request_image->move(public_path(self::IMG_PATH), $fileName);
            $product->image = self::IMG_PATH . $fileName;
        }

        $product->save();
        Log::store('Edit', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $id . ' has been edit');
    }

    public function destroy($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $product = Product::find($id);
        $product->delete();
        Log::store('Delete', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $id . ' has been deleted');
    }

    private function checkID($id)
    {
        return Product::where('id', $id)->exists();
    }
}
