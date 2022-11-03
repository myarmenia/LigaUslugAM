<?php

namespace Database\Seeders;

use App\Models\ExecutorCategory;
use Illuminate\Database\Seeder;

class ExecutorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExecutorCategory::create( [
            'id'=>104,
            'executor_profile_id'=>10,
            'category_name'=>'dizayn',
            'created_at'=>'2022-01-26 06:48:32',
            'updated_at'=>'2022-01-26 06:48:32'
            ] );



            Executorcategory::create( [
            'id'=>105,
            'executor_profile_id'=>10,
            'category_name'=>'interier1',
            'created_at'=>'2022-01-26 06:48:32',
            'updated_at'=>'2022-01-26 06:48:32'
            ] );



            Executorcategory::create( [
            'id'=>106,
            'executor_profile_id'=>10,
            'category_name'=>'interier2',
            'created_at'=>'2022-01-26 06:48:32',
            'updated_at'=>'2022-01-26 06:48:32'
            ] );


    }
}
