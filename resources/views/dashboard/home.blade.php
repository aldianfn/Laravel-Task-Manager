@extends('layouts.main')

@section('content')
    <div class="bg-surface-a0 min-h-screen text-gray-100">
        <h1>Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="rounded-md bg-primary-a50 hover:bg-primary-a40 text-surface-a0 px-6 py-2">Logout</button>
            <div class="bg-surface-a10">
                <button type="button"
                    class="border border-surface-a30 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 hover:bg-blue-500 focus:ring-blue-800">Default</button>
            </div>
        </form>
    </div>
@endsection
