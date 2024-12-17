@extends('layouts.main')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-surface-a0 text-gray-100">
        <div class="bg-surface-a10 rounded-md w-full md:w-2/3 xl:w-1/3 px-6 md:px-9 md:py-7">
            <h1 class="text-6xl md:text-5xl font-semibold text-center mb-6">Login</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form action="{{ route('login.process') }}" method="POST" class="flex flex-col">
                @csrf

                <label class="mt-3 mb-2 text-xl" for="email">Email</label>
                <input class="" type="email" name="email" id="email" placeholder="Email" required>

                <label class="mt-3 mb-2 text-xl" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>

                <button type="submit"
                    class="bg-primary-a50 hover:bg-primary-a40 py-2 rounded-md mt-8 text-surface-a0 text-lg font-medium">Login</button>
                <p class="text-center text-sm font-normal mt-3">Don't have account yet? <a href="{{ route('register') }}"
                        class="text-primary-a20">Register here</a></p>
            </form>
        </div>
    @endsection
