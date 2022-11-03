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
            'category_name'=>'IT услуги',
            'status'=>'0',
            'created_at'=>'2022-02-10 09:30:37',
            'updated_at'=>'2022-03-07 04:25:05'
            ] );

            Category::create( [
            'id'=>2,
            'category_name'=>'Автосервис',
            'status'=>'0',
            'created_at'=>'2022-02-10 09:52:59',
            'updated_at'=>'2022-02-10 09:52:59'
            ] );

            Category::create( [
            'id'=>3,
            'category_name'=>'Грузоперевозки',
            'status'=>'0',
            'created_at'=>'2022-02-10 10:21:24',
            'updated_at'=>'2022-02-10 10:21:24'
            ] );

            Category::create( [
            'id'=>4,
            'category_name'=>'Животные',
            'status'=>'0',
            'created_at'=>'2022-02-17 07:04:57',
            'updated_at'=>'2022-02-17 07:04:57'
            ] );

            Category::create( [
            'id'=>5,
            'category_name'=>'Ремонт, строительств',
            'status'=>'0',
            'created_at'=>'2022-02-17 07:04:57',
            'updated_at'=>'2022-02-17 07:04:57'
            ] );

            Category::create( [
            'id'=>6,
            'category_name'=>'Уборка, Дезинфекция',
            'status'=>'0',
            'created_at'=>'2022-02-17 08:33:46',
            'updated_at'=>'2022-02-17 08:33:46'
            ] );

            Category::create( [
            'id'=>7,
            'category_name'=>'Уборка помещений',
            'status'=>'0',
            'created_at'=>'2022-03-01 01:52:22',
            'updated_at'=>'2022-03-01 01:52:22'
            ] );

            Category::create( [
            'id'=>8,
            'category_name'=>'Бухгалтерия и налоги',
            'status'=>'0',
            'created_at'=>'2022-03-01 02:36:51',
            'updated_at'=>'2022-03-01 02:36:51'
            ] );

            Category::create( [
            'id'=>11,
            'category_name'=>'Услуги дизайнеров',
            'status'=>'0',
            'created_at'=>'2022-03-11 04:38:37',
            'updated_at'=>'2022-03-11 04:38:37'
            ] );

            Category::create( [
            'id'=>12,
            'category_name'=>'Услуги для бизнеса',
            'status'=>'0',
            'created_at'=>'2022-03-11 04:45:44',
            'updated_at'=>'2022-03-11 04:45:44'
            ] );

            Category::create( [
            'id'=>13,
            'category_name'=>'Услуги по аренде',
            'status'=>'0',
            'created_at'=>'2022-03-11 05:23:03',
            'updated_at'=>'2022-03-11 05:23:03'
            ] );

            Category::create( [
            'id'=>14,
            'category_name'=>'Фото, видео, ауди',
            'status'=>'0',
            'created_at'=>'2022-03-11 05:37:03',
            'updated_at'=>'2022-03-11 05:37:03'
            ] );

            Category::create( [
            'id'=>15,
            'category_name'=>'ХОЗ. УСЛУГИ',
            'status'=>'0',
            'created_at'=>'2022-03-11 05:45:29',
            'updated_at'=>'2022-03-11 05:45:29'
            ] );

            Category::create( [
            'id'=>16,
            'category_name'=>'Юридические услуги',
            'status'=>'0',
            'created_at'=>'2022-03-11 05:53:29',
            'updated_at'=>'2022-03-11 05:53:29'
            ] );
    }
}
