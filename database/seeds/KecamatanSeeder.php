<?php

use Illuminate\Database\Seeder;
use App\Kecamatan;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            'Babakan Cikao', 'Bojong', 'Bungursari', 'Campaka', 'Cibatu',
            'Darangdan', 'Jatiluhur', 'Kiara Pedes', 'Maniis', 'Pasawahan',
            'Plered', 'Pondok Salam', 'Purwakarta', 'Sakasari' , 'Sukatani',
            'Tegalwaru', 'Wanayasa'
        ];

        foreach ($lists as $l) {
            Kecamatan::create([
                'nama' => $l, 'kode' => $l
            ]);
        }
    }
}
