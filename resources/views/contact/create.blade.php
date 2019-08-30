@extends('layout')
@section('content')
<h1>Contacts</h1>
<form action="/contact" method="POST">
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
        <label for="">Message:</label>
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
        <div>{{ $errors->first('message') }}</div>
    </div>
    <button type="submit" class="btn btn-primary">Send message</button>
</form>
@endsection