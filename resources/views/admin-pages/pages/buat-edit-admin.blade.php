@extends('admin-pages.layouts.app')

@section('title', isset($admin) ? 'Ubah Admin' : 'Buat Admin')

@section('content')


<div class="p-4 m-5 bg-white shadow-md rounded-lg overflow-hidden">
    <h2 class="text-2xl font-semibold mb-4">{{ isset($admin) ? 'Ubah Admin' : 'Buat Admin' }}</h2>

    <form action="{{ isset($admin) ? route('admin.update', $admin->id_pengguna) : route('admin.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($admin))
            @method('PUT')
        @endif

        <div class="space-y-4">
            <!-- First Name -->
            <div>
                <label for="nama_depan" class="block text-sm font-medium text-gray-700">Nama Depan</label>
                <input type="text" id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $admin->nama_depan ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('nama_depan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Name -->
            <div>
                <label for="nama_belakang" class="block text-sm font-medium text-gray-700">Nama Belakang</label>
                <input type="text" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $admin->nama_belakang ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('nama_belakang')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $admin->email ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username', $admin->username ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('username')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password (only for Create) -->
            @if (!isset($admin))
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @endif

            <!-- Role -->
            <div>
                <label for="id_role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="id_role" name="id_role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    <option value="">Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id_role }}" {{ (old('id_role', $admin->id_role ?? '') == $role->id_role) ? 'selected' : '' }}>
                            {{ $role->nama_role }}
                        </option>
                    @endforeach
                </select>
                @error('id_role')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Profile Picture -->
            <div>
                <label for="foto_profil" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                <input type="file" id="foto_profil" name="foto_profil" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @if (isset($admin) && $admin->foto_profil)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $admin->foto_profil) }}" alt="Foto Profil" class="w-20 h-20 rounded-full object-cover">
                    </div>
                @endif
                @error('foto_profil')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    {{ isset($admin) ? 'Simpan Perubahan' : 'Buat Admin' }}
                </button>
            </div>
        </div>
    </form>
</div>


@endsection
