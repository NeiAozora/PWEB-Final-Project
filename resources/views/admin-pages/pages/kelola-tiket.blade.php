@extends('admin-pages.layouts.app')

@section('title', 'Kelola Tiket')

@section('content')

    {{-- @if (!empty($destinations)) --}}


    <div class="px-4 my-6 bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex justify-end w-full">
            {{-- <a href="{{ route('destination.add.show') }}" class="p-2 border mr-3 rounded-md border-cyan-500 space-x-1.5 flex w-70 justify-center hover:bg-cyan-500 hover:text-white hover:transition cursor-pointer">
                <img src="{{ asset('assets/images/icons/plus-add.svg') }}" alt="" class=" w-3 text-inherit">
                <span>Tambah Tempat Wisata</span>
            </a> --}}
        </div>


        <table id="data-table" class="table w-full text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-2 align-middle border">#</th>
                    <th class="p-2 align-middle border">ID Tiket</th>
                    <th class="p-2 align-middle border">Tempat Wisata</th>
                    <th class="p-2 align-middle border">Tanggal Visit</th>
                    <th class="p-2 align-middle border">Nama Pengguna</th>
                    <th class="p-2 align-middle border">Jumlah</th>
                    <th class="p-2 align-middle border">Status</th>
                    <th class="p-2 align-middle border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $i = 1;
                @endphp
                @foreach ($destinations as $destination) --}}

                    <tr class="hover:bg-gray-50">
                        <!-- Row number -->
                        <td class="p-2 align-middle border">1</td>
                        <!-- Other columns -->
                        <td class="p-2 align-middle border">123</td>
                        <td class="p-2 align-middle border">Gunung Bromo</td>
                        <td class="p-2 align-middle border">21/12/2024</td>
                        <td class="p-2 align-middle border">Abdul</td>
                        <td class="p-2 align-middle border underline">2</td>
                        <td class="p-2 align-middle border">
                            <span class="px-2 py-1 rounded font-semibold" style="color: rgb(255, 186, 29); background-color: rgb(255, 246, 219)">
                                Menunggu Verifikasi
                              </span>
                        </td>
                        {{-- <td class="p-2 align-middle border">
                            @if($destination->gambar)
                                <img src="{{ (str_contains($destination->gambar, "http")) ? $destination->gambar : asset($destination->gambar) }}" alt="Foto Profil" class="img-thumbnail w-12 h-12 object-cover rounded-full border border-gray-300">
                            @else
                                <span class="text-gray-500">No Foto</span>
                            @endif
                        </td> --}}
                        {{-- <td class="p-2 align-middle border">{{ $destination->rating_rata_rata }}</td>
                        <td class="p-2 align-middle border">{{ $destination->rating_rata_rata }}</td> --}}
                        <td class="p-2 align-middle border">
                            {{-- <a href="" class="btn btn-warning btn-sm px-4 py-2 rounded-md border border-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-200">Edit</a> --}}
                            <form action="" method="POST" style="display:inline;"
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                <button type="submit" class="btn btn-danger btn-sm px-4 font-semibold py-2 text-white bg-cyan-500 rounded-md border border-cyan-500 hover:bg-cyan-600 hover:text-white transition duration-200">Detail</button>
                            </form>
                        </td>
                    </tr>
                    {{-- @php
                        $i++;
                    @endphp
                @endforeach --}}
            </tbody>
        </table>
    </div>

    {{-- @else --}}
    <div class="w-full max-w-sm mx-auto bg-white rounded-lg shadow-md p-4 mt-40">
        <div class="flex items-center space-x-3">
          <div class="text-blue-500 rounded-full">
            <img src="{{ asset('assets/images/icons/warning-icon.svg') }}" class="h-16 w-16" alt="">
          </div>
          <p class="text-sm text-gray-700">Belum ada pemesanan tiket</p>
        </div>
      </div>
    {{-- @endif --}}

<script>
    lightSidebarKelolaTiketBtn()
</script>
<script src="{{ asset('scripts/data-tables.js') }}" type="module"></script>


@endsection
