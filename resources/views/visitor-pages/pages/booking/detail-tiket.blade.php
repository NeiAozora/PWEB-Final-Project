@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')
<div class="flex min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6 w-2/4 mx-auto mt-10 mb-[500px]">
        <h1 class="text-center text-2xl font-bold mb-6">Pembelian Tiket</h1>
        
        <div class="flex justify-center gap-6 mb-4 text-sm font-semibold">
            <span class="text-cyan-500">1. Detail Tiket</span>
            <span class="text-gray-400">2. Pembayaran</span>
        </div>
        <form action="#" method="POST">
            <div class="grid grid-cols-2 gap-4">
                <!-- Tanggal Visit -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Visit</label>
                    <input type="date" id="tanggal" name="tanggal" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div> 
                
                <!-- Jumlah Tiket -->
                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Tiket</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" placeholder="Masukkan Jumlah Tiket" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div>
            </div>

        <div class="border rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Detail Tiket</h2>
            
            <form action="#" method="POST">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Tanggal Visit -->
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Visit</label>
                        <input type="date" id="tanggal" name="tanggal" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </div>
                    
                    <!-- Jumlah Tiket -->
                    <div>
                        <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Tiket</label>
                        <input type="number" id="jumlah" name="jumlah" min="1" placeholder="Masukkan Jumlah Tiket" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </div>
                </div>

                <!-- Tombol Lanjut -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-cyan-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
                        Lanjut
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
