<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Log;
use App\Http\Model\Seller;
use App\Http\Requests\SellerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    const PAGE = 10;
    const VIEW_PATH = 'admin.pages.sellers.';
    const IMG_PATH = 'images/sellers/';
    const REDIRECT = '/admin/sellers';
    const TITLE_MESS = 'Seller';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $sellers = Seller::paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('sellers'));
    }

    public function create()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        return view(self::VIEW_PATH . 'create');
    }

    public function store(SellerRequest $request)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $seller = new Seller;
        $request_id = $request->get('id');
        $request_title = $request->get('title');
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

        $seller->id = $request_id;
        $seller->title = $request_title;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $request_image->move(public_path(self::IMG_PATH), $fileName);
            $seller->image = self::IMG_PATH . $fileName;
        }
        $seller->save();
        Log::store('Add', self::TITLE_MESS, $seller->id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $seller->id . ' has been added');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $seller = Seller::find($id);
        return view(self::VIEW_PATH . 'edit', compact('seller', 'id'));
    }

    public function update(SellerRequest $request, $id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $seller = Seller::find($id);
        $request_id = $request->get('id');
        $request_selected = $request->get('selected');
        $request_title = $request->get('title');
        $request_image = $request->file('image');

        $validator = Validator::make($request->all(), []);
        $validator->after(function ($validator) use ($seller, $request_id) {
            if ($seller->id !== $request_id && $this->checkID($request_id)) {
                $validator->errors()->add('id', 'ID has been duplicated. Choose another ID.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $seller->id = $request_id;
        $seller->selected = $request_selected;
        $seller->title = $request_title;
        if ($request->hasFile('image')) {
            $old = public_path() . '/' . $seller->image;
            if (File::exists($old)) {
                File::delete($old);
            }
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $request_image->move(public_path(self::IMG_PATH), $fileName);
            $seller->image = self::IMG_PATH . $fileName;
        }
        $seller->save();
        Log::store('Edit', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $id . ' has been edit');
    }

    public function destroy($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $slider = Seller::find($id);
        $slider->delete();
        Log::store('Delete', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $id . ' has been deleted');
    }

    private function checkID($id)
    {
        return Seller::where('id', $id)->exists();
    }
}
