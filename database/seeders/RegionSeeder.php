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
        $regionInsert = [
            ['region' => 'Երևան'],
            ['region' => 'Արագածոտն'],
            ['region' => 'Արարատ'],
            ['region' => 'Արմավիր'],
            ['region' => 'Գեղարքունիք'],
            ['region' => 'Կոտայք'],
            ['region' => 'Լոռի'],
            ['region' => 'Շիրակ'],
            ['region' => 'Սյունիք'],
            ['region' => 'Տավուշ'],
            ['region' => 'Վայոց ձոր'],
        ];
        
        Region::insert($regionInsert);
    }
}
