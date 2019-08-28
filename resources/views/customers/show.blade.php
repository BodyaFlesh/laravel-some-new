@extends('layout')

@section('title', 'Details for'.$customer->name)

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Details for {{ $customer->name }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <p>Name: <b>{{ $customer->name }}</b></p>
        <p>Email: <b>{{ $customer->email }}</b></p>
        <p>Company: <b>{{ $customer->company->name }}</b></p>
    </div>
</div>

@endsection