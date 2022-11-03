<?php

namespace Database\Seeders;

use App\Models\ExecutorWorkingRegion;
use Illuminate\Database\Seeder;

class ExecutorWorkingRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Executorworkingregion::create( [
            'id'=>1,
            'executor_profile_id'=>1,
            'executorwork_region'=>'kiev',
            'created_at'=>'2021-12-30 08:47:53',
            'updated_at'=>'2022-01-04 05:25:47'
            ] );



            Executorworkingregion::create( [
            'id'=>2,
            'executor_profile_id'=>1,
            'executorwork_region'=>'Piter',
            'created_at'=>'2021-12-30 08:47:53',
            'updated_at'=>'2021-12-30 08:47:53'
            ] );



            Executorworkingregion::create( [
            'id'=>3,
            'executor_profile_id'=>6,
            'executorwork_region'=>'kiev3',
            'created_at'=>'2022-01-04 05:25:47',
            'updated_at'=>'2022-01-04 05:29:15'
            ] );



            Executorworkingregion::create( [
            'id'=>4,
            'executor_profile_id'=>6,
            'executorwork_region'=>'kievnew',
            'created_at'=>'2022-01-04 05:28:16',
            'updated_at'=>'2022-01-04 05:28:16'
            ] );



            ExecutorWorkingRegion::create( [
            'id'=>5,
            'executor_profile_id'=>6,
            'executorwork_region'=>'kievnew',
            'created_at'=>'2022-01-04 05:29:15',
            'updated_at'=>'2022-01-04 05:29:15'
            ] );



            Executorworkingregion::create( [
            'id'=>10,
            'executor_profile_id'=>10,
            'executorwork_region'=>'italy',
            'created_at'=>'2022-01-26 09:03:37',
            'updated_at'=>'2022-01-26 09:03:37'
            ] );



            Executorworkingregion::create( [
            'id'=>11,
            'executor_profile_id'=>10,
            'executorwork_region'=>'italy1',
            'created_at'=>'2022-01-26 09:03:37',
            'updated_at'=>'2022-01-26 09:03:37'
            ] );


    }
}
