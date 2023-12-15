<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Carrinho;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'card-name' => 'required',
            'card-number' => 'required',
            'card-expiry' => 'required',
            'card-cvc' => 'required',
        ]);

        
        $checkout = new Checkout();
        $checkout->name = $request->input('name');
        $checkout->email = $request->input('email');
        $checkout->address = $request->input('address');
        $checkout->card_name = $request->input('card-name');
        $checkout->card_number = $request->input('card-number');
        $checkout->card_expiry = $request->input('card-expiry');
        $checkout->card_cvc = $request->input('card-cvc');
        $checkout->save();

        

        $id = $checkout->id;

        return view('checkout.success',['order' => $id]);
    }
}
