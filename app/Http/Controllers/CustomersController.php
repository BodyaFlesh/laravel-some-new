<?php

namespace App\Http\Controllers;

use App\Customer;

class CustomersController extends Controller
{
    public function list()
    {
        //$customers = Customer::all();
        $activeCustomers = Customer::where('active', 1)->get();
        $inactiveCustomers = Customer::where('active', 0)->get();

        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'active'    => 'required'
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();

        return back();
    }
}
