<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>psSatistika</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #333333; }
        .cta-btn { color: #000000; }
        .active-nav-link { background: #f3f4f6; color: #000000 }
        .nav-item:hover { background: #979797; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <a href="{{ route("tambahData")}}" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Tambah Data
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route("kumpulanData")}}" class="{{(request()->routeIs('kumpulanData'))? 'active-nav-link' : ''}} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item rounded-l-full">
                <i class="fas fa-align-left mr-3"></i>
                Kumpulan Data
            </a>
            <a href="{{route("tabelFrekuensi")}}" class="{{(request()->routeIs('tabelFrekuensi'))? 'active-nav-link' : ''}} flex items-center text-white py-4 pl-6 nav-item rounded-l-full">
                <i class="fas fa-sticky-note mr-3"></i>
                Table Frekuensi
            </a>
            <a href="{{route("dataBergolong")}}" class="{{(request()->routeIs('dataBergolong'))? 'active-nav-link' : ''}} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item rounded-l-full">
                <i class="fas fa-table mr-3"></i>
                Data Bergolong
            </a>
            <a href="{{route("chiKuadrat")}}" class="{{(request()->routeIs('chiKuadrat'))? 'active-nav-link' : ''}} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item rounded-l-full">
                <i class="fas fa-table mr-3"></i>
                Chi Kuadrat
            </a>
            <a href="{{route("lilliefors")}}" class="{{(request()->routeIs('lilliefors'))? 'active-nav-link' : ''}} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item rounded-l-full">
                <i class="fas fa-table mr-3"></i>
                Lilliefors
            </a>
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="{{route("kumpulanData")}}" class="{{(request()->routeIs('kumpulanData'))? 'active-nav-link' : ''}} flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Kumpulan Data
                </a>
                <a href="{{route("tabelFrekuensi")}}" class="{{(request()->routeIs('tabelFrekuensi'))? 'active-nav-link' : ''}} flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Table Frekuensi
                </a>
                <a href="{{route("dataBergolong")}}" class="{{(request()->routeIs('dataBergolong'))? 'active-nav-link' : ''}} Fflex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Data Bergolong
                </a>
                <a href="{{route("chiKuadrat")}}" class="{{(request()->routeIs('chiKuadrat'))? 'active-nav-link' : ''}} Fflex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Chi Kuadrat
                </a>
                <a href="{{route("lilliefors")}}" class="{{(request()->routeIs('lilliefors'))? 'active-nav-link' : ''}} Fflex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Lilliefors
                </a>
                <a href="{{route("ujiT")}}" class="{{(request()->routeIs('ujiT'))? 'active-nav-link' : ''}} Fflex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Uji T
                </a>
                <a href="{{route("anava")}}" class="{{(request()->routeIs('anava'))? 'active-nav-link' : ''}} Fflex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Uji Anava 1 jalur
                </a>
                <a href="#" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-5">
                <h1 class="text-3xl text-black pb-5">@yield('header')</h1>

                @yield('content')
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://www.instagram.com/ptsuardana01" class="underline">ptsuardana01</a>.
            </footer>
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
