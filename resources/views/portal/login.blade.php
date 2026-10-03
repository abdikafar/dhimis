@extends('portal.layout')

@section('content')
    <div class="card" style="max-width:380px; margin:40px auto;">
        <h2 style="margin-top:0;">Shop login</h2>
        <p class="muted">Enter the shop password to manage your products.</p>
        <form method="POST" action="{{ route('portal.login.submit') }}">
            @csrf
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autofocus>
            @error('password')<div class="error">{{ $message }}</div>@enderror
            <button class="btn" type="submit" style="margin-top:18px; width:100%;">Log in</button>
        </form>
    </div>
@endsection
