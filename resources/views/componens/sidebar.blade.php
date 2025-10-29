<div class="sidebar">
    <h5 class="fw-bold mb-3">
        <i class="bi bi-list me-2"></i> Kategori
    </h5>
    <hr class="my-2">
    <ul class="list-unstyled ps-2">
        <li class="mb-2"><a href="#" class="category-link active" data-category="Semua Produk">Semua Produk</a></li>
        <li class="mb-2"><a href="#" class="category-link" data-category="Aquatic & Aromatic">Aquatic & Aromatic</a></li>
        <li class="mb-2"><a href="#" class="category-link" data-category="Fresh Florals">Fresh Florals</a></li>
        <li class="mb-2"><a href="#" class="category-link" data-category="Oriental">Oriental</a></li>
        <li class="mb-2"><a href="#" class="category-link" data-category="Sweet Fruity">Sweet Fruity</a></li>
        <li class="mb-2"><a href="#" class="category-link" data-category="Powdery Elegance">Powdery Elegance</a></li>
        <li class="mb-2"><a href="#" class="category-link" data-category="Gourmand Galore">Gourmand Galore</a></li>
    </ul>
</div>

{{-- cript agar kategori bisa ganti konten tanpa reload --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryLinks = document.querySelectorAll('.category-link');
    const mainContent = document.getElementById('main-content'); // pastikan ID ini ada di konten utama

    // Fungsi untuk memuat kategori
    function loadCategory(category, link) {
        // ubah tampilan link aktif
        categoryLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');

        const url = category === 'Semua Produk'
            ? `/`  // jika "Semua Produk", arahkan ke halaman utama
            : `/kategori/${encodeURIComponent(category)}`;

        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error('Gagal memuat data');
                return response.text();
            })
            .then(html => {
                // ambil isi #main-content dari halaman yang di-fetch
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.getElementById('main-content');

                if (newContent) {
                    mainContent.innerHTML = newContent.innerHTML;
                } else {
                    mainContent.innerHTML = '<p class="text-danger">Gagal menampilkan konten kategori.</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mainContent.innerHTML = `<p class="text-danger">Gagal memuat kategori.</p>`;
            });
    }

    // Event listener untuk setiap kategori
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const category = this.getAttribute('data-category');
            loadCategory(category, this);
        });
    });
});
</script>

{{-- Tambahan kecil untuk gaya link aktif --}}
<style>
.category-link {
    text-decoration: none;
    color: black;
    transition: color 0.2s;
}
.category-link:hover {
    color: #0d6efd;
}
.category-link.active {
    color: #0d6efd;
    font-weight: bold;
}
</style>
