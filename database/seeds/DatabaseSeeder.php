<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('Kamus_TablesSeeder');
		$this->call('Kamus_AttributesSeeder');
	}

}

class Kamus_TablesSeeder extends Seeder {

    public function run()
    {
        DB::table('kamus_tables')->delete();
        
        // Untuk Orang
        rifka\Kamus_table::create([
        	'name' 			=> 'Klien',
        	'type' 			=> 'Orang',
        	'description' 	=> 'Personal information about a client.'
        	]);
        rifka\Kamus_table::create([
        	'name' 			=> 'Konselor',
        	'type' 			=> 'Orang',
        	'description' 	=> 'A counsellor at Rifka Annisa.'
        	]);
        rifka\Kamus_table::create([
            'name'          => 'Konselor_Kasus',
            'type'          => 'Orang',
            'description'   => 'A counsellor\'s case at Rifka Annisa.'
            ]);
        rifka\Kamus_table::create([
        	'name' 			=> 'Anak_Klien',
        	'type' 			=> 'Orang',
        	'description' 	=> 'A child of a client.'
        	]);
        rifka\Kamus_table::create([
        	'name' 			=> 'Alamat',
        	'type' 			=> 'Orang',
        	'description' 	=> 'An address of a client.'
        	]);

        // Untuk Kasus
        rifka\Kamus_table::create([
            'name'          => 'Kasus',
            'type'          => 'Kasus',
            'description'   => 'A client case.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Bentuk_Kekerasan',
            'type'          => 'Kasus',
            'description'   => 'A type (shape) of violence.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Faktor_Pemicu',
            'type'          => 'Kasus',
            'description'   => 'A trigger factor.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Upaya_Dilakukan',
            'type'          => 'Kasus',
            'description'   => 'An effort tried.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Layanan_Dibutuhkan',
            'type'          => 'Kasus',
            'description'   => 'A service required.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Dampak',
            'type'          => 'Kasus',
            'description'   => 'An impact experienced.'
            ]);
        rifka\Kamus_table::create([
            'name'          => 'Perkembangan',
            'type'          => 'Kasus',
            'description'   => 'A development in a case.'
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

    }

}

class Kamus_AttributesSeeder extends Seeder {

    public function run()
    {
        DB::table('kamus_attributes')->delete();
        
        // Klien
        rifka\Kamus_attribute::create([
        	'table'         => 'Klien',
        	'name' 			=> 'klien_id',
        	'primary_key' 	=> True,
        	'foreign_key'	=> '',
        	'type'			=> 'Integer',
        	'description'	=> 'The unique identifier of the client.',
        	'example'		=> '4672'
        	]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jenis_klien',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of client: korban or pelaku.',
            'example'       => '"Korban"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'nama_klien',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The name of the client.',
            'example'       => '"Maria Mawar"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'tempat_lahir',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The birthplace of the client.',
            'example'       => '"Magelang"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'tanggal_lahir',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Date',
            'description'   => 'The date of birth of the client in DD-MM-YYYY format',
            'example'       => '"31-01-1972"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'latar_belakang_keluarga',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'Notes about the family background of the client.',
            'example'       => '"TODO"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'no_telp',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The contact phone number of the client.',
            'example'       => '"0821 12334 4321"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'alamat_ktp',
            'primary_key'   => False,
            'foreign_key'   => 'alamat_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the official (KTP) address of the client (stored in the "Alamat" table)',
            'example'       => '4765'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'alamat_domisili',
            'primary_key'   => False,
            'foreign_key'   => 'alamat_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the domicile address of the client (stored in the "Alamat" table) - if different to the official KTP address.',
            'example'       => '4765'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'pendidikan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The highest level of education of the client.',
            'example'       => '"SMA"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'tamat',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Boolean',
            'description'   => 'Whether or not the client has graduated from their highest level of education.',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'agama',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The religion of the client.',
            'example'       => '"Islam"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'pekerjaan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The work of the client.',
            'example'       => '"Pegawai Swasta"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jabatan_dlm_pekerjaan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The client\'s position at work',
            'example'       => '"Manajer"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'penghasilan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The income range of the client:<ul><li>< Rp 500.000,-/Bulan</li><li>Rp 500.000,-s/d Rp 1.000.000,-/Bulan</li><li>> Rp 1.000.000,-/Bulan</li></ul>
',
            'example'       => '"<RP 500.000,-/Bulan"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'status_perkawinan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The marital status of the client:<ul><li>Menikah Sirri</li><li>Menikah Resmi</li><li>Tidak Menikah</li><li>Cerai</li><li>Dipoligami</li></ul>',
            'example'       => '"Menikah Resmi"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jumlah_tanggungan_dlm_keluarga',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The number of dependents the client has.',
            'example'       => '2'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jumlah_anak',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The number of children the client has.',
            'example'       => '2'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'kondisi_klien',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The condition of the client (difabel atau tidak).',
            'example'       => '"Difabel"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'dirujuk_oleh',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The person, place or organisation that referred the client to Rifka Annisa.',
            'example'       => '"Teman"'
            ]);

        // Konselor
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor',
            'name'          => 'konselor_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the counsellor.',
            'example'       => '025'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor',
            'name'          => 'nama_konselor',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The name of the counsellor.',
            'example'       => 'Maria Mawar'
            ]);

