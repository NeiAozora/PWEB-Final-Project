@extends('visitor-pages.layouts.app')

@section('title', 'Homepage')

@section('content')

    {{-- Carousal Script --}}

    <script>
        // Add functionality for auto-transitioning the carousel
        document.addEventListener("DOMContentLoaded", () => {
            let index = 0;
            const slides = document.querySelectorAll(".carousel-slide");
            const totalSlides = slides.length;

            setInterval(() => {
                slides[index].classList.remove("opacity-100", "translate-x-0");
                slides[index].classList.add("opacity-0", "translate-x-full");

                index = (index + 1) % totalSlides;

                slides[index].classList.remove("opacity-0", "translate-x-full");
                slides[index].classList.add("opacity-100", "translate-x-0");
            }, 5000); // 5 seconds interval
        });
    </script>

    {{-- end Carousal script --}}

    {{-- Carousal --}}

    <div class="relative overflow-hidden w-full h-[500px]">
        <!-- Slide 1 -->
        <div class="carousel-slide absolute inset-0 transition-all duration-1000 transform translate-x-0 opacity-100">
            <img src="{{ asset('assets/images/gunung-bromo.svg') }}" alt="Gunung Bromo Sunrise" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
                <div class="p-12 lg:ml-20 text-left max-w-lg">
                    <h2 class="text-white text-4xl font-bold mb-4">
                        Menyaksikan Keajaiban Sunrise di Gunung Bromo
                    </h2>
                    <p class="text-white text-lg mb-6">
                        Nikmati keindahan alam yang memukau saat matahari terbit di salah satu gunung terindah di Indonesia.
                    </p>
                    <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded shadow">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-slide absolute inset-0 transition-all duration-1000 transform translate-x-full opacity-0">
            <img src="https://via.placeholder.com/1920x1080" alt="Placeholder Slide" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
                <div class="p-12 lg:ml-20 text-left max-w-lg">
                    <h2 class="text-white text-4xl font-bold mb-4">Slide Kedua</h2>
                    <p class="text-white text-lg mb-6">
                        Ini adalah contoh deskripsi untuk slide kedua dalam carousel ini.
                    </p>
                    <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded shadow">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-slide absolute inset-0 transition-all duration-1000 transform translate-x-full opacity-0">
            <img src="https://via.placeholder.com/1920x1080?text=Another+Slide" alt="Another Slide" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
                <div class="p-12 lg:ml-20 text-left max-w-lg">
                    <h2 class="text-white text-4xl font-bold mb-4">Slide Ketiga</h2>
                    <p class="text-white text-lg mb-6">
                        Slide ini menampilkan gambar dan teks lain sebagai bagian dari carousel.
                    </p>
                    <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded shadow">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- end of carousal --}}

{{-- Section pilih seleramu --}}
@php
    $categories = [
        ['name' => 'Alam', 'icon' => 'pilih-selera-icon-alam.svg'],
        ['name' => 'Sejarah', 'icon' => 'pilih-selera-icon-sejarah.svg'],
        ['name' => 'Kuliner', 'icon' => 'pilih-selera-icon-kuliner.svg'],
        ['name' => 'Religi', 'icon' => 'pilih-selera-icon-religi.svg'],
        ['name' => 'Rekreasi', 'icon' => 'pilih-selera-icon-rekreasi.svg'],
        ['name' => 'Bahari', 'icon' => 'pilih-selera-icon-bahari.svg'],
    ];
@endphp

<div class="text-center py-12">
    <h1 class="text-3xl font-extrabold text-cyan-500">Pilih Seleramu</h1>
    <p class="text-gray-500 mt-2 text-lg">Cari tempat wisata berdasarkan kategori tempat wisata kesukaanmu</p>
    <div class="flex justify-center items-center gap-8 mt-10 flex-wrap">
        @foreach ($categories as $category)
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 flex items-center justify-center bg-cyan-100 rounded-full">
                    <img src="{{ asset('assets/images/homepage/' . $category['icon']) }}" alt="{{ $category['name'] }} Icon" class="w-20 h-20">
                </div>
                <p class="text-base font-medium text-gray-700 mt-3">{{ $category['name'] }}</p>
            </div>
        @endforeach
    </div>
</div>
{{-- end of Section pilih seleramu --}}

{{-- tempat wisata populer --}}

    <div class="bg-cyan-500">
    <div class="text-center py-8">
      <h1 class="text-white text-2xl font-bold">
        #12 Tempat Wisata Populer
      </h1>
      <p class="text-white text-lg">
        12 tempat wisata yang paling sering dikunjungi bulan ini
      </p>
    </div>
  </div>

{{-- tempat wisata populer --}}


{{-- top 12 tempat wisata --}}


@php
        $destinations = [
        ['id' => 1, 'name' => 'Gunung Bromo', 'image' => asset('assets/images/homepage/cards/gunung-bromo-card.svg')],
        ['id' => 2, 'name' => 'Candi Borobudur', 'image' => 'candi-borobudur.jpg'],
        ['id' => 3, 'name' => 'Raja Ampat', 'image' => 'raja-ampat.jpg'],
        ['id' => 4, 'name' => 'Pulau Dewata', 'image' => 'pulau-dewata.jpg'],
        ['id' => 5, 'name' => 'Labuan Bajo', 'image' => ''],
        ['id' => 6, 'name' => 'Taman Bunaken', 'image' => ''],
        ['id' => 7, 'name' => 'Kawah Ijen', 'image' => ''],
        ['id' => 8, 'name' => 'Gili Trawang', 'image' => ''],
        ['id' => 9, 'name' => 'Tana Toraja', 'image' => ''],
        ['id' => 10, 'name' => 'Taman Bunaken', 'image' => ''],
        ['id' => 11, 'name' => 'Kawah Ijen', 'image' => ''],
        ['id' => 12, 'name' => 'Gili Trawang', 'image' => ''],

    ];
@endphp
<div class="p-8">
    <div class="grid gap-6 justify-center px-9" style="grid-template-columns: repeat(auto-fit, minmax(283px, 1fr));">
        @foreach ($destinations as $destination)
          <!-- Card -->
          <div class="w-[283px] h-[326px] bg-white rounded-lg shadow-lg overflow-hidden relative">
            <!-- Badge -->
            <div class="absolute top-2 left-2 bg-cyan-500 text-white font-bold text-sm px-3 py-1 rounded-full">
              {{ $destination['id'] }}
            </div>
            <!-- Image -->
            <img
              class="w-full h-full object-cover z-[-1]"
              src="{{ $destination['image'] }}"
              alt="{{ $destination['name'] }}">
            <!-- Content -->
            <div class="p-4 text-center z-10">
              <h3 class="text-lg font-semibold text-gray-800">{{ $destination['name'] }}</h3>
              <a href="#" class="mt-3 inline-block bg-cyan-500 text-white text-sm font-medium py-2 px-4 rounded-full hover:bg-cyan-700">
                Selengkapnya
              </a>
            </div>
          </div>
        @endforeach
      </div>
</div>



@endsection
