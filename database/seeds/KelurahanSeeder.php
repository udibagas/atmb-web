<?php

use Illuminate\Database\Seeder;
use App\Kelurahan;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            // babakan cikao
            [
                'Babakan Cikao', 'Cicadas' , 'Cilangkap', 'Ciwareng' , 'Hegarmanah',
                'Kadumekar' , 'Maracang' , 'Mulyamekar'
            ],
            // bojong
            [
                'Bojong Barat', 'Bojong Timur', 'Cibingbin', 'Cihanjawar', 'Cikeris',
                'Cileunca', 'Cipeundeuy', 'Kertasari', 'Pangkalan', 'Pasanggrahan',
                'Pawenang', 'Sindangpanon', 'Sindangsari', 'Sukamanah'
            ],
            // Bungursari
            [
                'Bungursari', 'Cibening', 'Cibodas', 'Cibungur', 'Cikopo', 'Cinangka',
                'Ciwangi', 'Dangdeur', 'Karangmukti', 'Wanakerta'
            ],
            // Campaka
            [
                'Benteng', 'Campaka', 'Campakasari', 'Cijaya', 'Cijunti', 'Cikumpay',
                'Cimahi', 'Cirende', 'Cisaat', 'Kertamukti'
            ],
            // Cibatu
            [
                'Cibatu', 'Cibukamanah', 'Cikadu', 'Cilandak', 'Cipancur',
                'Ciparungsari', 'Cipinang', 'Cirangkong', 'Karyamekar', 'Wanawali'
            ],
            // Darangdan
            [
                'Cilingga', 'Darangdan', 'Depok', 'Gununghejo', 'Legoksari', 'Linggamukti',
                'Linggasari', 'Mekarsar', 'Nagrak', 'Nangewer', 'Neglasari',
                'Pasirangin', 'Sadarkarya', 'Sawit', 'Sirnamanah'
            ],
            // Jatiluhur
            [
                'Cibinong', 'Cikaobandung', 'Cilegong', 'Cisalada', 'Jatiluhur',
                'Jatimekar', 'Kembangkuning', 'Mekargalih', 'Parakanlima', 'Bunder'
            ],
            // Kiarapedes
            [
                'Cibeber', 'Ciracas', 'Gardu', 'Kiarapedes', 'Margaluyu',
                'Mekarjaya', 'Parakan Garokgek', 'Pusakamulya', 'Sumbersari', 'Taringgul Landeuh'
            ],
            // Maniis
            [
                'Cijati', 'Ciramahilir', 'Citamiang', 'Gunungkarung',
                'Pasirjambu', 'Sinargalih', 'Sukamukti', 'Tegaldatar'
            ],
            // Pasawahan
            [
                'Margasari', 'Cidahu', 'Ciherang', 'Cihuni', 'Kertajaya', 'Lebak Anyar',
                'Pasawahan', 'Pasawahan Kidul', 'Pasawahananyar', 'Sawah Kulon', 'Selaawi', 'Warung Kadu'
            ],
            // Plered
            [
                'Anjun', 'Babakansari', 'Cibogogirang', 'Cibogohilir', 'Citeko', 'Citeko Kaler',
                'Gandamekar', 'Gandasoli', 'Linggarsari', 'Liunggunung', 'Palinggihan',
                'Pamoyanan', 'Plered', 'Rawasari', 'Sempur', 'Sindangsari',
            ],
            // Pondoksalam
            [
                'Bungurjaya', 'Galudra', 'Gurudug', 'Parakansalam', 'Pondokbungur', 'Salamjaya',
                'Salammulya', 'Salem', 'Situ', 'Sukajadi', 'Tanjung Sari'
            ],
            // Purwakarta
            [
                'Citalang', 'Nagrikidul', 'Sindangkasih', 'Cipaisan', 'Nagritengah',
                'Nagrikaler', 'Tegalmunjul', 'Munjuljaya', 'Ciseureuh', 'Purwamekar'
            ],
            // Sukasari
            [
                'Ciririp', 'Kertamanah', 'Kutamanah', 'Parungbanteng', 'Sukasari',
            ],
            // Sukatani
            [
                'Cianting', 'Cianting Utara', 'Cibodas', 'Cijantung', 'Cilalawi',
                'Cipicung', 'Malangnengah', 'Panyindangan', 'Pasirmunjul', 'Sindanglaya',
                'Sukajaya', 'Sukamaju', 'Sukatani', 'Tajursindang'
            ],
            // Tegal Waru
            [
                'Sukahaji', 'Batutumpang', 'Cadasmekar', 'Cadassari',
                'Cisarua', 'Citalang', 'Galumpit', 'Karoya',
                'Pasanggrahan', 'Sukamulya', 'Tegalsari', 'Tegalwaru', 'Warungjeruk'
            ],
            // Wanayasa
            [
                'Babakan', 'Ciawi', 'Cibuntu', 'Legokhuni', 'Nagrog', 'Nangerang',
                'Raharja', 'Sakambang', 'Simpang', 'Sukadami', 'Sumurugul',
                'Taringgul Tengah', 'Taringgul Tonggoh', 'Wanasari', 'Wanayasa'
            ]
        ];

        $i = 1;

        foreach ($lists as $kelurahan)
        {
            foreach ($kelurahan as $k) {
                Kelurahan::create([
                    'nama' => $k, 'kode' => $k, 'kecamatan_id' => $i
                ]);
            }

            $i++;
        }
    }
}
