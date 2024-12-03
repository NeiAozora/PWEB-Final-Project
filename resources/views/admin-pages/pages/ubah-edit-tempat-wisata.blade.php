@extends('admin-pages.layouts.app')

@section('title', $jenisMode)

@section('content')

<div class="bg-gray-50 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Nama Tempat Wisata</h1>
      <input type="text" placeholder="Masukkan Nama Tempat Wisata" class="w-full p-3 border border-gray-300 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Deskripsi Tempat Wisata</h1>
      <textarea placeholder="Masukkan Deskripsi Tempat Wisata" class="w-full p-3 border border-gray-300 rounded-md mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Fasilitas</h1>
      <div class="flex gap-2 mb-4">
        <input type="text" placeholder="Masukkan Nama Fasilitas" class="flex-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah</button>
      </div>
      <p class="text-gray-500 italic mb-6">Anda belum menambahkan fasilitas</p>

      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Foto Tempat Wisata (Maksimal 5 foto)</h1>
      <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="col-span-2 flex items-center justify-center bg-gray-100 border border-gray-300 rounded-md h-32">Preview Foto</div>
        <button class="p-3 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200">+ Tambah foto 1</button>
        <button class="p-3 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200">+ Tambah foto 2</button>
        <button class="p-3 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200">+ Tambah foto 3</button>
        <button class="p-3 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200">+ Tambah foto 4</button>
        <button class="p-3 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200">+ Tambah foto 5</button>
      </div>

      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Lokasi Tempat Wisata</h1>
      <div class="grid grid-cols-3 gap-4 mb-6">
        <select class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option>Pilih Provinsi</option>
        </select>
        <select class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option>Pilih Kabupaten/Kota</option>
        </select>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center justify-center">
          <img src="https://img.icons8.com/color/48/000000/google-maps.png" alt="Google Maps" class="w-5 h-5 mr-2">Link Google Maps
        </button>
      </div>

      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Jam Buka & Harga Tiket</h1>
      <div class="grid grid-cols-2 gap-6 mb-6">
        <div class="p-4 border border-gray-300 rounded-md">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Hari Biasa</h2>
          <div class="grid grid-cols-2 gap-2 mb-4">
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Mulai Hari</option>
            </select>
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Sampai Hari</option>
            </select>
          </div>
          <div class="grid grid-cols-2 gap-2 mb-4">
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Jam Buka</option>
            </select>
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Jam Tutup</option>
            </select>
          </div>
          <div class="flex items-center">
            <span class="bg-blue-500 text-white px-3 py-2 rounded-l-md">Rp</span>
            <input type="text" placeholder="Masukkan Harga Tiket" class="flex-1 p-3 border border-gray-300 rounded-r-md focus:outline-none">
          </div>
        </div>

        <div class="p-4 border border-gray-300 rounded-md">
          <h2 class="text-lg font-semibold text-gray-800 mb-2">Hari Libur</h2>
          <div class="grid grid-cols-2 gap-2 mb-4">
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Mulai Hari</option>
            </select>
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Sampai Hari</option>
            </select>
          </div>
          <div class="grid grid-cols-2 gap-2 mb-4">
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Jam Buka</option>
            </select>
            <select class="p-2 border border-gray-300 rounded-md">
              <option>Jam Tutup</option>
            </select>
          </div>
          <div class="flex items-center">
            <span class="bg-blue-500 text-white px-3 py-2 rounded-l-md">Rp</span>
            <input type="text" placeholder="Masukkan Harga Tiket" class="flex-1 p-3 border border-gray-300 rounded-r-md focus:outline-none">
          </div>
        </div>
      </div>

      <h1 class="text-2xl font-semibold text-blue-600 mb-4">Link Sosial Media (Opsional)</h1>
      <div class="grid grid-cols-5 gap-4 mb-6">
        <input type="text" placeholder="Link Whatsapp" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input type="text" placeholder="Link Instagram" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input type="text" placeholder="Link Youtube" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input type="text" placeholder="Link Tiktok" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input type="text" placeholder="Link Website" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <button class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600">Simpan</button>
    </div>
  </div>


@endsection
