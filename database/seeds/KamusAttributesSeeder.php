<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class KamusAttributesSeeder extends Seeder {

    public function run()
    {
        DB::table('kamus_attributes')->delete();
        
        // Klien Attributes
        rifka\Kamus_attribute::create([
        	'table'         => 'Klien',
        	'name' 			=> 'klien_id',
        	'primary_key' 	=> True,
        	'foreign_key'	=> '',
        	'type'			=> 'increments',
        	'description'	=> 'The unique identifier of the client.',
        	'example'		=> '4672'
        	]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'nama_klien',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the client.',
            'example'       => '"Maria Mawar"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'kelamin',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The gender of the client.',
            'example'       => '"Perempuan"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'tempat_lahir',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The birthplace of the client.',
            'example'       => '"Magelang"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'tanggal_lahir',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of birth of the client in DD-MM-YYYY format',
            'example'       => '"31-01-1972"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'no_telp',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The contact phone number of the client.',
            'example'       => '"0821 12334 4321"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'alamat_ktp',
            'primary_key'   => False,
            'foreign_key'   => 'alamat_id',
            'type'          => 'integer',
            'description'   => 'A reference to the official (KTP) address of the client (stored in the "Alamat" table)',
            'example'       => '4765'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'alamat_domisili',
            'primary_key'   => False,
            'foreign_key'   => 'alamat_id',
            'type'          => 'integer',
            'description'   => 'A reference to the domicile address of the client (stored in the "Alamat" table) - if different to the official KTP address.',
            'example'       => '4765'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'email',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The email address of the client.',
            'example'       => '"email@address.com"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'pendidikan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The highest level of education of the client.',
            'example'       => '"SMA"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'tamat',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Whether or not the client has graduated from their highest level of education.',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'agama',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The religion of the client.',
            'example'       => '"Islam"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'pekerjaan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The work of the client.',
            'example'       => '"Pegawai Swasta"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jabatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The client\'s position at work',
            'example'       => '"Manajer"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'penghasilan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The income range of the client:<ul><li>< Rp 500.000,-/Bulan</li><li>Rp 500.000,-s/d Rp 1.000.000,-/Bulan</li><li>> Rp 1.000.000,-/Bulan</li></ul>
',
            'example'       => '"<RP 500.000,-/Bulan"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'status_perkawinan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The marital status of the client:<ul><li>Menikah Sirri</li><li>Menikah Resmi</li><li>Tidak Menikah</li><li>Cerai</li><li>Dipoligami</li></ul>',
            'example'       => '"Menikah Resmi"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jumlah_tanggungan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'integer',
            'description'   => 'The number of dependents the client has.',
            'example'       => '2'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'jumlah_anak',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'integer',
            'description'   => 'The number of children the client has.',
            'example'       => '2'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'kondisi_klien',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The condition of the client (difabel atau tidak).',
            'example'       => '"Difabel"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'dirujuk_oleh',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The person, place or organisation that referred the client to Rifka Annisa.',
            'example'       => '"Teman"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the client record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the client record was last updated.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien',
            'name'          => 'deleted_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the client record was deleted.',
            'example'       => 'TODO'
            ]);

        // Konselor Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor',
            'name'          => 'konselor_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the counsellor.',
            'example'       => '025'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor',
            'name'          => 'nama_konselor',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the counsellor.',
            'example'       => 'Maria Mawar'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor',
            'name'          => 'user_id',
            'primary_key'   => False,
            'foreign_key'   => 'user_id',
            'type'          => 'integer',
            'description'   => 'A reference to the user id.',
            'example'       => '132'
            ]);

        // Konselor_Kasus Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor_Kasus',
            'name'          => 'konselor_kasus_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the counsellor\'s case.',
            'example'       => '035'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor_Kasus',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Konselor_Kasus',
            'name'          => 'konselor_id',
            'primary_key'   => False,
            'foreign_key'   => 'konselor_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the counsellor.',
            'example'       => '025'
            ]);

        // Anak_Klien Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'anak_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the child.',
            'example'       => '4526'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'ibu_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'integer',
            'description'   => 'A reference to the mother of the child.',
            'example'       => '4226'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'nama_anak',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the child.',
            'example'       => 'Muhammad'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'tanggal_lahir',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The birth date of the child in DD-MM-YYYY format.',
            'example'       => '12-03-2011'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'pendidikan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The highest level of education of the child.',
            'example'       => 'SD'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'pekerjaan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The work of the child.',
            'example'       => 'Buruh'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Anak_Klien',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Additional information about the child.',
            'example'       => 'TODO'
            ]);

        // Alamat Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'alamat_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the address.',
            'example'       => '5234'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'alamat',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The street address.',
            'example'       => 'Jl. Jambu no.123'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'kecamatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The kecamatan of the address.',
            'example'       => 'Tegalrejo'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat',
            'name'          => 'kabupaten',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The kabupaten of the address.',
            'example'       => 'Sleman'
            ]);

        // Alamat_Klien Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat_Klien',
            'name'          => 'alamat_klien_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the client\'s address.',
            'example'       => '772'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat_Klien',
            'name'          => 'klien_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'integer',
            'description'   => 'A reference to the client.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat_Klien',
            'name'          => 'alamat_id',
            'primary_key'   => False,
            'foreign_key'   => 'alamat_id',
            'type'          => 'integer',
            'description'   => 'A reference to the Address.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat_Klien',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Alamat_Klien',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was updated.',
            'example'       => 'TODO'
            ]);

        // Kasus Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'kasus_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the case.',
            'example'       => '3524'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'jenis_kasus',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of case:<ul><li>KTI</li><li>KDP</li><li>Perkosaan</li><li>Pel-Seks</li><li>KDK</li></ul>',
            'example'       => 'KTI'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'hubungan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The relationship between the victim(s) and the purpetrator(s)',
            'example'       => 'Tetangga'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'lama_hubungan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'integer',
            'description'   => 'The length of time (number) that the victim has been married to, in a relationship with, or has known the perpetrator.',
            'example'       => '48'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'jenis_lama_hub',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Whether the length of time is in days, months or years.',
            'example'       => 'Bulan'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'sejak_kapan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The (approximate) date that the violence started in DD-MM-YYYY format.',
            'example'       => '13-12-2013'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'seberapa_sering',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'integer',
            'description'   => 'The number of times the violence has occurred.  This is measured in the number of times and will often be an approximation.<br>This may be difficult to measure in regards to ‘psychological violence’. 
