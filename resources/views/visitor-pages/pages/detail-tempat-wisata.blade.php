@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')

<div class="w-full bg-white shadow-none border-spacing-1 border-gray-400">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-8 py-12 space-x-8">
        <!-- Left Section: Image -->
        <div class="flex-shrink-0 w-1/2 over" style="width: 600px; height: 400px">
            <img src="{{ asset($destination->gambar_tempat_wisata->first()['url_gambar']) }}" alt="{{ $destination->nama }}" class="w-full h-full object-cover rounded-lg shadow-lg">
        </div>

        <!-- Right Section: Details -->
        <div class="flex flex-col w-1/2 space-y-4">
            <h1 class="text-5xl font-semibold text-gray-600">{{ $destination->nama }}</h1>

        <!-- Rating Section -->
        <div class="flex items-center">
            @php
                // Filter out reviews with 0, null, or empty ratings
                $validUlasan = collect($destination['ulasan'])->filter(function ($ulasan) {
                    return !empty($ulasan['nilai_rating']) && $ulasan['nilai_rating'] > 0;
                });

                // Calculate average rating
                $totalRatings = $validUlasan->count();
                $averageRating = $totalRatings > 0
                    ? $validUlasan->avg('nilai_rating')
                    : 0;

                // Determine star distribution
                $filledStars = floor($averageRating); // Number of full stars
                $halfStar = $averageRating - $filledStars >= 0.5; // Check if a half-star is needed
                $emptyStars = 5 - $filledStars - ($halfStar ? 1 : 0); // Remaining stars
            @endphp

            <!-- Render Stars -->
            <span class="text-yellow-500 text-2xl flex">
                @for ($i = 0; $i < $filledStars; $i++)
                    <img class="w-9" src="{{ asset('assets/images/icons/yellow-star.svg') }}" alt="Star">
                @endfor
                @if ($halfStar)
                    <img class="w-9" src="{{ asset('assets/images/icons/half-star.svg') }}" alt="Half Star">
                @endif
                @for ($i = 0; $i < $emptyStars; $i++)
                    <img class="w-9" src="{{ asset('assets/images/icons/gray-star.svg') }}" alt="Gray Star">
                @endfor
            </span>

            <span class="text-gray-500 ml-2 text-xl">| ({{ $totalRatings }} Penilaian)</span>
        </div>


            <!-- Location Section -->
            <div class="flex items-center text-gray-600 mt-4">
                <img class="w-20" src="{{ asset('assets/images/icons/location.svg') }}" alt="">
                <div>
                    <span class="text-lg">{{ $destination->alamat['kota'] }}, {{ $destination->alamat['provinsi'] }}</span>
                    <a href="{{ $destination->link_gmaps }}" class="text-blue-500 underline mt-2 text-sm block">
                        <img src="{{ asset('assets/images/icons/look-at-google-maps.svg') }}" alt="">
                    </a>
                </div>
            </div>

            <!-- Ticket Prices Section -->
            <div class="mt-6 space-y-2">
                <div class="flex items-center">
                    <img class="mr-2" src="{{ asset('assets/images/icons/tickets.svg') }}" alt="">
                    <h2 class="text-2xl font-semibold text-cyan-500">Harga Tiket</h2>
                </div>
                <div class="flex items-center space-x-4 text-gray-600">
                    <!-- First Price Section -->
                    @foreach ($destination->tipe_tiket as $ticket)
                        <div class="text-lg">
                            <span>{{ $ticket['nama_tipe'] }}</span><br>
                            <span class="font-bold text-cyan-500">Rp {{ number_format($ticket['harga'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- WhatsApp Contact Button -->
            <div class="mt-6 max-w-sm">
                <a href="https://wa.me/" class="bg-green-500 hover:bg-green-600 text-white flex items-center justify-center px-6 py-3 rounded-lg text-lg font-medium space-x-3 transition">
                    <img class="h-6 w-6" src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="">
                    <span>WhatsApp Pengelola</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Description Section -->
    <div class="px-32 py-7">
        <div class="bg-gray-100 flex justify-center items-center">
            <div class="bg-white shadow-md rounded-lg p-6 max-w-full w-full">
                <h1 class="text-xl font-bold text-cyan-500 mb-4">Tentang {{ $destination->nama }}</h1>
                <p class="text-gray-700 bg-gray-100 p-4 rounded-md mb-6">
                    {{ $destination->deskripsi }}
                </p>
                <h2 class="text-lg font-bold text-cyan-500 mb-3">Fasilitas Wisatawan</h2>
                <ul class="space-y-2">
                    @foreach ($destination->fasilitas as $fasilitas)
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-cyan-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">{{ $fasilitas['nama_fasilitas'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="bg-white py-7 px-32">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-bold text-cyan-600 mb-4">Rating dan Ulasan</h2>
            @foreach ($destination->ulasan as $ulasan)
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 bg-cyan-200 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-cyan-600 w-6 h-6" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-gray-800">
                                {{ $ulasan->pengguna['nama_depan'] . " " . $ulasan->pengguna['nama_belakang'] }}
                            </h3>
                            <div class="flex items-center">
                                @php
                                    $rating = $ulasan->nilai_rating;
                                    $filledStars = floor($rating); // Full stars
                                    $halfStar = $rating - $filledStars >= 0.5; // Half star check
                                    $emptyStars = 5 - $filledStars - ($halfStar ? 1 : 0); // Remaining empty stars
                                @endphp

                                <!-- Render full stars -->
                                @for ($i = 0; $i < $filledStars; $i++)
                                    <img src="{{ asset('assets/images/icons/yellow-star.svg') }}" alt="Star" class="w-5 h-5">
                                @endfor

                                <!-- Render half star if needed -->
                                @if ($halfStar)
                                    <img src="{{ asset('assets/images/icons/half-star.svg') }}" alt="Half Star" class="w-5 h-5">
                                @endif

                                <!-- Render empty stars -->
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <img src="{{ asset('assets/images/icons/gray-star.svg') }}" alt="Gray Star" class="w-5 h-5">
                                @endfor
                            </div>
                        </div>

                        <p class="text-gray-600 mt-1">{{ $ulasan->isi_komentar }}</p>
                        {{-- @if ($ulasan->id_ulasan_yg_dibalas)
                            <a href="#" class="text-cyan-600 text-sm font-semibold mt-2 inline-block">Balas {{ $ulasan->pengguna['nama_depan'] . " " . $ulasan->pengguna['nama_belakang'] }}</a>
                        @endif --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




@endsection
