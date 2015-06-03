
# TODO: Create python script to generate
# the Models and Controllers based on 
# information stored in the Kamus Data

php artisan make:model --no-migration Problem
php artisan make:controller ProblemController
php artisan make:model --no-migration LatarKeluarga
php artisan make:controller LatarKeluargaController
php artisan make:model --no-migration AnakKlien
php artisan make:controller AnakKlienController
php artisan make:model --no-migration Konselor
php artisan make:controller KonselorController

# KETERANGAN KASUS
php artisan make:model --no-migration BentukKekerasan
php artisan make:controller BentukKekerasanController
php artisan make:model --no-migration UpayaDilakukan
php artisan make:controller UpayaDilakukanController
php artisan make:model --no-migration Dampak
php artisan make:controller DampakController
php artisan make:model --no-migration FaktorPemicu
php artisan make:controller FaktorPemicuController
php artisan make:model --no-migration LayananDibutuhkan
php artisan make:controller LayananDibutuhkanController

# LITIGASI
php artisan make:model --no-migration Litigasi
php artisan make:controller LitigasiController
php artisan make:model --no-migration KegiatanLitigasi
php artisan make:controller KegiatanLitigasiController

# LAYANAN YANG DIBERIKAN
php artisan make:model --no-migration KonsPsikologi
php artisan make:controller KonsPsikologiController
php artisan make:model --no-migration KonsHukum
php artisan make:controller KonsHukumController
php artisan make:model --no-migration Homevisit
php artisan make:controller HomevisitController
php artisan make:model --no-migration Medis
php artisan make:controller MedisController
php artisan make:model --no-migration Shelter
php artisan make:controller ShelterController
php artisan make:model --no-migration SupportGroup
php artisan make:controller SupportGroupController
php artisan make:model --no-migration Mediasi
php artisan make:controller MediasiController
php artisan make:model --no-migration MensProgram
php artisan make:controller MensProgramController