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

        Scholarship::create([
            'name' => 'Beasiswa LPDP',
            'organization' => 'Kementerian Keuangan',
            'logo' => '/images/lpdp-scholarship.jpg',
            'open_registration' => '2024-08-01',
            'deadline' => '2024-09-30',
            'description' => 'Beasiswa untuk studi S2/S3 dalam dan luar negeri.',
        ]);

        Scholarship::create([
            'name' => 'Beasiswa BCA Finance',
            'organization' => 'BCA',
            'logo' => '/images/bca-scholarship.jpg',
            'open_registration' => '2024-05-15',
            'deadline' => '2024-06-30',
            'description' => 'Beasiswa untuk mahasiswa bidang teknologi dan keuangan.',
        ]);

        Scholarship::create([
            'name' => 'Telkom Digital Talent',
            'organization' => 'Telkom Indonesia',
            'logo' => '/images/telkom-scholarship.jpg',
            'open_registration' => '2024-07-15',
            'deadline' => '2024-08-15',
            'description' => 'Beasiswa untuk mahasiswa IT dan Digital Technology.',
        ]);

        Scholarship::create([
            'name' => 'Indonesia Maju Scholarship',
            'organization' => 'Pertamina Foundation',
            'logo' => '/images/pertamina-scholarship.jpg',
            'open_registration' => '2024-06-01',
            'deadline' => '2024-07-31',
            'description' => 'Beasiswa untuk mahasiswa teknik dan energi terbarukan.',
        ]);
        Scholarship::create([
        'name' => 'Beasiswa Smartfren Digital Talent',
        'organization' => 'Smartfren Foundation',
        'logo' => '/images/smartfren-scholarship.jpg', 
        'open_registration' => '2025-05-20',
        'deadline' => '2025-07-10',
        'description' => 'Beasiswa untuk mahasiswa IT dan startup digital.',
    ]);

        

    }
}