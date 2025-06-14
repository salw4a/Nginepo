<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'id_transaksi' => 1,
                'rating' => 5,
                'komentar' => 'Pengalaman menginap sangat menyenangkan!'
            ]
        ];

        foreach ($reviews as $data) {
            Review::create($data);
        }
    }
}
