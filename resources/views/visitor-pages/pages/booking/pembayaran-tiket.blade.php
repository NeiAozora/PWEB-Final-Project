@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')

<div class="bg-white rounded-lg shadow-lg p-6 w-2/4 mx-auto mt-10 ">
    <h1 class="text-center text-2xl font-bold mb-6">Pembelian Tiket</h1>
    
    <div class="flex justify-center gap-6 mb-4 text-sm font-semibold">
        <span class="text-cyan-500">1. Detail Tiket</span>
        <span class="text-gray-400">2. Pembayaran</span>
    </div>

    <div class="border rounded-lg p-6">
        <h3 class="text-cyan-500 font-semibold mb-4">Detail Pembelian</h3>

        <!-- Detail Tiket -->
        <div class="bg-white p-4 rounded-lg border mb-4">
            <h4 class="text-cyan-500 font-semibold mb-2">Detail Pembelian Tiket</h4>
            <div class="flex justify-between text-gray-700 text-sm">
                <p>Destinasi</p>
                <p>Gunung Bromo</p>
            </div>
            <div class="flex justify-between text-gray-700 text-sm">
                <p>Jumlah Tiket</p>
                <p>2</p>
            </div>
            <div class="flex justify-between text-gray-700 text-sm">
                <p>Tanggal Berlaku Tiket</p>
                <p>20/12/2024 (Hari Biasa)</p>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="bg-white p-4 rounded-lg border">
            <h4 class="text-cyan-500 font-semibold mb-2">Pembayaran</h4>
            <p class="text-sm text-gray-700">Metode Pembayaran Transfer:</p>
            <ul class="text-gray-700 text-sm">
                <li>Bank BRI <span class="text-gray-500">(No Rekening)</span></li>
                <li>Bank Mandiri <span class="text-gray-500">(No Rekening)</span></li>
            </ul>
        </div>

        <!-- Upload Bukti Bayar -->
        
        <div class="bg-white p-4 rounded-lg border mt-4">
            <h4 class="text-cyan-500 font-semibold mb-2">Upload Bukti Bayar</h4>
            <form action="">
                <input type="file" class="block w-full text-gray-700 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">

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
