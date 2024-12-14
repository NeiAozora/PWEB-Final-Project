@extends('visitor-pages.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center space-x-4">
            <img class="w-24 h-24 rounded-full border border-gray-300" src="{{ $pengguna->foto_profil }}" alt="Profile Picture">
            <div>
                <h1 class="text-2xl font-semibold text-gray-700">{{ $pengguna->nama_depan }} {{ $pengguna->nama_belakang }}</h1>
                <p class="text-gray-500">{{ $pengguna->username }}</p>
                <p class="text-gray-500">{{ $pengguna->email }}</p>
                {{-- <p class="text-gray-400 text-sm">Role: {{ $pengguna->role->name ?? 'N/A' }}</p> --}}
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Profile Details</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">First Name:</p>
                    <p class="font-medium text-gray-800">{{ $pengguna->nama_depan }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Last Name:</p>
                    <p class="font-medium text-gray-800">{{ $pengguna->nama_belakang }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">User Reviews</h2>
            <div class="space-y-4">
                @foreach ($ulasans as $ulasan)
                    <div class="bg-gray-50 p-4 rounded shadow-sm">
                        <p class="font-medium text-gray-800">{{ $ulasan->title }}</p>
                        <p class="text-gray-600">{{ $ulasan->content }}</p>
                        {{-- <p class="text-sm text-gray-400">Posted on: {{ $ulasan->created_at->format('M d, Y') }}</p> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
