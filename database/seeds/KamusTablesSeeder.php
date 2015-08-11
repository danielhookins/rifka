<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class KamusTablesSeeder extends Seeder {

    public function run()
    {
        DB::table('kamus_tables')->delete();
        
        // Untuk Klien
        rifka\Kamus_table::create([
        	'name' 			=> 'Klien',
        	'type' 			=> 'Klien',
        	'description' 	=> 'Personal information about a client.'
        	]);
        rifka\Kamus_table::create([
        	'name' 			=> 'Anak_Klien',
        	'type' 			=> 'Klien',
        	'description' 	=> 'A child of a client.'
        	]);
        rifka\Kamus_table::create([
        	'name' 			=> 'Alamat',
        	'type' 			=> 'Klien',
        	'description' 	=> 'An address of a client.'
        	]);
        rifka\Kamus_table::create([
            'name'          => 'Latar_Keluarga',
            'type'          => 'Klien',
            'description'   => 'The family background of a client.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Problem_Pelaku',
            'type'          => 'Klien',
            'description'   => 'A perpetrator\'s personal problem.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Problem',
            'type'          => 'Klien',
            'description'   => 'Problems of perpetrators.'
            ]);


        // Untuk Kasus
        rifka\Kamus_table::create([
            'name'          => 'Kasus',
            'type'          => 'Kasus',
            'description'   => 'A client case.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Konselor',
            'type'          => 'Kasus',
            'description'   => 'A counsellor at Rifka Annisa.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Klien_Kasus',
            'type'          => 'Kasus',
            'description'   => 'A client involved in a particular case at Rifka Annisa.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Konselor_Kasus',
            'type'          => 'Kasus',
            'description'   => 'A counsellor\'s case at Rifka Annisa.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Perkembangan',
            'type'          => 'Kasus',
            'description'   => 'A development in a case.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Kasus_Pentutup',
            'type'          => 'Kasus',
            'description'   => 'A closed case.'
            ]);
        
        // Untuk Keterangan Kasus
        rifka\Kamus_table::create([
            'name'          => 'Bentuk_Kekerasan',
            'type'          => 'Keterangan',
            'description'   => 'A type (shape) of violence.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Faktor_Pemicu',
            'type'          => 'Keterangan',
            'description'   => 'A trigger factor.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Upaya_Dilakukan',
            'type'          => 'Keterangan',
            'description'   => 'An effort tried.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Layanan_Dibutuhkan',
            'type'          => 'Keterangan',
            'description'   => 'A service required.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Dampak',
            'type'          => 'Keterangan',
            'description'   => 'An impact experienced.'
            ]);

        // Untuk Litigasi
        rifka\Kamus_table::create([
            'name'          => 'Litigasi',
            'type'          => 'Litigasi',
            'description'   => 'A litigation process.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Kegiatan_Litigasi',
            'type'          => 'Litigasi',
            'description'   => 'A legal action.'
            ]);

        // Untuk Layanan yang diberikan
        rifka\Kamus_table::create([
            'name'          => 'Kons_Psikologi',
            'type'          => 'Layanan',
            'description'   => 'Psychological counselling'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Kons_Hukum',
            'type'          => 'Layanan',
            'description'   => 'Legal counselling'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Homevisit',
            'type'          => 'Layanan',
            'description'   => 'A home visit to the client.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Medis',
            'type'          => 'Layanan',
            'description'   => 'Medical services'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Shelter',
            'type'          => 'Layanan',
            'description'   => 'A stay at a shelter'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Support_Group',
            'type'          => 'Layanan',
            'description'   => 'Attendance of a support group for victims.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Mediasi',
            'type'          => 'Layanan',
            'description'   => 'A mediation service.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Mens_Program',
            'type'          => 'Layanan',
            'description'   => 'Attendance of a mens program.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Rujukan',
            'type'          => 'Layanan',
            'description'   => 'A referal.'
            ]);

        // Untuk Arsip
        rifka\Kamus_table::create([
            'name'          => 'Arsip',
            'type'          => 'Arsip',
            'description'   => 'A physical record of the case.'
            ]);

        // Untuk Logging and Record Keeping
        rifka\Kamus_table::create([
            'name'          => 'Activity',
            'type'          => 'Log',
            'description'   => 'A history of activities performed by users of the database.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Attribute_Change',
            'type'          => 'Log',
            'description'   => 'A history of client and case attributes changed by users of the database.'
            ]);

    }

}