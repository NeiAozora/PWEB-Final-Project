<nav class="flex items-center justify-between bg-white p-4 shadow">
    <!-- Logo -->
    <div class="flex items-center space-x-2 hidden lg:flex">
        <img src="path/to/logo.png" alt="Logo" class="h-6" />
        <span class="text-cyan-500 text-xl font-bold">visitnusantara</span>
    </div>

    <!-- Search Bar -->
    <div class="flex items-center border rounded-full overflow-hidden shadow-sm flex-1 lg:mx-4">
        <input type="text" placeholder="Jawa Timur" class="px-4 py-2 w-full focus:outline-none" />
        <button class="bg-cyan-500 text-white px-4 py-2">Cari</button>
    </div>

    <!-- Buttons -->
    <div class="hidden lg:flex items-center space-x-4">
        <button class="text-cyan-500 font-semibold">Masuk</button>
        <button class="bg-cyan-500 text-white px-4 py-2 rounded-full">Daftar</button>
    </div>

    <!-- Hamburger Menu -->
    <button class="text-cyan-500 lg:hidden ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>
</nav>
