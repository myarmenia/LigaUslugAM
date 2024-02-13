<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryInsert = [
            ['category_name'=>'ՏՏ ծառայություններ','status'=>'0'],
            ['category_name'=>'Ավտոմեքենաների սպասարկում','status'=>'0'],
            ['category_name'=>'Բեռնափոխադրումներ','status'=>'0'],
            ['category_name'=>'Կենդանիներ','status'=>'0'],
            ['category_name'=>'Վերանորոգում, շինարարություն','status'=>'0'],
            ['category_name'=>'Մաքրում, ախտահանում','status'=>'0'],
            ['category_name'=>'Մաքրում','status'=>'0'],
            ['category_name'=>'Հաշվապահություն և հարկեր','status'=>'0'],
            ['category_name'=>'Դիզայնի ծառայություններ','status'=>'0'],
            ['category_name'=>'Բիզնես ծառայություններ','status'=>'0'],
            ['category_name'=>'Վարձակալության ծառայություններ','status'=>'0'],
            ['category_name'=>'Ֆոտո, վիդեո, աուդիո','status'=>'0'],
            ['category_name'=>'Կենցաղային ծառայություններ','status'=>'0'],
            ['category_name'=>'Իրավաբանական ծառայություններ','status'=>'0'],

        ];
        
        Category::insert($categoryInsert);
    }
}
