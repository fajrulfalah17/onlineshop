{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    {{-- @include('components.style') --}}

    <title>Arn Shop - @yield('title')</title>
    <link rel="icon" href="{{ asset('horizontal/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('horizontal/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('horizontal/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('horizontal/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('horizontal/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('horizontal/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('horizontal/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('horizontal/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('horizontal/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('horizontal/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('horizontal/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('horizontal/assets/css/header-colors.css') }}" />
    @livewireStyles

</head>

<body>
    {{-- NAVBAR --}}
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="topbar-logo-header">
                    <div class="">
                        <img src="{{ asset('horizontal/assets/images/logo-icon.png') }}" class="logo-icon"
                            alt="logo icon">
                    </div>
                    <div class="">
                        <h4 class="logo-text">Rukada</h4>
                    </div>
                </div>
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="search-bar flex-grow-1">

                </div>
                <div class="top-menu ms-auto">

                </div>
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('horizontal/assets/images/avatars/avatar-2.png') }}" class="user-img"
                            alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                            {{-- <p class="designattion mb-0">Web Designer</p> --}}
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                    class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>



    {{-- SIDEBAR --}}
    <div class="nav-container primary-menu">
        <div class="mobile-topbar-header">
            <div>
                <img src="{{ asset('horizontal/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Arn Shop</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-xl w-100">
            <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class="bx bx-data"></i>
                        </div>
                        <div class="menu-title">Produk</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="{{ route('produk.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Produk</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>

    {{-- CONTENT --}}

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title', 'Dashboard')</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            {{-- @yield('content') --}}
            {{ $slot }}
            <!--end row-->
        </div>
    </div>



    {{-- FOOTER --}}
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>


    {{-- SCRIPT --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('horizontal/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('horizontal/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('horizontal/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('horizontal/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('horizontal/assets/js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
