<?php

namespace Database\Seeders;

use App\Models\ExecutorEducationCertificate;
use Illuminate\Database\Seeder;

class ExecutorEducationCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Executoreducationcertificate::create( [
            'id'=>1,
            'executor_profile_id'=>1,
            'certificate'=>'webex_certeficate',
            'created_at'=>'2021-12-29 09:57:43',
            'updated_at'=>'2021-12-29 09:57:43'
            ] );



            ExecutorEducationCertificate::create( [
            'id'=>2,
            'executor_profile_id'=>1,
            'certificate'=>'study_certeficate',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Executoreducationcertificate::create( [
            'id'=>3,
            'executor_profile_id'=>6,
            'certificate'=>'webex_certi',
            'created_at'=>'2022-01-04 06:37:05',
            'updated_at'=>'2022-01-04 08:50:50'
            ] );



            Executoreducationcertificate::create( [
            'id'=>4,
            'executor_profile_id'=>6,
            'certificate'=>'dizain_certificatenew',
            'created_at'=>'2022-01-04 08:50:50',
            'updated_at'=>'2022-01-04 08:50:50'
            ] );
    }
}
