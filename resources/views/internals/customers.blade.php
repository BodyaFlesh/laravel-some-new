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
            <div class="form-group">
                <label for="">Status</label>
                <select name="active" id="active" class="form-control">
                    <option value="" disabled>Select customer status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-6">
        <h3>Active customers</h3>
        <ul>
            @foreach ($activeCustomers as $customer)
                <li>{{ $customer->name }} ({{ $customer->email }})</li>
            @endforeach
        </ul>
    </div>
    <div class="col-6">
            <h3>Inactive customers</h3>
        <ul>
            @foreach ($inactiveCustomers as $customer)
                <li>{{ $customer->name }} ({{ $customer->email }})</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection