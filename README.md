Langkah-langkah untuk menggunakan project di komputer lain 
1.	Gunakan CMD ketik :
git clone https://github.com/bayupraditya12/Mykonos_Laravel_UTSS.git
2.	Masuk ke folder dengan cara cd Mykonos_Laravel_UTSS
3.	Install composer terlebih dahulu di dalam file Mykonos_Laravel_UTSS
4.	Setelah itu copy file .env nya dengan cara cp .env.example .env
5.	php artisan key:generate
6.	Setelah copy file .env nya ganti bagian ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mykonos1 (nama database bebas)
DB_USERNAME=root
DB_PASSWORD=

7.	Ketik php artisan migrate untuk migrasi database

9.	Setelah itu web bisa digunakan tetapi saat register nya hanya bisa user, kalua ingin ke dashboard admin bisa menggunakan perintah php artisan tinker lalu ketik seperti ini
use App\Models\User;

User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('12345678'),
    'role' => 'admin',
]);
Setelah memasukkan code di atas sudah bisa masuk ke dashboard admin dan bisa menambahkan user,produk dan kategori.
