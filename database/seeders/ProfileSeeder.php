<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'company_name' => 'Toko Kopi Cap Raja Muda',
            'address' => 'jl. toko kopi',
            'number' => '0858-0101-0101',
            'email' => 'kopicaprajamuda@gmail.com',
            'image' => 'null'
        ]);
    }
}