',
            'example'       => '4'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'harapan_korban',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The hopes/ intentions of the victim:<ul><li>Kembali memberikan kesempatan kepada passangan</li><li>Perpisah</li><li>Lain-lain</li></ul>',
            'example'       => 'Perpisah'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'rencana_korban',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The next activity of the victim:<ul><li>Melapor ke polisian</li><li>Mengurus perceraian</li><li>Mengajak pasangan mengikuti mens program</li><li>Mengajak pasangan mengikuti program mediasi</li><li>Lain-lain</li></ul>',
            'example'       => 'Mengurus perceraian'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'narasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'longText',
            'description'   => 'A narration of the case as told by the client.',
            'example'       => '[tulisan narasi]'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was updated.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'deleted_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the case record was deleted.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus',
            'name'          => 'legacy_konselor',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => '[DEPRECIATED] The name of the counsellor (from the legacy database).',
            'example'       => 'John and Paul'
            ]);

        // Klien_Kasus Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'klien_kasus_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the client involved in the case.',
            'example'       => '035'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'klien_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the client.',
            'example'       => '025'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'jenis_klien',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of client: korban or pelaku.',
            'example'       => '"Korban"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the client-case record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the client-case record was last updated.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Klien_Kasus',
            'name'          => 'deleted_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the client-case was deleted.',
            'example'       => 'TODO'
            ]);

        // Bentuk_Kekerasan Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'bentuk_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the shape of violence.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'emosional',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Did emotional violence occur?',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'fisik',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Did physical violence occur?',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'ekonomi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Did economic violence occur?',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'seksual',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Did sexual violence occur?',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'sosial',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Did emotional violence occur?',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Bentuk_Kekerasan',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The details of the violence that occurred (related to the type of the violence)',
            'example'       => 'Dipukul (tangan kosong)'
            ]);

        // Faktor_Pemicu Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'pemicu_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the trigger factor.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'jenis_pemicu',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of trigger factor:<ul><li>Masalah ekonomi</li><li>Masalah agama</li><li>Masalah pendidikan</li><li>Masalah lain</li></ul>',
            'example'       => 'Masalah ekonomi'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Faktor_Pemicu',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'A description or further explanation of the trigger factor.',
            'example'       => 'TODO'
            ]);

        // Upaya_Dilakukan Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'upaya_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the effort tried.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'jenis_upaya',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of effort tried:<ul><li>Mendiskusikan dengan pesangan/pelaku</li><li>Musyawarah yang melibatkan keluarga besar</li><li>Melaporkan pada pihak kepolisian</li><li>Melibatkan pemuka agama</li><li>Lain-lain</li></ul>',
            'example'       => 'Musyawarah yang melibatkan keluarga besar'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'hasil',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The result of the effort tried.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Upaya_Dilakukan',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was updated.',
            'example'       => 'TODO'
            ]);

        // Layanan_Dibutuhkan Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'layanan_dbth_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the service required.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'jenis_layanan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of service required:<ul><li>Konseling Psikologi</li><li>Konseling Hukum</li><li>Litigasi</li><li>Home visit</li><li>Mens program</li><li>Medis</li><li>Support group</li><li>Shelter</li><li>Mediasi</li></ul>',
            'example'       => 'Konseling Psikologi'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'status',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The status of the required service.<br />Given; Not Given; or Cancelled',
            'example'       => '"Given"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Layanan_Dibutuhkan',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'Date the record was last updated.',
            'example'       => 'TODO'
            ]);

        // Dampak Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'dampak_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the impact experienced.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'jenis_dampak',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of impact experienced:<ul><li>Kekerasan Fisik</li><li>Kesehatan Jiwa</li><li>Perilaku tidak sehat</li><li>Kesehatan reproduksi</li><li>Kondisi klinis</li><li>Ekonomi</li><li>Anak/Keluarga</li><li>Lain-Lain</li></ul>',
            'example'       => 'Kekerasan Fisik'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Dampak',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'A description or further explanation of the impact experienced.',
            'example'       => 'TODO'
            ]);

        // Perkembangan Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'perkembangan_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the case development.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the case development in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'intervensi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'text',
            'description'   => 'The intervention or activity carried out.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'kesimpulan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'text',
            'description'   => 'The result of the case development.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Perkembangan',
            'name'          => 'kesepakatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'text',
            'description'   => 'The deal reached with the client.',
            'example'       => 'TODO'
            ]);

        // Litigasi Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'litigasi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the litigation.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'jenis_litigasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of litigation:<ul><li>Pidana langsung</li><li>Pidana tidak langsung</li><li>Perdata</li></ul>',
            'example'       => 'Pidana langsung'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'udang_digunakan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The laws used.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'kepolisian_wilayah',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The police area.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'nama_penyidik',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the investigator.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'pengadilan_wilayah',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The district court.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'nama_hakim',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the judge.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'nama_jaksa',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the prosecutor.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'tuntutan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The demand or the charge.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Litigasi',
            'name'          => 'putusan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The verdict given.',
            'example'       => 'TODO'
            ]);

        // Kegiatan_Litigasi Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'kegiatan_litigasi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the legal action.',
            'example'       => '045'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'litigasi_id',
            'primary_key'   => False,
            'foreign_key'   => 'litigasi_id',
            'type'          => 'integer',
            'description'   => 'A reference to the related litigation.',
            'example'       => '3245'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the legal action in DD-MM-YYYY format.',
            'example'       => '13-10-2014'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'kegiatan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The action taken.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kegiatan_Litigasi',
            'name'          => 'informasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Additional information about the legal action.',
            'example'       => 'TODO'
            ]);

        // Layanan yang diberikan:

        //Kons_Psikologi Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'kons_psikologi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of psychological counselling session.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the counselling session in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Psikologi',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Kons_Hukum Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Hukum',
            'name'          => 'kons_hukum_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of legal counselling session.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Hukum',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Hukum',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the counselling session in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kons_Hukum',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Homevisit Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Homevisit',
            'name'          => 'homevisit_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the home visit.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Homevisit',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Homevisit',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the home visit in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Homevisit',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Support_Group Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Support_Group',
            'name'          => 'support_group_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the support group attendance.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Support_Group',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Support_Group',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date the support group was attended DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Support_Group',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Mens_Program Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Mens_Program',
            'name'          => 'mens_program_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the mens program attendance.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mens_Program',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mens_Program',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date the mens program was attended DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mens_Program',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Medis Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Medis',
            'name'          => 'medis_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the medical service.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Medis',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Medis',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the medical service DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Medis',
            'name'          => 'jenis_medis',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of medical service given.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Medis',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Mediasi Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Mediasi',
            'name'          => 'mediasi_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the mediation.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mediasi',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mediasi',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the mediation DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mediasi',
            'name'          => 'hasil',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The result of the mediation.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Mediasi',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        // Shelter Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Shelter',
            'name'          => 'shelter_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the shelter stay.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Shelter',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Shelter',
            'name'          => 'mulai_tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The start date of the shelter stay DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Shelter',
            'name'          => 'sampai_tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The end date of the shelter stay DD-MM-YYYY format.',
            'example'       => '15-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Shelter',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);

        //Rujukan Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Rujukan',
            'name'          => 'rujukan_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'A unique identifier of the referal.',
            'example'       => '6745'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Rujukan',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case.',
            'example'       => '4265'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Rujukan',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date of the referal in DD-MM-YYYY format.',
            'example'       => '12-04-2015'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Rujukan',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'Any additional information.',
            'example'       => 'TODO'
            ]);



        // Latar_Keluarga Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Latar_Keluarga',
            'name'          => 'latar_keluarga_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the family background description.',
            'example'       => '772'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Latar_Keluarga',
            'name'          => 'klien_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the client.',
            'example'       => '4672'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Latar_Keluarga',
            'name'          => 'kkrsn_masa_lalu',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Has the client experienced violence in the past?',
            'example'       => 'True'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Latar_Keluarga',
            'name'          => 'menyaksikan_kkrsn_rt',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Has the client witnessed violence in the family home?',
            'example'       => 'False'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Latar_Keluarga',
            'name'          => 'lingkungan_toleran_kkrsn',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'boolean',
            'description'   => 'Is the client\'s community tolerant of violence?',
            'example'       => 'True'
            ]);

        // Problem Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Problem',
            'name'          => 'kasus_pentutup_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the closed case.',
            'example'       => '772'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Problem',
            'name'          => 'jenis_problem',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The type of problem.',
            'example'       => '"Alkoholik"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Problem',
            'name'          => 'keterangan',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'More information about the problem.',
            'example'       => 'TODO'
            ]);

        // Problem_Pelaku Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Problem_Pelaku',
            'name'          => 'problem_palaku_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the perpetrator\'s problem.',
            'example'       => '772'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Problem_Pelaku',
            'name'          => 'palaku_id',
            'primary_key'   => False,
            'foreign_key'   => 'klien_id',
            'type'          => 'integer',
            'description'   => 'A reference to the perpetrator.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Problem_Pelaku',
            'name'          => 'problem_id',
            'primary_key'   => False,
            'foreign_key'   => 'problem_id',
            'type'          => 'integer',
            'description'   => 'A reference to the problem.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Problem_Pelaku',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was created.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Problem_Pelaku',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time record was updated.',
            'example'       => 'TODO'
            ]);

        // Kasus_Pentutup Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus_Pentutup',
            'name'          => 'kasus_pentutup_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the closed case.',
            'example'       => '772'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus_Pentutup',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'A reference to the case being closed.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus_Pentutup',
            'name'          => 'evaluasi_kons_id',
            'primary_key'   => False,
            'foreign_key'   => 'konselor_id',
            'type'          => 'integer',
            'description'   => 'A reference to the counsellor who evaluated the case.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus_Pentutup',
            'name'          => 'evaluasi_akhir_id',
            'primary_key'   => False,
            'foreign_key'   => 'konselor_id',
            'type'          => 'integer',
            'description'   => 'A reference to the counsellor who finalized the case closure.',
            'example'       => '3472'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Kasus_Pentutup',
            'name'          => 'tanggal',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'date',
            'description'   => 'The date the case was closed in DD-MM-YYYY format.',
            'example'       => '22-08-2014'
            ]);

        // Arsip Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Arsip',
            'name'          => 'arsip_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the physical case\'s record.',
            'example'       => '035'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Arsip',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Arsip',
            'name'          => 'no_reg',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'integer',
            'description'   => 'The registration number of the physical document.',
            'example'       => '4252'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Arsip',
            'name'          => 'lokasi',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The location of the physical document.',
            'example'       => '"Ruang PD"'
            ]);

        // Activity Attributes
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'activity_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the activity.',
            'example'       => '035'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'user_id',
            'primary_key'   => False,
            'foreign_key'   => 'user_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the user.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'klien_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the client.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'action',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The action performed by a user.',
            'example'       => '"New Client File Created"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time the action was performed.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Activity',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time this record was updated.',
            'example'       => 'TODO'
            ]);

        // Attribute_Change
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'attribute_change_id',
            'primary_key'   => True,
            'foreign_key'   => '',
            'type'          => 'increments',
            'description'   => 'The unique identifier of the attribute change.',
            'example'       => '035'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'user_id',
            'primary_key'   => False,
            'foreign_key'   => 'user_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the user.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'kasus_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the case.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'klien_id',
            'primary_key'   => False,
            'foreign_key'   => 'kasus_id',
            'type'          => 'integer',
            'description'   => 'The unique identifier of the client.',
            'example'       => '4256'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'attribute_name',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The name of the attribute changed.',
            'example'       => '"nama_klien"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'old_attribute_value',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The old attribute value.',
            'example'       => '"SD"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'new_attribute_value',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'string',
            'description'   => 'The new attribute value.',
            'example'       => '"SMP"'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'created_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time the attribute was changed.',
            'example'       => 'TODO'
            ]);
        rifka\Kamus_attribute::create([
            'table'         => 'Attribute_Change',
            'name'          => 'updated_at',
            'primary_key'   => False,
            'foreign_key'   => '',
            'type'          => 'timestamp',
            'description'   => 'date and time this record was changed.',
            'example'       => 'TODO'
            ]);

    }

}