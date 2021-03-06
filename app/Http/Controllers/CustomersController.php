<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
//use Intervention\Image\Fasades\Image;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $customers = Customer::with('company')->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        $companies = Company::all();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        $this->authorize('create', Customer::class);

        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer', 'customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        $this->storeImage($customer);

        return redirect('/customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('create', $customer);
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'              => 'required|min:3',
            'email'             => 'required|email',
            'active'            => 'required',
            'company_id'        => 'required',
            'image'             => 'required|image',
            'image'             => 'sometimes|file|image|max:5000'
        ]);
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public')
            ]);

            $image = \Image::make(public_path('storage/' . $customer->image))->fit(300, 300);
            $image->save();
        }
    }
}
