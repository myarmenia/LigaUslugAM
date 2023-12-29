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
            'created_at'=>null,
            'updated_at'=>null
            ] );



            Region::create( [
            'id'=>2,
            'region'=>'Новосибирская область',
            'created_at'=>null,
            'updated_at'=>null
            ] );
            Region::create( [
                'id'=>3,
                'region'=>'Хакасия',
                'created_at'=>null,
                'updated_at'=>null
                ] );
    }
}
