<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Log;
use App\Http\Model\MiniProduct;
use App\Http\Requests\MiniProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MiniProductController extends Controller
{
    const PAGE = 10;
    const VIEW_PATH = 'admin.pages.mini_products.';
    const IMG_PATH = 'images/mini_products/';
    const REDIRECT = '/admin/mini_products';
    const TITLE_MESS = 'Mini Product';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $mini_products = MiniProduct::orderBy('created_at', 'desc')
            ->paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('mini_products'));
    }

    public function create()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        return view(self::VIEW_PATH . 'create');
    }

    public function store(MiniProductRequest $request)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $mini_product = new MiniProduct;
        $request_id = $request->get('id');
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

        $mini_product->id = $request_id;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $image = Image::make($request_image->getRealPath())->resize(256, 256);
            $image->save(public_path(self::IMG_PATH) . '/' . $fileName);
            $mini_product->image = self::IMG_PATH . $fileName;
        }
        $mini_product->save();
        Log::store('Add', self::TITLE_MESS, $mini_product->id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $mini_product->id . ' has been added');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $mini_product = MiniProduct::find($id);
        return view(self::VIEW_PATH . 'edit', compact('mini_product', 'id'));
    }

    public function update(MiniProductRequest $request, $id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $mini_product = MiniProduct::find($id);
        $request_id = $request->get('id');
        $request_selected = $request->get('selected');
        $request_image = $request->file('image');

        $validator = Validator::make($request->all(), []);
        $validator->after(function ($validator) use ($mini_product, $request_id) {
            if ($mini_product->id !== $request_id && $this->checkID($request_id)) {
                $validator->errors()->add('id', 'ID has been duplicated. Choose another ID.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $mini_product->id = $request_id;
        $mini_product->selected = $request_selected;
        if ($request->hasFile('image')) {
            $old = public_path() . '/' . $mini_product->image;
            if (File::exists($old)) {
                File::delete($old);
            }
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $image = Image::make($request_image->getRealPath())->resize(256, 256);
            $image->save(public_path(self::IMG_PATH) . '/' . $fileName);
            $mini_product->image = self::IMG_PATH . $fileName;
        }
        $mini_product->save();
        Log::store('Edit', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $id . ' has been edit');
    }

    public function destroy($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $mini_product = MiniProduct::find($id);
        $mini_product->delete();
        Log::store('Delete', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $id . ' has been deleted');
    }

    private function checkID($id)
    {
        return MiniProduct::where('id', $id)->exists();
    }
}
