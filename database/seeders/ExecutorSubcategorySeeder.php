<?php

namespace Database\Seeders;

use App\Models\ExecutorSubcategory;
use Illuminate\Database\Seeder;

class ExecutorSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExecutorSubcategory::create( [
            'id'=>106,
            'executor_profile_id'=>10,
            'subcategory_name'=>'manikyur',
            'created_at'=>'2022-01-26 06:48:32',
            'updated_at'=>'2022-01-26 06:48:32'
            ] );



            Executorsubcategory::create( [
            'id'=>107,
            'executor_profile_id'=>10,
            'subcategory_name'=>'petikjur',
            'created_at'=>'2022-01-26 06:48:32',
            'updated_at'=>'2022-01-26 06:48:32'
            ] );


    }
}
