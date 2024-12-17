@extends('layouts.main')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-800 text-gray-100">
        <div class="md:bg-gray-700 md:border border-gray-600 rounded-md w-full md:w-2/3 xl:w-1/3 px-6 md:px-9 md:py-7">
            <h1 class="text-6xl md:text-5xl font-semibold text-center mb-6">Register</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form action="{{ route('register.process') }}" method="POST" class="flex flex-col">
                @csrf
                <label class="mt-3 mb-2 text-xl" for="name">Full Name</label>
                <input type="name" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name"
                    required>

                @error('email')
                    <p>{{ $message }}</p>
                @enderror

                <label class="mt-3 mb-2 text-xl" for="email">Email</label>
                <input class="" type="email" name="email" id="email" placeholder="Email" required>

                <label class="mt-3 mb-2 text-xl" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>

                <label class="mt-3 mb-2 text-xl" for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation"
                    id="password_confirmation"placeholder="Password Confirmation" required>

                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-600 py-2 rounded-md mt-8 text-lg font-medium">Register</button>
                <p class="text-center text-sm font-normal mt-3">Already have an account? <a href="{{ route('login') }}"
                        class="text-blue-400 hover:text-blue-300">Login here</a></p>
            </form>
        </div>
    </div>
@endsection
