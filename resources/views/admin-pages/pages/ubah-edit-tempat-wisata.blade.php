@extends('admin-pages.layouts.app')

@section('title', $isEditMode ? 'Edit Tempat Wisata' : 'Tambah Tempat Wisata')

@section('content')
<div class="bg-gray-50 p-6">
    <div class="max-w-full mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-cyan-600 mb-4">{{ $isEditMode ? 'Edit' : 'Tambah' }} Tempat Wisata</h1>
        <form method="POST" action="{{ $isEditMode ? route('destination.update', $destination->id_tempat_wisata) : route('destination.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($isEditMode)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Tempat Wisata</label>
                <input
                    type="text"
                    name="nama"
                    value="{{ old('name', $isEditMode ? $destination->nama : '') }}"
                    placeholder="Masukkan Nama Tempat Wisata"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi Tempat Wisata</label>
                <textarea
                    name="description"
                    placeholder="Masukkan Deskripsi Tempat Wisata"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">{{ old('deskripsi', $isEditMode ? $destination->deskripsi : '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Fasilitas</label>
                <div class="flex gap-2 mb-2 max-w-96">
                    <input
                        type="text"
                        id="facilityInput"
                        placeholder="Masukkan Nama Fasilitas"
                        class="flex-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    <button type="button" id="addFacilityButton" class="bg-cyan-500 text-white px-4 py-2 rounded-md hover:bg-cyan-600">Tambah</button>
                </div>
                <div class="flex flex-wrap gap-2 w-full p-2 border border-gray-300 rounded-md" id="facilityContainer">

                    @if (empty($destination->fasilitas))
                        <p id="emptyMessage" class="text-gray-500 italic p-2">Anda belum menambahkan fasilitas</p>
                    @endif

                    @php
                        $i = 1;
                    @endphp
                    @foreach ($destination->fasilitas as $fasilitas)
                    <div class="border-cyan-500 p-1 border-2 rounded-md flex gap-1">
                        <input type="text" name="nama_fasilitas_{{ $i }}" value="{{ $fasilitas->nama_fasilitas }}" class="p-2">
                        <input type="text" name="id_fasilitas_{{ $i }}" value="{{ $fasilitas->id_fasilitas }}" class="hidden">
                        <button type="button" class="bg-cyan-500 rounded-sm text-white px-2"
                        onclick="removeFacility(this); checkIfEmpty();"
                        >x</button>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach

                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Foto Tempat Wisata (Maksimal 5 foto)</label>
                <input type="file" id="input" class="block w-full text-gray-700 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400" onchange="handleFileChange(event)">

                <div class="flex flex-wrap gap-3 w-full p-2 border border-gray-300 rounded-md">

                    @if (empty($destination->gambar_tempat_wisata))
                        <p class="text-gray-500 mt-2">Belum ada foto diunggah'</p>
                    @endif
                    @php
                        $i = 1;
                    @endphp
                    <div id="input-images-container" class="flex">
                        @foreach ($destination->gambar_tempat_wisata as $gambar)
                        <div class="border-cyan-500 p-1 border-2 rounded-md flex gap-1" data-id="0">
                            <div class="max-h-24 transition duration-300 ease-in-out">
                                <img src="{{ asset($gambar->url_gambar) }}" alt="" class="max-h-24 group-hover:filter group-hover:brightness-0 group-hover:invert">
                                <input class="hidden id" name="id_gambar_tempat_wisata_{{ $i }}" value="{{ $gambar->id_gambar_tempat_wisata }}">
                                <input class="hidden image" type="file" name="gambar_tempat_wisata_{{ $i }}"  >
                            </div>
                            <button type="button" class="px-2 border border-r-1 border-t-1 border-b-1 hover:bg-cyan-500 transition duration-300 ease-in-out  group" onclick="deleteImage(event)">
                                <img src="https://img.icons8.com/ios-filled/24/06b6d4/trash.png" alt="" class="transition duration-300 ease-in-out group-hover:filter group-hover:brightness-0 group-hover:invert">
                            </button>
                        </div>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </div>


                </div>

            </div>


            <script>
                function handleFileChange(event) {
                    const fileInput = event.target;
                    const file = fileInput.files[0];

                    // Check if a file is selected
                    if (file) {
                        let imageContainer = document.getElementById("input-images-container");
                        let imageCount = imageContainer.children.length;
                        console.log(imageCount);
                        if (imageCount >= 5) {
                            alert("Maksimal 5 foto yang dapat diunggah");
                            return;
                        }

                        // hapus pemberittauan jika gambar kosong
                        if (imageContainer.firstElementChild.tagName === 'P') {
                            imageContainer.innerHTML = '';
                        }

                        // Create the image HTML structure
                        let imageHtml = `
                            <div class="border-cyan-500 p-1 border-2 rounded-md flex gap-1" data-id="0">
                                <div class="max-h-24 transition duration-300 ease-in-out">
                                    <img alt="" class="max-h-24 group-hover:filter group-hover:brightness-0 group-hover:invert">
                                    <input class="hidden id" name="id_gambar_tempat_wisata_${imageCount}" value="0">
                                    <input class="hidden image" type="file" name="gambar_tempat_wisata_${imageCount}">
                                </div>
                                <button type="button" class="px-2 border border-r-1 border-t-1 border-b-1 hover:bg-cyan-500 transition duration-300 ease-in-out group" onclick="deleteImage(event)">
                                    <img src="https://img.icons8.com/ios-filled/24/06b6d4/trash.png" alt="" class="transition duration-300 ease-in-out group-hover:filter group-hover:brightness-0 group-hover:invert">
                                </button>
                            </div>
                        `;

                        // Convert HTML string to DOM element
                        let imgElement = createElementFromHTML(imageHtml);

                        // Set the image source
                        const imageElement = imgElement.querySelector('img.max-h-24');
                        imageElement.src = URL.createObjectURL(file);

                        // Update the file input name attributes for proper identification
                        const idInputElement = imgElement.querySelector('input[name^="id_gambar_tempat_wisata_"]');
                        idInputElement.name = `id_gambar_tempat_wisata_${imageCount}`;

                        const fileInputElement = imgElement.querySelector('input[type="file"][name^="gambar_tempat_wisata_"]');
                        fileInputElement.name = `gambar_tempat_wisata_${imageCount}`;

                        // Now set the correct file input value to be the selected file
                        fileInputElement.files = fileInput.files;

                        // Append the new image element to the container
                        imageContainer.appendChild(imgElement);
                    }

                }

                function deleteImage(event) {
                    const imageElement = event.target.closest('div[data-id]');
                    const idInputElement = imageElement.querySelector('input[name^="id_gambar_tempat_wisata_"]');
                    if (idInputElement.value != "0" && !confirm("Apakah anda yakin ingin menghapus gambar yang tersimpan ini?")) return;
                    imageElement.remove();
                    checkContainerEmpty();
                }

                function checkContainerEmpty() {
                    const imageContainer = document.getElementById("input-images-container");
                    if (imageContainer.children.length === 0) {
                        imageContainer.innerHTML = `<p class="text-gray-500 mt-2">Belum ada foto diunggah</p>`;
                    }
                }

            </script>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
                <div class="grid grid-cols-3 gap-4">
                    <input name="provinsi" placeholder="Isi Provinsi" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">

                    <input name="kabupaten" placeholder="Isi Kabupaten" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </input>
                    <input name="kecamatan" placeholder="Isi Kota" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </input>


                </div>
                <div class="flex mt-4">
                    <div class="p-2 bg-gray-200 rounded-l-md"><img src="{{ asset('assets/images/icons/gmaps-icon.svg') }}" alt="" class="max-w-full"></div>
                    <input
                    type="text"
                    name="gmaps_link"
                    value="{{ old('gmaps_link', $isEditMode ? $destination->gmaps_link : '') }}"
                    placeholder="Link Google Maps"
                    class="p-3 w-full border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Jam Buka & Harga Tiket</label>
                <button class=" p-4 bg-cyan-500" id="addTicketButton">Tambah Tiket baru</button>
                <div class="tickets-container grid grid-cols-3 gap-6">

                    @php
                        $i = 1;
                    @endphp
                    @foreach ($destination->tipe_tiket as $tipe_tiket)
                    <div class="p-4 border border-gray-300 rounded-md mb-4">
                        <div class="block my-4">
                            <label for="nama_tipe_{{ $i }}" class="font-medium text-gray-800">Nama tipe tiket :</label><br>
                            <input type="text" name="nama_tipe_{{ $i }}" class="text-lg font-semibold text-gray-800 border border-gray-300 p-2" value="{{ $tipe_tiket->nama_tipe }}">
                        </div>

                        <input type="text" name="id_tipe_tiket_{{ $i }}" value="{{ $tipe_tiket->id_tipe_tiket }}" class="hidden">
                        @php
                            $j = 1;
                        @endphp

                        @foreach ($tipe_tiket->hari as $hari)
                        <div class="flex items-center gap-2 mb-4">
                            <label class="flex-shrink-0 w-32 font-medium text-gray-700" for="day">Hari</label>
                            <select name="hari_{{ $i }}_{{ $j }}" class="flex-grow p-3 border border-gray-300 rounded-md">
                                <option value="Senin" {{ ($hari->nama_hari == 'Senin') ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ ($hari->nama_hari == 'Selasa') ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ ($hari->nama_hari == 'Rabu') ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ ($hari->nama_hari == 'Kamis') ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ ($hari->nama_hari == 'Jumat') ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ ($hari->nama_hari == 'Sabtu') ? 'selected' : '' }}>Sabtu</option>
                                <option value="Minggu" {{ ($hari->nama_hari == 'Minggu') ? 'selected' : '' }}>Minggu</option>
                            </select>
                        </div>
                        @php
                            $j++;
                        @endphp
                        @endforeach

                        <div class="flex items-center gap-2 mb-4">
                            <label for="waktu_dimulai" class="flex-shrink-0 w-32 font-medium text-gray-700">Dibuka</label>
                            <input
                                type="time"
                                name="waktu_dimulai_{{ $i }}"
                                value="{{ old('waktu_dimulai', $isEditMode ? date('H:i', strtotime($tipe_tiket->waktu_dimulai)) : '00:00') }}"
                                placeholder="Waktu Dimulai"
                                class="flex-grow p-3 border border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="flex items-center gap-2 mb-4">
                            <label for="waktu_berakhir" class="flex-shrink-0 w-32 font-medium text-gray-700">Ditutup</label>
                            <input
                                type="time"
                                name="waktu_berakhir_{{ $i }}"
                                value="{{ old('waktu_berakhir', $isEditMode ? date('H:i', strtotime($tipe_tiket->waktu_berakhir)) : '00:00') }}"
                                placeholder="Waktu Berakhir"
                                class="flex-grow p-3 border border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="flex items-center gap-2 mb-4">
                            <label for="harga_tiket" class="flex-shrink-0 w-32 font-medium text-gray-700">Harga Tiket</label>
                            <div class="flex">
                                <div class="p-3 bg-cyan-500 text-white rounded-l-md">Rp.</div>
                                <input
                                    type="number"
                                    name="harga_tiket_{{ $i }}"
                                    value="{{ old('harga_tiket', $isEditMode ? $tipe_tiket->harga : '') }}"
                                    placeholder="Harga Tiket"
                                    class="flex-grow p-3 border border-gray-300 rounded-md"
                                >
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Fungsi untuk menambah entri Jam Buka & Harga Tiket
                    let ticketContainer = document.querySelector('.grid');

                    function addTicket() {
                        let newTicket = document.createElement('div');
                        newTicket.classList.add('p-4', 'border', 'border-gray-300', 'rounded-md', 'mb-4');

                        newTicket.innerHTML = `
                            <div class="block my-4">
                                <label for="nama_tipe_${i}" class="font-medium text-gray-800">Nama tipe tiket :</label><br>
                                <input type="text" name="nama_tipe_${i}" class="text-lg font-semibold text-gray-800 border border-gray-300 p-2">
                            </div>

                            <div class="flex items-center gap-2 mb-4">
                                <label class="flex-shrink-0 w-32 font-medium text-gray-700" for="hari">Hari</label>
                                <select name="hari_${i}_1" class="flex-grow p-3 border border-gray-300 rounded-md">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>

                            <div class="flex items-center gap-2 mb-4">
                                <label for="waktu_dimulai_${i}" class="flex-shrink-0 w-32 font-medium text-gray-700">Dibuka</label>
                                <input type="time" name="waktu_dimulai_${i}" class="flex-grow p-3 border border-gray-300 rounded-md">
                            </div>

                            <div class="flex items-center gap-2 mb-4">
                                <label for="waktu_berakhir_${i}" class="flex-shrink-0 w-32 font-medium text-gray-700">Ditutup</label>
                                <input type="time" name="waktu_berakhir_${i}" class="flex-grow p-3 border border-gray-300 rounded-md">
                            </div>

                            <div class="flex items-center gap-2 mb-4">
                                <label for="harga_tiket_${i}" class="flex-shrink-0 w-32 font-medium text-gray-700">Harga Tiket</label>
                                <div class="flex">
                                    <div class="p-3 bg-cyan-500 text-white rounded-l-md">Rp.</div>
                                    <input type="number" name="harga_tiket_${i}" class="flex-grow p-3 border border-gray-300 rounded-md">
                                </div>
                            </div>
                        `;

                        ticketContainer.appendChild(newTicket);
                        i++;
                    }

                    // Anda bisa menambah tombol atau mekanisme lain di sini untuk memicu penambahan tiket baru
                    // Contoh jika ada tombol untuk menambah tiket
                    let addTicketButton = document.querySelector('#addTicketButton');
                    if (addTicketButton) {
                        addTicketButton.addEventListener('click', addTicket);
                    }
                });
            </script>


            <button type="submit" class="w-full bg-cyan-500 text-white py-3 rounded-md hover:bg-cyan-600">
                {{ $isEditMode ? 'Perbarui' : 'Simpan' }}
            </button>
        </form>
    </div>
