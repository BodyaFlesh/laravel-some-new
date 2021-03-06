@extends('layouts.app')

@section('title', 'Customers')

@section('content')


<div class="row">
    <div class="col-12">
        <h1>Customers</h1>
        @can('create', App\Customer::class)
            <p><a href="/customers/create">Add new Customer</a></p>
        @endcan
    </div>
</div>

@foreach($customers as $customer)
<div class="row">
    <div class="col-2">
        {{ $customer->id }}
    </div>
    <div class="col-4">
        <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>
    </div>
    <div class="col-4">
        {{ $customer->company->name }}
    </div>
    <div class="col-2">
        {{ $customer->active }}
    </div>
</div>
@endforeach

@endsection