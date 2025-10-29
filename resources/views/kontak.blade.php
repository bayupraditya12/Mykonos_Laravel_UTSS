@extends('app')

@section('content')
<style>
html, body {
    margin: 0 !important;
    padding: 0 !important;
    height: 100%;
    width: 100%;
    background-color: #343741 !important; /* pastikan full abu */
    overflow-x: hidden;
}

/* Pastikan konten utama nempel di bawah navbar */
main, .content {
    margin: 0 !important;
    padding: 0 !important;
}

/* Navbar tetap seperti halaman Home */
.navbar {
    position: relative;
    z-index: 10;
}
.navbar .container {
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 15px;
    padding-right: 15px;
}

/* Wrapper full background */
.kontak-wrapper {
    position: relative;
    top: 0;
    left: 0;
    width: 100vw;
    min-height: calc(100vh - 70px); /* dikurangi tinggi navbar */
    background-color: #343741 !important;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 0;
    margin: 0 !important;
}

/* Pastikan tidak ada putih dari layout utama */
body > .container,
body > .container-fluid {
    margin: 0 !important;
    padding: 0 !important;
    width: 100% !important;
}

/* Card utama */
.kontak-card {
    background: linear-gradient(to bottom right, #747f91, #2a3345);
    padding: 50px 40px 30px;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 90%;
    max-width: 500px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Logo */
.kontak-card img {
    width: 80px;
    height: auto;
    margin-bottom: 10px;
}

/* Username */
.kontak-card h4 {
    color: white;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
}

/* Tombol link */
.link-button {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: white;
    border-radius: 50px;
    padding: 12px 20px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 90%;
    max-width: 450px;
    margin-bottom: 15px;
    transition: 0.3s;
}

.link-button:hover {
    background: rgba(255, 255, 255, 0.1);
}

.link-button span {
    display: flex;
    align-items: center;
}

.link-button i {
    font-size: 1.2rem;
}
</style>

<div class="kontak-wrapper">
    <div class="kontak-card">
        <img src="{{ asset('images/mykonos-logo.png') }}" alt="Logo Mykonos">
        <h4>@Mykonosofficial</h4>

        <a href="#" class="link-button">
            <span><i class="bi bi-tiktok me-2"></i> Tiktok Official Store</span>
            <i class="bi bi-three-dots-vertical"></i>
        </a>

        <a href="#" class="link-button">
            <span><i class="bi bi-shop me-2"></i> Shopee Official Store</span>
            <i class="bi bi-three-dots-vertical"></i>
        </a>

        <a href="#" class="link-button">
            <span><i class="bi bi-shop me-2"></i> Tokopedia Official Store</span>
            <i class="bi bi-three-dots-vertical"></i>
        </a>

        <a href="#" class="link-button">
            <span><i class="bi bi-bag-heart me-2"></i> Sociolla</span>
            <i class="bi bi-three-dots-vertical"></i>
        </a>

        <a href="#" class="link-button">
            <span><i class="bi bi-shop me-2"></i> BliBli Official Store</span>
            <i class="bi bi-three-dots-vertical"></i>
        </a>
    </div>
</div>
@endsection
