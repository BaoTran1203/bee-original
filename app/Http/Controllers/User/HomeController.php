<?php

namespace App\Http\Controllers\User;

use App\Http\Model\Contact;
use App\Http\Model\MiniProduct;
use App\Http\Model\Product;
use App\Http\Model\Seller;
use App\Http\Model\Slider;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    const DEFAULT_PRODUCT = 12;

    public function index()
    {
        $sliders = Slider::where('selected', 1)->get();
        $sellers = Seller::all();
        $products = Product::where('selected', 1)
            ->orderBy('created_at', 'desc')
            ->take(self::DEFAULT_PRODUCT)
            ->get();
        $miniProducts = MiniProduct::inRandomOrder()->get();
        $contact = $this->getContact();

        return view("user.pages.home",
            compact('sliders', 'sellers', 'products', 'miniProducts', 'contact'));
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
