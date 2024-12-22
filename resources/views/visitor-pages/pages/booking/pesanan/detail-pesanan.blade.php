@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detail Pesanan</h1>
  
    <div class="bg-white shadow-md rounded p-6 mb-4">
      <h2 class="text-xl font-bold mb-2">Tiket</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="flex items-center">
          <img src="https://via.placeholder.com/150" alt="Foto Tiket" class="w-24 h-24 rounded-md mr-4"> 
          <div>
            <p class="font-bold">ID Tiket: 99</p>
            <p>Wisata Tujuan: Selokambang</p>
            <p>Tanggal Berlaku: 20/12/2024 (Hari Biasa)</p>
          </div>
        </div>
        <div class="flex items-center">
          <img src="https://via.placeholder.com/150" alt="Foto Tiket" class="w-24 h-24 rounded-md mr-4">
          <div>
            <p class="font-bold">ID Tiket: 100</p>
            <p>Wisata Tujuan: Selokambang</p>
            <p>Tanggal Berlaku: 20/12/2024 (Hari Biasa)</p>
          </div>
        </div>
      </div>
    </div>
  
    <div class="bg-white shadow-md rounded p-6">
      <h2 class="text-xl font-bold mb-2">Pembayaran</h2>
      <p>Transfer Bank BRI</p>
      <div class="flex justify-between mt-2">
        <span>Total</span>
        <span>Rp 20.000</span>
      </div>
      <div class="flex justify-between mt-2">
        <span>Status</span>
        <span class="px-2 py-1 rounded font-semibold" style="color: rgb(255, 186, 29); background-color: rgb(255, 246, 219)">Menunggu Verifikasi</span>
      </div>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Lihat Bukti Pembayaran</button>
    </div>
  </div>
  

@endsection