        // Konselor_Kasus
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor_Kasus',
            'name'          => 'konselor_kasus_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the counsellor\'s case.',
            'example'       => '035'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor_Kasus',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor_Kasus',
            'name'          => 'konselor_id',
            'primary_key'   => False,
            'foreign_key'   => 'konselor_id',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the counsellor.',
            'example'       => '025'
            ]);

        // Anak_Klien
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'anak_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the child.',
            'example'       => '4526'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'ibu_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the mother of the child.',
            'example'       => '4226'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'nama_anak',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The name of the child.',
            'example'       => 'Muhammad'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'tanggal_lahir',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Date',
            'description'   => 'The birth date of the child in DD-MM-YYYY format.',
            'example'       => '12-03-2011'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'pendidikan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The highest level of education of the child.',
            'example'       => 'SD'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'pekerjaan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The work of the child.',
            'example'       => 'Buruh'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'Additional information about the child.',
            'example'       => 'TODO'
            ]);

        // Alamat
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'alamat_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the address.',
            'example'       => '5234'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'alamat',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The street address.',
            'example'       => 'Jl. Jambu no.123'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'kecamatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The kecamatan of the address.',
            'example'       => 'Tegalrejo'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'kabupaten',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The kabupaten of the address.',
            'example'       => 'Sleman'
            ]);

        // Kasus
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'kasus_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '3524'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'korban_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the victim of the case.',
            'example'       => '4524'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'pelaku_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the perpetrator of the case.',
            'example'       => '2524'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'jenis_kasus',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of case:<ul><li>KTI</li><li>KDP</li><li>Perkosaan</li><li>Pel-Seks</li><li>KDK</li></ul>',
            'example'       => 'KTI'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'hubungan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The relationship between the victim and the purpetrator',
            'example'       => 'Tetangga'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'lama_hubungan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The length of time that the victim has been married to, in a relationship with, or has known the perpetrator.  This is measured in months.',
            'example'       => '48'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'sejak_kapan_terjadi_kekerasan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Date',
            'description'   => 'The (approximate) date that the violence started in DD-MM-YYYY format.',
            'example'       => '13-12-2013'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'seberapa_sering_dilakukan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'The number of times the violence has occurred.  This is measured in the number of times and will often be an approximation.<br>This may be difficult to measure in regards to ‘psychological violence’. 
