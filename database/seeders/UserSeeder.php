<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //  Hapus dulu data dummy sebelumnya, tapi biarkan admin tetap ada
        User::where('email', '!=', 'admin@example.com')->delete();

        //  Buat 10 data dummy user
        User::factory()->count(10)->create();
    }
}
