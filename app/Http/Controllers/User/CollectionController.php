<?php

namespace App\Http\Controllers\User;

use App\Http\Model\Contact;
use App\Http\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    const COUNT_EACH_PAGE = 48;

    public function index()
    {
        $collection = Product::where('selected', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(self::COUNT_EACH_PAGE);
        $contact = $this->getContact();

        return view("user.pages.collection", compact('collection', 'contact'));
    }

    private function getContact()
    {
        $contact['address'] = Contact::where('id', 'address')->first()->content;
        $contact['email'] = Contact::where('id', 'email')->first()->content;
        $contact['facebook'] = Contact::where('id', 'facebook')->first()->content;
        $contact['instagram'] = Contact::where('id', 'instagram')->first()->content;
        $contact['phone'] = Contact::where('id', 'phone')->first()->content;
        $contact['event'] = Contact::find('event');
        return $contact;
    }
}
