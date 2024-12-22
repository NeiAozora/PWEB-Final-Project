@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')

<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Pesananku</h1>
    <!-- Header Tabs -->
    <div class="flex justify-start space-x-4 mb-6">
      <a href="#" class="px-4 py-2 text-sm font-medium bg-white border border-cyan-500 text-cyan-500 rounded-lg hover:bg-cyan-500 hover:text-white">
        Menunggu Verifikasi
      </a>
      <a href="#" class="px-4 py-2 text-sm font-medium text-white border bg-cyan-500 rounded-lg ">
        Selesai
      </a>
      <a href="#" class="px-4 py-2 text-sm font-medium text-cyan-500 border border-cyan-500 rounded-lg hover:bg-cyan-500 hover:text-white">
        Dibatalkan
      </a>
    </div>
  
    <!-- Card List -->
    <div class="space-y-4">
      <!-- Card Item -->
      <div class="bg-white shadow-md rounded-lg p-4 flex items-start">
        <img
          src="https://via.placeholder.com/150"
          alt="Gambar Wisata"
          class="w-32 h-20 rounded-md object-cover mr-4"
        />
        <div class="flex-1 ml-10">
          <h3 class="text-lg font-semibold text-cyan-500 hover:underline cursor-pointer">
            Selokambang
          </h3>
          <p class="text-sm text-gray-600">Tanggal Berlaku: 20/12/2024 (Hari Biasa)</p>
          <p class="text-sm text-gray-600">Jumlah: 2 Tiket</p>
          <p class="text-sm">
            Status:
            <span class="px-2 py-1 rounded font-semibold" style="color: rgb(0, 204, 102); background-color: rgb(215, 255, 235)">
              Selesai
            </span>
            <button class="px-2 py-1 rounded font-semibold text-white bg-cyan-500">
                Download Tiket
              </button>
          </p>
        </div>
      </div>
  
      <!-- Card Item -->
      <div class="bg-white shadow-md rounded-lg p-4 flex items-start">
        <img
          src="https://via.placeholder.com/150"
          alt="Gambar Wisata"
          class="w-32 h-20 rounded-md object-cover mr-4"
        />
        <div class="flex-1">
          <h3 class="text-lg font-semibold text-cyan-500 hover:underline cursor-pointer">
            Bromo
          </h3>
          <p class="text-sm text-gray-600">Tanggal Berlaku: 20/12/2024 (Hari Biasa)</p>
          <p class="text-sm text-gray-600">Jumlah: 2 Tiket</p>
          <p class="text-sm">
            Status:
            <span class="px-2 py-1 rounded font-semibold" style="color: rgb(0, 204, 102); background-color: rgb(215, 255, 235)">
              Selesai
            </span>
            <button class="px-2 py-1 rounded font-semibold text-white bg-cyan-500">
              Download Tiket
            </button>
          </p>
        </div>
      </div>
    </div>
  </div>
  

@endsection
