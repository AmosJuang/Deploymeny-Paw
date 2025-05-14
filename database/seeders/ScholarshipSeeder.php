<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scholarship;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        Scholarship::create([
            'name' => 'Beasiswa Unggulan',
            'organization' => 'Kementerian Pendidikan',
            'logo' => '/images/beasiswa-unggulan.png',
            'open_registration' => '2024-07-01',
            'deadline' => '2024-07-14',
            'description' => 'Beasiswa untuk siswa berprestasi.',
        ]);

        Scholarship::create([
            'name' => 'Beasiswa Djarum',
            'organization' => 'Djarum Foundation',
            'logo' => '/images/beasiswa-djarum.png',
            'open_registration' => '2024-03-27',
            'deadline' => '2024-05-30',
            'description' => 'Beasiswa untuk mahasiswa aktif.',
        ]);

        Scholarship::create([
            'name' => 'Paragon Scholarship',
            'organization' => 'Paragon Corp',
            'logo' => '/images/paragon-scholarship.png',
            'open_registration' => '2024-06-01',
            'deadline' => '2024-06-15',
            'description' => 'Beasiswa untuk mahasiswa dengan inovasi terbaik.',
        ]);

        Scholarship::create([
            'name' => 'Beasiswa Bank Indonesia',
            'organization' => 'Bank Indonesia',
            'logo' => '/images/bank-indonesia.png',
            'open_registration' => '2024-04-01',
            'deadline' => '2024-04-30',
            'description' => 'Beasiswa untuk mahasiswa ekonomi dan keuangan.',
        ]);
    }
}