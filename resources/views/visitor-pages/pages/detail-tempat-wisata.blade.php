@extends('visitor-pages.layouts.app')

@section('title', $namaTempat ?? 'Nama Tempat')

@section('content')

    <div class="w-full bg-white shadow-none border-spacing-1 border-gray-400">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between px-8 py-12 space-x-8">
            <!-- Left Section: Image -->
            <div class="flex-shrink-0 w-1/2">
                <img src="https://via.placeholder.com/600x400" alt="Gunung Bromo" class="w-full h-auto object-cover rounded-lg shadow-lg">
            </div>
            <!-- Right Section: Details -->
            <div class="flex flex-col w-1/2 space-y-4">
                <h1 class="text-5xl font-semibold text-gray-600">Gunung Bromo</h1>

                <!-- Rating Section -->
                <div class="flex items-center">
                    <span class="text-yellow-500 text-2xl">★★★★★</span>
                    <span class="text-gray-500 ml-2 text-xl">| (100 Penilaian)</span>
                </div>

                <!-- Location Section -->
                <div class="flex items-center text-gray-600 mt-4">
                    <img class="w-20" src="{{ asset('assets/images/icons/location.svg') }}" alt="">
                    <div class="">
                        <span class="text-lg">Probolinggo, Jawa Timur</span>
                        <a href="#" class="text-blue-500 underline mt-2 text-sm block">
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
                        <div class="text-lg">
                            <span>Hari biasa</span>
                            <br>
                            <span class="font-bold text-cyan-500">Rp 54.000</span>
                        </div>
                        <div class="border-l-2 border-gray-600 h-full"><span class=" text-white">.</span></div>
                        <!-- Second Price Section -->
                        <div class="text-lg">
                            <span>Hari libur</span>
                            <br>
                            <span class="font-bold text-cyan-500">Rp 79.000</span>
                        </div>
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

        <div class=" px-32 py-7">
            <div class="bg-gray-100 flex justify-center items-center ">
                <div class="bg-white shadow-md rounded-lg p-6 max-w-full">
                  <h1 class="text-xl font-bold text-cyan-500 mb-4">Tentang Gunung Bromo</h1>
                  <p class="text-gray-700 bg-gray-100 p-4 rounded-md mb-6">
                    Gunung Bromo adalah gunung berapi aktif yang terletak di Jawa Timur, Indonesia, dan merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan terkenal dengan kaldera luas serta lautan pasirnya yang unik. Dikelilingi oleh keindahan alam, Gunung Bromo menjadi destinasi wisata populer untuk menikmati matahari terbit, budaya suku Tengger, dan pemandangan yang memukau. Gunung ini sering menjadi lokasi upacara adat Kasada, di mana masyarakat Tengger mempersembahkan hasil bumi ke kawah Bromo sebagai bentuk syukur.
                  </p>
                  <h2 class="text-lg font-bold text-cyan-500 mb-3">Fasilitas Wisatawan</h2>
                  <ul class="space-y-2">
                    <li class="flex items-center">
                      <svg class="w-5 h-5 text-cyan-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      <span class="text-gray-700">Tempat Parkir</span>
                    </li>
                    <li class="flex items-center">
                      <svg class="w-5 h-5 text-cyan-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      <span class="text-gray-700">Musholla</span>
                    </li>
                    <li class="flex items-center">
                      <svg class="w-5 h-5 text-cyan-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      <span class="text-gray-700">Toilet</span>
                    </li>
                  </ul>
                </div>
              </div>
        </div>

    </div>

    <div class="bg-white py-7 px-32">
        <div class="bg-white rounded-lg shadow p-6">
          <h2 class="text-lg font-bold text-cyan-600 mb-4">Rating dan Ulasan</h2>
          <!-- Ulasan 1 -->
          <div class="flex items-start gap-4 mb-6">
            <div class="w-12 h-12 bg-cyan-200 rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-cyan-600 w-6 h-6" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <div class="flex-1">
              <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-800">Who Am I</h3>
                <div class="flex text-yellow-400">
                  <span>⭐</span><span>⭐</span><span>⭐</span><span>⭐</span><span>⭐</span>
                </div>
              </div>
              <p class="text-gray-600 mt-1">Tempatnya sangat-sangat waw... 😁</p>
              <a href="#" class="text-cyan-600 text-sm font-semibold mt-2 inline-block">Balas Who Am I</a>
            </div>
          </div>
          <!-- Ulasan 2 -->
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-cyan-200 rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-cyan-600 w-6 h-6" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <div class="flex-1">
              <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-800">Who Are U</h3>
                <div class="flex text-yellow-400">
                  <span>⭐</span><span>⭐</span><span>⭐</span><span>⭐</span><span>⭐</span>
                </div>
              </div>
              <p class="text-gray-600 mt-1">Tempatnya sangat-sangat waw... 😁</p>
              <a href="#" class="text-cyan-600 text-sm font-semibold mt-2 inline-block">Balas Who Are U</a>
            </div>
          </div>
        </div>
      </div>




@endsection
