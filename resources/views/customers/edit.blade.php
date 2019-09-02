@extends('layouts.app')

@section('title', 'Edit details'.$customer->name)

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Edit details {{ $customer->name }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/customers/{{ $customer->id }}" method="POST" class="pb-5" enctype="multipart/form-data">
            @method('PATCH')
            @include('customers.form')
            
            <button class="btn btn-primary" type="submit">Save customer</button>
        </form>
    </div>
</div>

@endsection