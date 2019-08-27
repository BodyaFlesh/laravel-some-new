<?php

namespace App\Http\Controllers;

class CustomersController extends Controller
{
    public function list()
    {
        $customers = [
            'John Doe',
            'Jane Doe',
            'Bob The Builder'
        ];

        return view('internals.customers', [
            'customers' => $customers
        ]);
    }
}
