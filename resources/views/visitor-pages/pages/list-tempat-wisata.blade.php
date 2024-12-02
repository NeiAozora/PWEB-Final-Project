@extends('visitor-pages.layouts.app')

@section('title', 'Daftar Tempat Wisata')

@section('content')

<script src="{{ asset('scripts/destinations-page-script.js') }}"></script>
<script src="{{ asset('scripts/loading-animation.js') }}"></script>

<div class="flex">

    {{-- Sidebar --}}
    <div class="w-200 bg-white p-5 px-12 border-r-2 border-x-gray-200 border-gray-200">
        <h2 class="text-lg font-bold text-cyan-500 transition-colors duration-300 hover:text-cyan-400">Filter</h2>

        <h3 class="text-md font-semibold mt-4 text-[#656565]">Kategori</h3>
        <ul>
            @foreach($categories as $category)
                <li>
                    <label class="text-[#656565] flex items-center space-x-2">
                        <input type="checkbox" class="w-5 h-5 border-2 border-cyan-500 rounded-sm focus:outline-none peer checked:bg-cyan-500 checked:border-cyan-500 checked:ring-2 checked:ring-white">
                        <span>{{ $category }}</span>
                    </label>
                </li>
            @endforeach
        </ul>

        <h3 class="text-md font-semibold mt-4 text-cyan-500">Lokasi</h3>
        <ul>
            @foreach($locations as $location)
                <li>
                    <label class="text-[#656565] flex items-center space-x-2">
                        <input type="checkbox" class="w-5 h-5 border-2 border-cyan-500 rounded-sm focus:outline-none peer checked:bg-cyan-500 checked:border-cyan-500 checked:ring-2 checked:ring-white">
                        <span>{{ $location }}</span>
                    </label>
                </li>
            @endforeach
        </ul>

        <button class="mt-4 p-2 bg-cyan-500 text-white font-semibold rounded transition-colors duration-300 hover:bg-cyan-600">
            Reset Filter
        </button>
    </div>

    {{-- End of Sidebar --}}


    {{-- Content --}}
    <div class="w-5/6">

        <div class="px-14 py-14">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="destination-container">

                <!-- being looped 8 times per page -->

            </div>
        </div>


    <!-- pagination -->
    <nav aria-label="Page navigation example" class="flex flex-col items-center w-full h-full md:pb-2 sm:pb-2 pb-6">
        <ul class="pagination flex mt-5 space-x-2">
        </ul>
    </nav>

    </div>
    {{-- End of Content --}}
  </div>

@endsection
