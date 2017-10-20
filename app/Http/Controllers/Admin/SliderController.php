<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Log;
use App\Http\Model\Slider;
use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
use App\Rules\DuplicatedIdRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    const PAGE = 10;
    const VIEW_PATH = 'admin.pages.sliders.';
    const IMG_PATH = 'images/sliders/';
    const REDIRECT = '/admin/sliders';
    const TITLE_MESS = 'Slider';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $sliders = Slider::paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('sliders'));
    }

    public function create()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        return view(self::VIEW_PATH . 'create');
    }

    public function store(SliderRequest $request)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $slider = new Slider;
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

        $slider->id = $request_id;
        $slider->title = $request_title;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $request_image->move(public_path(self::IMG_PATH), $fileName);
            $slider->image = self::IMG_PATH . $fileName;
        }
        $slider->save();
        Log::store('Add', self::TITLE_MESS, $slider->id);
        return redirect(self::REDIRECT)
            ->with('success', self::TITLE_MESS . ' ' . $slider->id . ' has been added');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $slider = Slider::find($id);
        return view(self::VIEW_PATH . 'edit', compact('slider', 'id'));
    }

    public function update(SliderRequest $request, $id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $slider = Slider::find($id);
        $request_id = $request->get('id');
        $request_selected = $request->get('selected');
        $request_title = $request->get('title');
        $request_image = $request->file('image');

        $validator = Validator::make($request->all(), []);
        $validator->after(function ($validator) use ($slider, $request_id) {
            if ($slider->id !== $request_id && $this->checkID($request_id)) {
                $validator->errors()->add('id', 'ID has been duplicated. Choose another ID.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $slider->id = $request_id;
        $slider->selected = $request_selected;
        $slider->title = $request_title;
        if ($request->hasFile('image')) {
            $old = public_path() . '/' . $slider->image;
            if (File::exists($old)) {
                File::delete($old);
            }
            $fileName = time() . '.' . $request_image->getClientOriginalExtension();
            $request_image->move(public_path(self::IMG_PATH), $fileName);
            $slider->image = self::IMG_PATH . $fileName;
        }
        $slider->save();
        Log::store('Edit', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)->with('success', self::TITLE_MESS . ' ' . $id . ' has been edit');
    }

    public function destroy($id)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $slider = Slider::find($id);
        $slider->delete();
        Log::store('Delete', self::TITLE_MESS, $id);
        return redirect(self::REDIRECT)->with('success', self::TITLE_MESS . ' ' . $id . ' has been deleted');
    }

    private function checkID($id)
    {
        return Slider::where('id', $id)->exists();
    }
}
