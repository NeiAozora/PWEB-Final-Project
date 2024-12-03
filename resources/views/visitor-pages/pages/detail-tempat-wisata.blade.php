@extends('visitor-pages.layouts.app')

@section('title', 'tempat wisata')

@section('content')
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gunung Bromo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* Mengganti font default Tailwind ke Poppins */
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">
 <div class="max-w-[1800px] h-[622px] mx-auto p-6 bg-white rounded-lg shadow-md mt-[45px]">
        <!-- Image and Content -->
    <div class="flex flex-col md:flex-row gap-6">
      <!-- Image -->
      <img src="assets/images/tempat wisata/gunung-bromo.png" alt="Gunung Bromo" class="w-[659px] h-[549px] md:w-1/2 rounded-lg shadow-md">

      <!-- Content -->
      <div class="flex-1">
        <h1 class="text-[48px] font-bold text-[#656565]">Gunung Bromo</h1>
        <div class="flex items-center text-yellow-500 mt-2">
          <span class="text-lg">★★★★★</span>
          <span class="text-[#656565] text-[16px] ml-2">100 Penilaian</span>
        </div>

        <!-- Location -->
        <div class="flex items-center text-[#656565] text-[24px] font-semibold mt-4">
          <img src="assets/images/tempat wisata/maps.png" alt="">
          <span>Probolinggo, Jawa Timur</span>
        </div>
        <a href="#" class="text-blue-500 underline mt-1 ml-20 block">Lihat di Google Maps</a>

        <!-- Ticket Prices -->
        <div class="flex items-center mt-4">
          <img src="assets/images/tempat wisata/tickets 5.png" alt="">
          <h2 class="text-[#00CCDD] text-[24px] font-semibold ml-3">Harga Tiket</h2>
          {{-- <p class="text-gray-600 mt-2">Hari biasa: <span class="font-bold text-gray-800">Rp 54.000</span></p>
          <p class="text-gray-600">Hari libur: <span class="font-bold text-gray-800">Rp 79.000</span></p> --}}
        </div>

        <!-- Whatsapp Button -->
        {{-- <div class="mt-6">
          <a href="https://wa.me/yourphone" class="bg-green-500 text-white px-6 py-2 rounded-lg flex items-center gap-2 shadow-lg hover:bg-green-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20.52 3.485c-4.39-4.39-11.521-4.39-15.91 0-4.39 4.39-4.39 11.521 0 15.91 4.39 4.39 11.521 4.39 15.91 0 4.39-4.39 4.39-11.521 0-15.91zM12.048 21.957c-1.74-.148-3.417-.745-4.956-1.761l-.468-.298-3.507.906 1.004-3.447-.341-.528c-.847-1.306-1.387-2.776-1.572-4.327C2.29 8.98 2.697 6.763 3.914 5.01 5.155 3.215 6.89 2.067 8.91 1.58c1.949-.476 4.013-.383 5.897.261 1.886.644 3.576 1.858 4.888 3.402 1.299 1.526 2.133 3.422 2.421 5.466.288 2.045-.054 4.124-1.008 5.959-.952 1.836-2.431 3.373-4.276 4.387-1.844 1.014-4.01 1.499-6.201 1.402zm-2.111-13.28c-.223.051-.476.193-.751.426-.182.16-.398.457-.646.891-.156.28-.259.477-.289.555-.024.065-.066.168-.11.31-.13.41-.065.754.176 1.073.121.157.24.274.36.355.106.073.21.14.307.209.192.13.437.32.742.57.198.16.456.375.768.641.314.268.577.463.785.585.208.122.443.235.704.34.332.134.603.225.812.271.208.045.437.065.688.058.28-.011.507-.05.684-.118.133-.053.27-.123.41-.21.193-.126.321-.244.386-.355.064-.11.138-.265.209-.46.07-.194.118-.349.143-.464l.039-.179c.048-.237.031-.445-.05-.624-.055-.124-.12-.25-.197-.374-.06-.1-.117-.183-.17-.248-.11-.132-.274-.307-.494-.524-.143-.142-.295-.288-.453-.437-.284-.266-.532-.497-.746-.694-.215-.196-.406-.377-.576-.54-.17-.162-.302-.302-.395-.42-.091-.119-.184-.252-.279-.4-.094-.147-.18-.33-.26-.552-.079-.222-.114-.43-.105-.623.008-.185.032-.335.073-.45.091-.244.229-.465.416-.66.21-.222.49-.424.838-.601.371-.189.768-.307 1.19-.354.423-.047.862-.04 1.313.018.459.06.891.172 1.296.337.405.165.745.37 1.015.615.27.246.484.538.643.878.175.381.225.76.15 1.136-.076.376-.29.73-.644 1.063-.352.331-.843.619-1.474.867-.632.248-1.328.476-2.087.684-.758.208-1.476.391-2.155.548-.679.157-1.279.267-1.799.33-.519.064-.899.091-1.141.083z" />
            </svg>
            Whatsapp Pengelola
          </a>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="max-w-[1800px] h-[622px] mx-auto p-6 bg-white rounded-lg shadow-md mt-[45px]">

  </div>
</body>
</html>




@endsection