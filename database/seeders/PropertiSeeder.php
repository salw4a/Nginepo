<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Properti;

class PropertiSeeder extends Seeder
{
    public function run(): void
    {
        $propertiData = [
            [
                'nama_properti' => 'Pondok Rowo Indah',
                'lokasi' => 'Jalan Tawangalun, No 15',
                'deskripsi' => '3 kamar tidur, 2 kamar mandi, dapur',
                'harga_per_malam' => 150000,
                'maksimum_tamu' => 6,
                'id_status_properti' => 1,
                'id_pemilik' => 1,
                'foto' => 'properti/pondok1.jpg'
            ],
            [
                'nama_properti' => 'Omah Tawon',
                'lokasi' => 'Jalan Kaliputih, No 8',
                'deskripsi' => '2 kamar tidur, 1 kamar mandi, ruang tamu',
                'harga_per_malam' => 135000,
                'maksimum_tamu' => 4,
                'id_status_properti' => 1,
                'id_pemilik' => 1,
                'foto' => 'properti/omah_tawon.jpg'
            ],
            [
                'nama_properti' => 'Omah Kali Putih',
                'lokasi' => 'Jalan Papuma, No 22',
                'deskripsi' => '4 kamar tidur, 3 kamar mandi, taman',
                'harga_per_malam' => 200000,
                'maksimum_tamu' => 8,
                'id_status_properti' => 1,
                'id_pemilik' => 1,
                'foto' => 'properti/kali_putih.jpg'
            ],
            [
                'nama_properti' => 'Teras Tanjung Papuma',
                'lokasi' => 'Jalan Tanjung Papuma, No 5',
                'deskripsi' => '3 kamar tidur, 2 kamar mandi, dapur',
                'harga_per_malam' => 250000,
                'maksimum_tamu' => 6,
                'id_status_properti' => 1,
                'id_pemilik' => 1,
                'foto' => 'properti/tanjung_papuma.jpg'
            ],
            [
                'nama_properti' => 'Pondok Rowo Indah 2',
                'lokasi' => 'Jalan Tawangalun, No 17',
                'deskripsi' => '2 kamar tidur, 1 kamar mandi, teras',
                'harga_per_malam' => 150000,
                'maksimum_tamu' => 4,
                'id_status_properti' => 1,
                'id_pemilik' => 2,
                'foto' => 'properti/pondok2.jpg'
            ],
            [
                'nama_properti' => 'Omah Tawon 2',
                'lokasi' => 'Jalan Kaliputih, No 10',
                'deskripsi' => '3 kamar tidur, 2 kamar mandi, gazebo',
                'harga_per_malam' => 135000,
                'maksimum_tamu' => 6,
                'id_status_properti' => 1,
                'id_pemilik' => 2,
                'foto' => 'properti/omah_tawon2.jpg'
            ],
            [
                'nama_properti' => 'Omah Kali Putih 2',
                'lokasi' => 'Jalan Papuma, No 24',
                'deskripsi' => '3 kamar tidur, 2 kamar mandi, kolam renang',
                'harga_per_malam' => 200000,
                'maksimum_tamu' => 6,
                'id_status_properti' => 1,
                'id_pemilik' => 1,
                'foto' => 'properti/kali_putih2.jpg'
            ],
            [
                'nama_properti' => 'Teras Tanjung Papuma 2',
                'lokasi' => 'Jalan Tanjung Papuma, No 7',
                'deskripsi' => '4 kamar tidur, 3 kamar mandi, ruang keluarga',
                'harga_per_malam' => 250000,
                'maksimum_tamu' => 8,
                'id_status_properti' => 1,
                'id_pemilik' => 2,
                'foto' => 'properti/tanjung_papuma2.jpg'
            ]
        ];

        foreach ($propertiData as $data) {
            $data['id_verifikasi_properti'] = '1'; // Default as verified
            $data['id_status_properti'] = (string)$data['id_status_properti']; // Convert to string to match model
            Properti::create($data);
        }
    }
}
