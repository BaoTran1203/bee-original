<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Contact;
use App\Http\Controllers\Controller;
use App\Http\Model\Log;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ContactController extends Controller
{
    const VIEW_PATH = 'admin.pages.contacts.';
    const REDIRECT = '/admin/contacts';
    const TITLE_MESS = 'Contact';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $contact = $this->getContact();
        return view(self::VIEW_PATH . 'index', compact('contact'));
    }

    public function update(ContactRequest $request)
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $validator = Validator::make($request->all(), []);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $address = Contact::find('address');
        if ($address->content !== Input::get('address')) {
            $address->content = Input::get('address');
            $address->save();
            Log::store('Edit', self::TITLE_MESS, 'Address');
        }

        $email = Contact::find('email');
        if ($email->content !== Input::get('email')) {
            $email->content = Input::get('email');
            $email->save();
            Log::store('Edit', self::TITLE_MESS, 'Email');
        }

        $facebook = Contact::find('facebook');
        if ($facebook->content !== Input::get('facebook')) {
            $facebook->content = Input::get('facebook');
            $facebook->save();
            Log::store('Edit', self::TITLE_MESS, 'Facebook');
        }

        $instagram = Contact::find('instagram');
        if ($instagram->content !== Input::get('instagram')) {
            $instagram->content = Input::get('instagram');
            $instagram->save();
            Log::store('Edit', self::TITLE_MESS, 'Iinstagram');
        }

        $phone = Contact::find('phone');
        if ($phone->content !== Input::get('phone')) {
            $phone->content = Input::get('phone');
            $phone->save();
            Log::store('Edit', self::TITLE_MESS, 'Phone');
        }

        // Update event image
        $event = Contact::find('event');
        if (Input::has('image')) {
            $old = public_path() . '/' . $event->content;
            if (File::exists($old)) {
                File::delete($old);
            }

            $file = Input::file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/others/');

            $image = Image::make($file->getRealPath())->resize(850, 667);
            $image->save($path . '/' . $name);

            $event->content = 'images/others/' . $name;
            $event->save();
            Log::store('Edit', self::TITLE_MESS, 'Event Img');
        }

        return redirect(self::REDIRECT)->with('success', self::TITLE_MESS . ' has been update');
    }

    private function getContact()
    {
        $contact['address'] = Contact::find('address');
        $contact['email'] = Contact::find('email');
        $contact['facebook'] = Contact::find('facebook');
        $contact['instagram'] = Contact::find('instagram');
        $contact['phone'] = Contact::find('phone');
        $contact['event'] = Contact::find('event');
        return $contact;
    }
}