',
            'example'       => '4'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'harapan_korban',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The hopes/ intentions of the victim:<ul><li>Kembali memberikan kesempatan kepada passangan</li><li>Perpisah</li><li>Lain-lain</li></ul>',
            'example'       => 'Perpisah'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'rencana_korban_selanjutnya',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The next activity of the victim:<ul><li>Melapor ke polisian</li><li>Mengurus perceraian</li><li>Mengajak pasangan mengikuti mens program</li><li>Mengajak pasangan mengikuti program mediasi</li><li>Lain-lain</li></ul>',
            'example'       => 'Mengurus perceraian'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'narasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'A narration of the case as told by the client.',
            'example'       => '[tulisan narasi]'
            ]);

        // Bentuk_Kekerasan
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'bentuk_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the shape of violence.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'jenis_bentuk',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of the violence that occurred:<ul><li>Kekerasan Fisik</li><li>Kekerasan Psikologis</li><li>Kekerasan Seksual</li><li>Kekerasan Sosial</li><li>Kekerasan Ekonomi</li><li>Lain-lain</li></ul>',
            'example'       => 'Kekerasan Fisik'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The details of the violence that occurred (related to the type of the violence)',
            'example'       => 'Dipukul (tangan kosong)'
            ]);

        // Faktor_Pemicu
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'pemicu_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the trigger factor.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'jenis_pemicu',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of trigger factor:<ul><li>Masalah ekonomi</li><li>Masalah agama</li><li>Masalah pendidikan</li><li>Masalah lain</li></ul>',
            'example'       => 'Masalah ekonomi'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'A description or further explanation of the trigger factor.',
            'example'       => 'TODO'
            ]);

        // Upaya_Dilakukan
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'upaya_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the effort tried.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'jenis_upaya',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of effort tried:<ul><li>Mendiskusikan dengan pesangan/pelaku</li><li>Musyawarah yang melibatkan keluarga besar</li><li>Melaporkan pada pihak kepolisian</li><li>Melibatkan pemuka agama</li><li>Lain-lain</li></ul>',
            'example'       => 'Musyawarah yang melibatkan keluarga besar'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'hasil',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The result of the effort tried.',
            'example'       => 'TODO'
            ]);

        // Layanan_Dibutuhkan
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'layanan_dbth_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the service required.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'jenis_layanan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of service required:<ul><li>Konseling Psikologi</li><li>Konseling Hukum</li><li>Litigasi</li><li>Home visit</li><li>Mens program</li><li>Medis</li><li>Support group</li><li>Shelter</li><li>Mediasi</li></ul>',
            'example'       => 'Konseling Psikologi'
            ]);

        // Dampak
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'dampak_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the impact experienced.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'jenis_dampak',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of impact experienced:<ul><li>Kekerasan Fisik</li><li>Kesehatan Jiwa</li><li>Perilaku tidak sehat</li><li>Kesehatan reproduksi</li><li>Kondisi klinis</li><li>Ekonomi</li><li>Anak/Keluarga</li><li>Lain-Lain</li></ul>',
            'example'       => 'Masalah ekonomi'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'A description or further explanation of the impact experienced.',
            'example'       => 'TODO'
            ]);

        // Perkembangan
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'perkembangan_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the case development.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Date',
            'description'   => 'The date of the case development in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'intervensi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The intervention or activity carried out.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'kesimpulan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The result of the case development.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'kesepakatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The deal reached with the client.',
            'example'       => 'TODO'
            ]);

        // Litigasi
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'litigasi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the litigation.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'jenis_litigasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The type of litigation:<ul><li>Pidana langsung</li><li>Pidana tidak langsung</li><li>Perdata</li></ul>',
            'example'       => 'Pidana langsung'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'udang_digunakan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The laws used.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'kepolisian_wilayah',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The police area.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'nama_penyidik',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The name of the investigator.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'pengadilan_wilayah',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The district court.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'nama_hakim',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The name of the judge.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'nama_jaksa',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The name of the prosecutor.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'tuntutan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The demand or the charge.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'putusan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The verdict given.',
            'example'       => 'TODO'
            ]);

        // Kegiatan_Litigasi
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'kegiatan_litigasi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of the legal action.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'litigasi_id',
            'primary_key'   => False,
            'foreign_key'   => 'litigasi_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the related litigation.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Date',
            'description'   => 'The date of the legal action in DD-MM-YYYY format.',
            'example'       => '13-10-2014'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'kegiatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'The action taken.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'informasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'Additional information about the legal action.',
            'example'       => 'TODO'
            ]);

        // Layanan yang diberikan:

        //Kons_Psikologi
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'kons_psikologi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'Integer',
            'description'   => 'A unique identifier of psychological counselling session.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'Integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Date',
            'description'   => 'The date of the counselling session in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'Varchar',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

    }

}
