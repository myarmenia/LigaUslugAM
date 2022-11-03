<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create( [
            'id'=>1,
            'region'=>'Красноярский край',
            'created_at'=>'2022-02-11 11:16:50',
            'updated_at'=>'2022-02-11 11:16:50'
            ] );



            Region::create( [
            'id'=>2,
            'region'=>'Новосибирская область',
            'created_at'=>'2022-02-11 11:47:48',
            'updated_at'=>'2022-02-11 11:47:48'
            ] );
    }
}
