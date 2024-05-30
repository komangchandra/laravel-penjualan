<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'bank' => 'BRI',
            'number' => '123-456-789-1091',
        ]);
        Payment::create([
            'bank' => 'COD',
            'number' => '123-456-789-1091',
        ]);
    }
}
