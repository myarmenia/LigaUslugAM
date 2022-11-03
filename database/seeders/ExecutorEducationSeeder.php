<?php

namespace Database\Seeders;

use App\Models\ExecutorEducation;
use Illuminate\Database\Seeder;

class ExecutorEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Executoreducation::create( [
            'id'=>1,
            'executor_profile_id'=>1,
            'education_type'=>'high',
            'created_at'=>'2021-12-29 09:56:20',
            'updated_at'=>'2021-12-29 09:56:20'
            ] );



            Executoreducation::create( [
            'id'=>2,
            'executor_profile_id'=>1,
            'education_type'=>'middle',
            'created_at'=>'2021-12-29 09:56:20',
            'updated_at'=>'2021-12-29 09:56:20'
            ] );



            Executoreducation::create( [
            'id'=>3,
            'executor_profile_id'=>6,
            'education_type'=>'high1',
            'created_at'=>'2022-01-04 06:07:41',
            'updated_at'=>'2022-01-04 06:15:40'
            ] );



            Executoreducation::create( [
            'id'=>4,
            'executor_profile_id'=>6,
            'education_type'=>'middle',
            'created_at'=>'2022-01-04 06:08:43',
            'updated_at'=>'2022-01-04 06:08:43'
            ] );



            ExecutorEducation::create( [
            'id'=>5,
            'executor_profile_id'=>6,
            'education_type'=>'middle',
            'created_at'=>'2022-01-04 06:14:25',
            'updated_at'=>'2022-01-04 06:14:25'
            ] );



            Executoreducation::create( [
            'id'=>6,
            'executor_profile_id'=>6,
            'education_type'=>'middle',
            'created_at'=>'2022-01-04 06:14:53',
            'updated_at'=>'2022-01-04 06:14:53'
            ] );



            Executoreducation::create( [
            'id'=>7,
            'executor_profile_id'=>6,
            'education_type'=>'middle',
            'created_at'=>'2022-01-04 06:15:40',
            'updated_at'=>'2022-01-04 06:15:40'
            ] );
    }
}