</div>

<script>
        document.getElementById('addFacilityButton').addEventListener('click', function () {
        const facilityInput = document.getElementById('facilityInput');
        const facilityContainer = document.getElementById('facilityContainer');
        const emptyMessage = document.getElementById('emptyMessage');

        // Ambil nilai input
        const facilityName = facilityInput.value.trim();

        if (facilityName === '') {
            alert('Nama fasilitas tidak boleh kosong!');
            return;
        }

        // Hapus pesan "Anda belum menambahkan fasilitas" jika ada
        if (emptyMessage) {
            emptyMessage.remove();
        }

        // Hitung jumlah fasilitas saat ini
        const facilityCount = facilityContainer.querySelectorAll('div.border-cyan-500').length + 1;

        // Tambahkan fasilitas baru
        const facilityHTML = `
            <div class="border-cyan-500 p-1 border-2 rounded-md flex gap-1">
                <input type="text" name="nama_fasilitas_${facilityCount}" value="${facilityName}" class="p-2">
                <input type="text" name="id_fasilitas_${facilityCount}" value="0" class="hidden">
                <button type="button" class="bg-cyan-500 rounded-sm text-white px-2" onclick="removeFacility(this); checkFacility()">x</button>
            </div>
        `;

        facilityContainer.insertAdjacentHTML('beforeend', facilityHTML);

        // Kosongkan input setelah menambah fasilitas
        facilityInput.value = '';
    });

    function removeFacility(element){
        const facilityInput = element.parentElement.querySelector('input[name^="id_fasilitas_"]');
        const facilityId = facilityInput.value;

        if (facilityId != 0) {
            if (!confirm("Yakin ingin menghapus fasilitas ini?")){
                return;
            }
        }
        element.parentElement.remove();
    }

    function checkIfEmpty() {

        const facilityList = document.getElementById('facilityContainer');
        if (!facilityList.children.length) {
            facilityList.innerHTML = '<p class="text-gray-500 italic p-2" id="noFacilityMessage">Anda belum menambahkan fasilitas</p>';
        }
    }
</script>

@endsection
