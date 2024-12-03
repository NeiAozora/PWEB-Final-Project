@extends('admin-pages.layouts.app')

@section('title', 'Dasboard')

@section('content')
<div class="flex flex-wrap gap-7 p-4 w-full">
    <!-- Komentar Baru Card -->
    <div class="card flex items-center gap-4 p-4 bg-white rounded-lg shadow-md flex-1">
        <div class="icon w-12 h-12">
            <img src="{{ asset('assets/images/icons/bubble-speeches.svg') }}" alt="">
        </div>
        <div class="block text-center">
            <h5 class="text-sm font-semibold text-cyan-600">Komentar Baru</h5>
            <h1 class="text-3xl font-bold text-cyan-800">99</h1>
        </div>
    </div>

    <!-- Ulasan Baru Card -->
    <div class="card flex items-center gap-4 p-4 shadow-md bg-white rounded-lg flex-1">
        <div class="icon w-12 h-12">
            <img src="{{ asset('assets/images/icons/thumb-with-stars.svg') }}" alt="">
        </div>
        <div class="block text-center">
            <h5 class="text-sm font-semibold text-cyan-600">Ulasan Baru</h5>
            <h1 class="text-3xl font-bold text-cyan-800">99</h1>
        </div>
    </div>

    <!-- Jumlah Pengunjung Card -->
    <div class="card w-full p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-lg font-semibold text-cyan-600">Jumlah Pengunjung</h5>
            <select id="filter-select" class="border border-gray-300 text-sm rounded-md p-2">
                <option value="hari">Per Hari</option>
                <option value="minggu">Per Minggu</option>
                <option value="bulan">Per Bulan</option>
                <option value="tahun">Per Tahun</option>
            </select>
        </div>

        <!-- Month Dropdown (Only Visible for 'Per Bulan' selection) -->
        <div id="month-dropdown-container" class="mb-4 hidden">
            <select id="month-select" class="border border-gray-300 text-sm rounded-md p-2">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>

        <!-- Year Dropdown (Only Visible for 'Per Tahun' selection) -->
        <div id="year-dropdown-container" class="mb-4 hidden">
            <select id="year-select" class="border border-gray-300 text-sm rounded-md p-2">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
        </div>

        <div class="chart-container">
            <canvas id="visitorChart" class="w-full h-60"></canvas>
        </div>
    </div>
</div>

<script src="{{ asset('scripts/dashboard-visitor-chart.js') }}"></script>

@endsection
