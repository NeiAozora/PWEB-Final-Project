@extends('visitor-pages.layouts.app')

@section('title', 'Kelola Wisata')

@section('content')

<div class="flex flex-col min-h-screen">

    <div class="bg-cyan-500 text-white text-center mx-auto" style="height: 380px; width: 100%;">
        <div class="flex flex-col justify-center h-full">
            <h1 class="font-semibold mb-2" style="font-size: 50px">Kelola wisata</h1>
            <p class="text-lg " style="font-size: 25px">Sistem informasi wisata daerah berbasis website</p>
        </div>
    </div>

    <div class="container mx-auto px-6 py-10">
        <h2 class=" font-semibold text-[#00CCDD] mb-4" style="font-size:30px">Bagaimana Sih Cara Kelola Wisata di Visitnusantara ?</h2>
        <ul class="list-disc list-inside text-gray-600 leading-relaxed font-normal" style="font-size: 20px">
            <li>Memajukan Pariwisata Lokal: Memberikan pengelola wisata kesempatan untuk mempromosikan destinasi unggulannya.</li>
            <li>Menginspirasi Wisatawan: Menyajikan informasi lengkap dan terpercaya agar wisatawan dapat merencanakan perjalanan impian mereka dengan mudah.</li>
            <li>Melestarikan Budaya & Alam: Mendukung pariwisata yang berkelanjutan untuk menjaga keindahan alam dan budaya lokal.</li>
        </ul>
    </div>

</div>



@endsection