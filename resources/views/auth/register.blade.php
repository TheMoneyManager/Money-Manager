@extends('layouts.main')

@section('content')
<h1>Sign up</h1>

{{-- Validator section --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('auth.do-register') }}" method="POST">
    @csrf
    <table>
        <tbody>
            <tr>
                <th>Name</th>
                <th>
                    <input type="text" name="name" id="">
                </th>
            </tr>
            <tr>
                <th>Email</th>
                <th>
                    <input type="text" name="email" id="">
                </th>
            </tr>
            <tr>
                <th>Password</th>
                <th>
                    <input type="password" name="password" id="">
                </th>
            </tr>
            <tr>
                <th>Password confirmation</th>
                <th>
                    <input type="password" name="password_confirmation" id="">
                </th>
            </tr>
        </tbody>
    </table>
    <br>
    <button type="submit">Create user</button>
</form>

@endsection