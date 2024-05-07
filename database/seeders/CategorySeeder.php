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
        
        Category::create( [
            'id'=>1,
            'category_name'=>'ՏՏ ծառայություններ',
            'path'=>'public/category_logo/1/Group (4).png',
            'logo_name'=>'Group (4).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:00:31'
            ] );

            Category::create( [
            'id'=>2,
            'category_name'=>'Ավտոմեքենաների սպասարկում',
            'path'=>'public/category_logo/2/IMAGE.png',
            'logo_name'=>'IMAGE.png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:04:16'
            ] );

            Category::create( [
            'id'=>3,
            'category_name'=>'Բեռնափոխադրումներ',
            'path'=>'public/category_logo/3/Frame (19).png',
            'logo_name'=>'Frame (19).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:06:35'
            ] );

            Category::create( [
            'id'=>4,
            'category_name'=>'Կենդանիներ',
            'path'=>'public/category_logo/4/Group (7).png',
            'logo_name'=>'Group (7).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:02:11'
            ] );

            Category::create( [
            'id'=>5,
            'category_name'=>'Վերանորոգում, շինարարություն',
            'path'=>'public/category_logo/5/Group (9).png',
            'logo_name'=>'Group (9).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:04:40'
            ] );

            Category::create( [
            'id'=>6,
            'category_name'=>'Մաքրում, ախտահանում',
            'path'=>'public/category_logo/6/Frame (20).png',
            'logo_name'=>'Frame (20).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:07:15'
            ] );

            Category::create( [
            'id'=>7,
            'category_name'=>'Մաքրում',
            'path'=>'public/category_logo/7/Frame (14).png',
            'logo_name'=>'Frame (14).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:02:37'
            ] );

            Category::create( [
            'id'=>8,
            'category_name'=>'Հաշվապահություն և հարկեր',
            'path'=>'public/category_logo/8/Frame (16).png',
            'logo_name'=>'Frame (16).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:05:11'
            ] );

            Category::create( [
            'id'=>9,
            'category_name'=>'Դիզայնի ծառայություններ',
            'path'=>'public/category_logo/9/Frame (21).png',
            'logo_name'=>'Frame (21).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:07:54'
            ] );

            Category::create( [
            'id'=>10,
            'category_name'=>'Բիզնես ծառայություններ',
            'path'=>'public/category_logo/10/Group (8).png',
            'logo_name'=>'Group (8).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:03:11'
            ] );

            Category::create( [
            'id'=>11,
            'category_name'=>'Վարձակալության ծառայություններ',
            'path'=>'public/category_logo/11/Frame (17).png',
            'logo_name'=>'Frame (17).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:05:38'
            ] );

            Category::create( [
            'id'=>12,
            'category_name'=>'Ֆոտո, վիդեո, աուդիո',
            'path'=>'public/category_logo/12/Frame (22).png',
            'logo_name'=>'Frame (22).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:08:19'
            ] );

            Category::create( [
            'id'=>13,
            'category_name'=>'Կենցաղային ծառայություններ',
            'path'=>'public/category_logo/13/Frame (15).png',
            'logo_name'=>'Frame (15).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:03:41'
            ] );

            Category::create( [
            'id'=>14,
            'category_name'=>'Իրավաբանական ծառայություններ',
            'path'=>'public/category_logo/14/Frame (18).png',
            'logo_name'=>'Frame (18).png',
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>'2024-05-07 10:06:10'
            ] );

            Category::create( [
            'id'=>15,
            'category_name'=>'Այլ',
            'path'=>NULL,
            'logo_name'=>NULL,
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Category::create( [
            'id'=>16,
            'category_name'=>'Դատական հարցեր',
            'path'=>NULL,
            'logo_name'=>NULL,
            'status'=>'0',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}
