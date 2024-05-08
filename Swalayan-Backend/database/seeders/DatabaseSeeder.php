<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Inventaris;
use App\Models\Kasir;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(30)->create();

        \App\Models\Supplier::factory(30)->create();

        \App\Models\User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'Admin'
        ]);

        \App\Models\User::factory()->create([
            'email' => 'ahmadrayhan@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'Inventaris'
        ]);

        \App\Models\User::factory()->create([
            'email' => 'ardyansyah.muhammad@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'Kasir'
        ]);

        \App\Models\User::factory()->create([
            'email' => 'muhakim@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'Pelanggan'
        ]);

        Inventaris::create([
            'nama' => 'Ahmad Rayhan',
            'nik' => '1234567890123456',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Dumai',
            'tanggal_lahir' => '2002/10/11',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Kandangan Padati, Padang',
            'user_id' => '2'
        ]);

        Kasir::create([
            'nama' => 'Muhammad Ardyansyah',
            'nik' => '1234567890123457',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '2001/03/08',
            'no_hp' => '081234567891',
            'alamat' => 'Jl. Jati, Padang',
            'user_id' => '3'
        ]);

        Pelanggan::create([
            'nama' => 'Muhakim',
            'nik' => '1234567890123458',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '2003/02/15',
            'no_hp' => '081234567892',
            'kode_pos' => fake()->postcode(),
            'alamat' => fake()->streetAddress(),
            'img_url' => fake()->imageUrl(640, 480, 'programmer', true),
            'user_id' => '4'
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            OnSupplySeeder::class,
            TransaksiSeeder::class,
            DetailTransaksiSeeder::class,
        ]);
    }
}
