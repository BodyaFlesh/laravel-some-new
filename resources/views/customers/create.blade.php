@extends('layouts.app')

@section('title', 'Add new customer')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Add new Customer</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/customers" method="POST" class="pb-5" enctype="multipart/form-data">
            @include('customers.form')
            
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection