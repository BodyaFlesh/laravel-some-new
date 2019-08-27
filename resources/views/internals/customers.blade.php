@extends('layout')

@section('title', 'Customers')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Customers</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/customers" method="POST" class="pb-5">
            @csrf
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                <div>{{ $errors->first('name') }}</div>
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                <div>{{ $errors->first('email') }}</div>
            </div>
            
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-12">
        <ul>
            @foreach ($customers as $customer)
                <li>{{ $customer->name }} ({{ $customer->email }})</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection