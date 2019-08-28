<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        // $companies = Company::all();
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'              => 'required|min:3',
            'email'             => 'required|email',
            'active'            => 'required',
            'company_id'        => 'required'
        ]);

        Customer::create($data);

        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        //$customer = Customer::findOrFail($customer);

        return view('customers.show', compact('customer'));
    }
}
