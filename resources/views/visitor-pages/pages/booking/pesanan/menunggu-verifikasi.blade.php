@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')

<div class="max-w-4xl mx-auto py-8 min-h-screen ">
    <h1 class="text-2xl font-bold mb-4">Pesananku</h1>
    <!-- Header Tabs -->
    <div class="flex justify-start space-x-4 mb-6">
      <a href="" class="px-4 py-2 text-sm font-medium bg-cyan-500 text-white rounded-lg hover:bg-blue-600">
        Menunggu Verifikasi
      </a>
      <a href="" class="px-4 py-2 text-sm font-medium text-cyan-500 border border-cyan-500 rounded-lg hover:bg-cyan-500 hover:text-white">
        Selesai
      </a>
      <a href="" class="px-4 py-2 text-sm font-medium text-cyan-500 border border-cyan-500 rounded-lg hover:bg-cyan-500 hover:text-white">
        Ditolak
      </a>
    </div>
    <!-- Card List -->
    <div class="space-y-4">

      <!-- Card Item -->
      <div class="bg-white shadow-md rounded-lg p-4 flex items-start">
        <img
          src="https://via.placeholder.com/160"
          alt="Gambar Wisata"
          class=" w-36 h-20 rounded-md object-cover mr-4"
        />
        <div class="flex-1">
          <h3 class="text-lg font-semibold text-cyan-500 hover:underline cursor-pointer">
            Bromo
          </h3>
          <p class="text-sm text-gray-600">Tanggal Berlaku: 20/12/2024 (Hari Biasa)</p>
          <p class="text-sm text-gray-600">Jumlah: 2 Tiket</p>
          <p class="text-sm">
            Status Pembelian:
            <span class="text-yellow-500 bg-yellow-100 px-2 py-1 rounded">
              Menunggu Verifikasi
            </span>
          </p>
        </div>
      </div>
    </div>
  </div>


@endsection
