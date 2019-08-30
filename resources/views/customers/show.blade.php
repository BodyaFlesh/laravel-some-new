@extends('layout')

@section('title', 'Details for'.$customer->name)

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Details for {{ $customer->name }}</h1>
        <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

        <form action="/customers/{{ $customer->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="button">Delete</button>
        </form>
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