<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mykonos')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color:#f2f2f2; /* abu gelap agar full background */
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color:#000035 !important; /* Biru tua elegan */
            color: white !important;
        }

        .sidebar {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 10px;
        }

        .sidebar a {
            color: #212529;
            display: block;
            padding: 5px 0;
            position: relative;
            text-decoration: none;
            transition: color 0.2s;
        }

        .sidebar a:hover {
            color: #000080;
        }

        .sidebar a.active {
            color: #000080;
            font-weight: 600;
        }

        .sidebar a.active::before {
            content: "";
            display: inline-block;
            width: 0;
            height: 0;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            border-left: 7px solid #000080;
            margin-right: 6px;
            position: relative;
            top: -1px;
        }

        .container {
            flex: 1; /* biar isi halaman dorong footer ke bawah */
            width: 100%;
        }

        footer {
            text-align: center;
            font-size: 14px;
            color: white;
            background-color: #000035;
            padding: 15px 0;
            margin-top: auto; /* footer selalu nempel di bawah */
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @include('navbar')

    {{-- Konten halaman --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer>
        &copy; {{ date('Y') }} Mykonos. All rights reserved.
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script tambahan --}}
    @stack('scripts')
</body>
</html>
