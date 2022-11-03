<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create( [
            'id'=>1,
            'category_id'=>1,
            'subcategory_name'=>'Компьютерная помощь',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2021-12-21 02:17:30',
            'updated_at'=>'2022-03-08 14:06:07'
            ] );



            Subcategory::create( [
            'id'=>2,
            'category_id'=>1,
            'subcategory_name'=>'Сайты под ключ',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2021-12-21 02:26:17',
            'updated_at'=>'2021-12-21 02:26:17'
            ] );



            Subcategory::create( [
            'id'=>3,
            'category_id'=>1,
            'subcategory_name'=>'Разработка программ ',
            'price'=>470,
            'status'=>'0',
            'created_at'=>'2021-12-21 02:33:45',
            'updated_at'=>'2021-12-21 02:33:45'
            ] );



            Subcategory::create( [
            'id'=>4,
            'category_id'=>1,
            'subcategory_name'=>'Администрирование',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2021-12-22 12:07:10',
            'updated_at'=>'2021-12-22 12:07:10'
            ] );



            Subcategory::create( [
            'id'=>5,
            'category_id'=>1,
            'subcategory_name'=>'Разработка сайтов  ',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-01-21 09:12:32',
            'updated_at'=>'2022-01-21 09:12:32'
            ] );



            Subcategory::create( [
            'id'=>6,
            'category_id'=>1,
            'subcategory_name'=>'Заправка картриджей ',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 09:49:02',
            'updated_at'=>'2022-02-10 09:49:02'
            ] );



            Subcategory::create( [
            'id'=>7,
            'category_id'=>1,
            'subcategory_name'=>'Разработка мобильных приложений ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 09:49:40',
            'updated_at'=>'2022-02-10 09:49:40'
            ] );



            Subcategory::create( [
            'id'=>8,
            'category_id'=>1,
            'subcategory_name'=>'Разработка игр ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:50:23',
            'updated_at'=>'2022-02-10 09:50:23'
            ] );



            Subcategory::create( [
            'id'=>9,
            'category_id'=>1,
            'subcategory_name'=>'Другое',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-10 09:51:33',
            'updated_at'=>'2022-02-10 09:51:33'
            ] );



            Subcategory::create( [
            'id'=>10,
            'category_id'=>2,
            'subcategory_name'=>'Шиномонтаж',
            'price'=>100,
            'status'=>'',
            'created_at'=>'2022-02-10 09:54:25',
            'updated_at'=>'2022-02-10 09:54:25'
            ] );



            Subcategory::create( [
            'id'=>11,
            'category_id'=>2,
            'subcategory_name'=>'Кузовной ремонт 1',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:54:25',
            'updated_at'=>'2022-03-02 05:02:04'
            ] );



            Subcategory::create( [
            'id'=>12,
            'category_id'=>2,
            'subcategory_name'=>'Диагностика',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 09:55:16',
            'updated_at'=>'2022-02-10 09:55:16'
            ] );



            Subcategory::create( [
            'id'=>13,
            'category_id'=>2,
            'subcategory_name'=>'Трансмиссия',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:57:10',
            'updated_at'=>'2022-02-10 09:57:10'
            ] );



            Subcategory::create( [
            'id'=>14,
            'category_id'=>2,
            'subcategory_name'=>'Замена стекла ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:57:10',
            'updated_at'=>'2022-02-10 09:57:10'
            ] );



            Subcategory::create( [
            'id'=>15,
            'category_id'=>2,
            'subcategory_name'=>'Подвеска',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:06:18',
            'updated_at'=>'2022-02-10 10:06:18'
            ] );



            Subcategory::create( [
            'id'=>16,
            'category_id'=>2,
            'subcategory_name'=>'Рулевое управление ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:06:18',
            'updated_at'=>'2022-02-10 10:06:18'
            ] );



            Subcategory::create( [
            'id'=>17,
            'category_id'=>2,
            'subcategory_name'=>'Рулевое управление ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:08:16',
            'updated_at'=>'2022-02-10 10:08:16'
            ] );



            Subcategory::create( [
            'id'=>18,
            'category_id'=>2,
            'subcategory_name'=>'Сход-развал ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:08:16',
            'updated_at'=>'2022-02-10 10:08:16'
            ] );



            Subcategory::create( [
            'id'=>19,
            'category_id'=>2,
            'subcategory_name'=>'Тормозная система ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:09:21',
            'updated_at'=>'2022-02-10 10:09:21'
            ] );



            Subcategory::create( [
            'id'=>20,
            'category_id'=>2,
            'subcategory_name'=>'Ремонт грузовых авто ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:09:21',
            'updated_at'=>'2022-02-10 10:09:21'
            ] );



            Subcategory::create( [
            'id'=>21,
            'category_id'=>2,
            'subcategory_name'=>'Ремонт тентов грузовых авто ',
            'price'=>350,
            'status'=>'',
            'created_at'=>'2022-02-10 10:11:18',
            'updated_at'=>'2022-02-10 10:11:18'
            ] );



            Subcategory::create( [
            'id'=>22,
            'category_id'=>2,
            'subcategory_name'=>'Мойка и уход за авто ',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 10:11:18',
            'updated_at'=>'2022-02-10 10:11:18'
            ] );



            Subcategory::create( [
            'id'=>23,
            'category_id'=>2,
            'subcategory_name'=>'Капитальный ремонт  Двигателя ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:12:13',
            'updated_at'=>'2022-02-10 10:12:13'
            ] );



            Subcategory::create( [
            'id'=>24,
            'category_id'=>2,
            'subcategory_name'=>'Техническое обслуживание ',
            'price'=>100,
            'status'=>'',
            'created_at'=>'2022-02-10 10:12:13',
            'updated_at'=>'2022-02-10 10:12:13'
            ] );



            Subcategory::create( [
            'id'=>25,
            'category_id'=>2,
            'subcategory_name'=>'Тюнинг ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:13:22',
            'updated_at'=>'2022-02-10 10:13:22'
            ] );



            Subcategory::create( [
            'id'=>26,
            'category_id'=>2,
            'subcategory_name'=>'Электрооборудование',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:13:22',
            'updated_at'=>'2022-02-10 10:13:22'
            ] );



            Subcategory::create( [
            'id'=>27,
            'category_id'=>2,
            'subcategory_name'=>'Выездной шиномонтаж ',
            'price'=>180,
            'status'=>'',
            'created_at'=>'2022-02-10 10:14:30',
            'updated_at'=>'2022-02-10 10:14:30'
            ] );



            Subcategory::create( [
            'id'=>28,
            'category_id'=>2,
            'subcategory_name'=>'Отогрев авто ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:14:30',
            'updated_at'=>'2022-02-10 10:14:30'
            ] );



            Subcategory::create( [
            'id'=>29,
            'category_id'=>2,
            'subcategory_name'=>'Ремонт спецтехники ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:15:49',
            'updated_at'=>'2022-02-10 10:15:49'
            ] );



            Subcategory::create( [
            'id'=>30,
            'category_id'=>2,
            'subcategory_name'=>'Покраска ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:20:27',
            'updated_at'=>'2022-02-10 10:20:27'
            ] );



            Subcategory::create( [
            'id'=>31,
            'category_id'=>2,
            'subcategory_name'=>'Другое',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:18:28',
            'updated_at'=>'2022-02-10 10:18:28'
            ] );



            Subcategory::create( [
            'id'=>32,
            'category_id'=>3,
            'subcategory_name'=>'Грузоперевозки',
            'price'=>55,
            'status'=>'',
            'created_at'=>'2022-02-10 10:49:49',
            'updated_at'=>'2022-02-10 10:49:49'
            ] );



            Subcategory::create( [
            'id'=>33,
            'category_id'=>3,
            'subcategory_name'=>'Перевозка стройматериалов ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:49:49',
            'updated_at'=>'2022-02-10 10:49:49'
            ] );



            Subcategory::create( [
            'id'=>34,
            'category_id'=>3,
            'subcategory_name'=>'Услуги грузчиков ',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 10:50:29',
            'updated_at'=>'2022-02-10 10:50:29'
            ] );



            Subcategory::create( [
            'id'=>35,
            'category_id'=>3,
            'subcategory_name'=>'Вывоз мусора ',
            'price'=>60,
            'status'=>'',
            'created_at'=>'2022-02-10 10:51:44',
            'updated_at'=>'2022-02-10 10:51:44'
            ] );



            Subcategory::create( [
            'id'=>36,
            'category_id'=>3,
            'subcategory_name'=>'Междугородные перевозки ',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-10 10:51:44',
            'updated_at'=>'2022-02-10 10:51:44'
            ] );



            Subcategory::create( [
            'id'=>37,
            'category_id'=>3,
            'subcategory_name'=>'Перевозка продуктов ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:52:59',
            'updated_at'=>'2022-02-10 10:52:59'
            ] );



            Subcategory::create( [
            'id'=>38,
            'category_id'=>3,
            'subcategory_name'=>'Курьеры',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:52:59',
            'updated_at'=>'2022-02-10 10:52:59'
            ] );



            Subcategory::create( [
            'id'=>39,
            'category_id'=>3,
            'subcategory_name'=>'Курьеры на авто ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:54:13',
            'updated_at'=>'2022-02-10 10:54:13'
            ] );



            Subcategory::create( [
            'id'=>40,
            'category_id'=>3,
            'subcategory_name'=>'Услуги манипулятора ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:54:13',
            'updated_at'=>'2022-02-10 10:54:13'
            ] );



            Subcategory::create( [
            'id'=>41,
            'category_id'=>3,
            'subcategory_name'=>'Перевозка негабаритных грузов ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-10 10:55:33',
            'updated_at'=>'2022-02-10 10:55:33'
            ] );



            Subcategory::create( [
            'id'=>42,
            'category_id'=>3,
            'subcategory_name'=>'Перевозка продуктов с рефрижератором ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:55:33',
            'updated_at'=>'2022-02-10 10:55:33'
            ] );



            Subcategory::create( [
            'id'=>43,
            'category_id'=>3,
            'subcategory_name'=>'Эвакуаторы',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-10 10:57:53',
            'updated_at'=>'2022-02-10 10:57:53'
            ] );



            Subcategory::create( [
            'id'=>44,
            'category_id'=>3,
            'subcategory_name'=>'Междугородные перевозки животных ',
            'price'=>450,
            'status'=>'',
            'created_at'=>'2022-02-10 10:57:53',
            'updated_at'=>'2022-02-10 10:57:53'
            ] );



            Subcategory::create( [
            'id'=>45,
            'category_id'=>3,
            'subcategory_name'=>'Междугородные перевозки автомобилей  \r\n',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-10 10:58:42',
            'updated_at'=>'2022-02-10 10:58:42'
            ] );



            Subcategory::create( [
            'id'=>46,
            'category_id'=>3,
            'subcategory_name'=>'Другое',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:58:42',
            'updated_at'=>'2022-02-10 10:58:42'
            ] );



            Subcategory::create( [
            'id'=>47,
            'category_id'=>4,
            'subcategory_name'=>'Выгул',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:07:08',
            'updated_at'=>'2022-02-17 07:07:08'
            ] );



            Subcategory::create( [
            'id'=>48,
            'category_id'=>4,
            'subcategory_name'=>'Стрижка животных',
            'price'=>80,
            'status'=>'',
            'created_at'=>'2022-02-17 07:07:08',
            'updated_at'=>'2022-02-17 07:07:08'
            ] );



            Subcategory::create( [
            'id'=>49,
            'category_id'=>4,
            'subcategory_name'=>'Перевозка ',
            'price'=>70,
            'status'=>'',
            'created_at'=>'2022-02-17 07:10:07',
            'updated_at'=>'2022-02-17 07:10:07'
            ] );



            Subcategory::create( [
            'id'=>50,
            'category_id'=>4,
            'subcategory_name'=>'Передержка',
            'price'=>90,
            'status'=>'',
            'created_at'=>'2022-02-17 07:10:07',
            'updated_at'=>'2022-02-17 07:10:07'
            ] );



            Subcategory::create( [
            'id'=>53,
            'category_id'=>4,
            'subcategory_name'=>'Составление родословной',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:17:20',
            'updated_at'=>'2022-02-17 07:17:20'
            ] );



            Subcategory::create( [
            'id'=>54,
            'category_id'=>4,
            'subcategory_name'=>'Дрессировка',
            'price'=>900,
            'status'=>'',
            'created_at'=>'2022-02-17 07:17:20',
            'updated_at'=>'2022-02-17 07:17:20'
            ] );



            Subcategory::create( [
            'id'=>55,
            'category_id'=>4,
            'subcategory_name'=>'Стрижка когтей',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:17:59',
            'updated_at'=>'2022-02-17 07:17:59'
            ] );



            Subcategory::create( [
            'id'=>56,
            'category_id'=>5,
            'subcategory_name'=>'Электромонтажные работы ',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:22:01',
            'updated_at'=>'2022-02-17 07:22:01'
            ] );



            Subcategory::create( [
            'id'=>57,
            'category_id'=>5,
            'subcategory_name'=>'Изготовление мебели',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:22:01',
            'updated_at'=>'2022-02-17 07:22:01'
            ] );



            Subcategory::create( [
            'id'=>58,
            'category_id'=>5,
            'subcategory_name'=>'Изготовление кухни',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:23:12',
            'updated_at'=>'2022-02-17 07:23:12'
            ] );



            Subcategory::create( [
            'id'=>59,
            'category_id'=>5,
            'subcategory_name'=>'Кафельные работы',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:23:12',
            'updated_at'=>'2022-02-17 07:23:12'
            ] );



            Subcategory::create( [
            'id'=>60,
            'category_id'=>5,
            'subcategory_name'=>'Кладка брусчатки',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:24:46',
            'updated_at'=>'2022-02-17 07:24:46'
            ] );



            Subcategory::create( [
            'id'=>61,
            'category_id'=>5,
            'subcategory_name'=>'Бетонные работы ',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:24:46',
            'updated_at'=>'2022-02-17 07:24:46'
            ] );



            Subcategory::create( [
            'id'=>62,
            'category_id'=>5,
            'subcategory_name'=>'Сантехнические работы, водоснабжение, канализация и отопление, квартира',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:26:11',
            'updated_at'=>'2022-02-17 07:26:11'
            ] );



            Subcategory::create( [
            'id'=>63,
            'category_id'=>5,
            'subcategory_name'=>'Сантехнические работы, водоснабжение, канализация и отопление, частный дом',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:26:11',
            'updated_at'=>'2022-02-17 07:26:11'
            ] );



            Subcategory::create( [
            'id'=>64,
            'category_id'=>5,
            'subcategory_name'=>'Сантехнические работы, водоснабжение, канализация и отопление, торговое помещение',
            'price'=>3000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:27:29',
            'updated_at'=>'2022-02-17 07:27:29'
            ] );



            Subcategory::create( [
            'id'=>65,
            'category_id'=>5,
            'subcategory_name'=>'Сантехнические работы, водоснабжение, канализация и отопление промышленное здание',
            'price'=>4000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:27:29',
            'updated_at'=>'2022-02-17 07:27:29'
            ] );



            Subcategory::create( [
            'id'=>66,
            'category_id'=>5,
            'subcategory_name'=>'Мелкосрочный ремонт сантехники',
            'price'=>80,
            'status'=>'',
            'created_at'=>'2022-02-17 07:28:50',
            'updated_at'=>'2022-02-17 07:28:50'
            ] );



            Subcategory::create( [
            'id'=>67,
            'category_id'=>5,
            'subcategory_name'=>'Фасадные работы монтаж',
            'price'=>3000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:28:50',
            'updated_at'=>'2022-02-17 07:28:50'
            ] );



            Subcategory::create( [
            'id'=>68,
            'category_id'=>5,
            'subcategory_name'=>'Отделка деревянных домов, бань, саун. Заборы и ограждения ',
            'price'=>800,
            'status'=>'',
            'created_at'=>'2022-02-17 07:31:25',
            'updated_at'=>'2022-02-17 07:31:25'
            ] );



            Subcategory::create( [
            'id'=>69,
            'category_id'=>5,
            'subcategory_name'=>'Фасадные работы ремонт',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 07:31:25',
            'updated_at'=>'2022-02-17 07:31:25'
            ] );



            Subcategory::create( [
            'id'=>70,
            'category_id'=>5,
            'subcategory_name'=>'Сборка и ремонт мебели',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:32:57',
            'updated_at'=>'2022-02-17 07:32:57'
            ] );



            Subcategory::create( [
            'id'=>71,
            'category_id'=>5,
            'subcategory_name'=>'Натяжные потолки ',
            'price'=>280,
            'status'=>'',
            'created_at'=>'2022-02-17 07:32:57',
            'updated_at'=>'2022-02-17 07:32:57'
            ] );



            Subcategory::create( [
            'id'=>72,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт балконов ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:35:53',
            'updated_at'=>'2022-02-17 07:35:53'
            ] );



            Subcategory::create( [
            'id'=>73,
            'category_id'=>5,
            'subcategory_name'=>'Остекление балконов ',
            'price'=>750,
            'status'=>'',
            'created_at'=>'2022-02-17 07:35:53',
            'updated_at'=>'2022-02-17 07:35:53'
            ] );



            Subcategory::create( [
            'id'=>74,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт ванной',
            'price'=>1800,
            'status'=>'',
            'created_at'=>'2022-02-17 07:37:14',
            'updated_at'=>'2022-02-17 07:37:14'
            ] );



            Subcategory::create( [
            'id'=>75,
            'category_id'=>5,
            'subcategory_name'=>'Строительство домов, коттеджей ',
            'price'=>10000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:37:14',
            'updated_at'=>'2022-02-17 07:37:14'
            ] );



            Subcategory::create( [
            'id'=>76,
            'category_id'=>5,
            'subcategory_name'=>'Мастер на час, любые мелкосрочные работы ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 07:38:21',
            'updated_at'=>'2022-02-17 07:38:21'
            ] );



            Subcategory::create( [
            'id'=>77,
            'category_id'=>5,
            'subcategory_name'=>'Обои и малярные работы',
            'price'=>700,
            'status'=>'',
            'created_at'=>'2022-02-17 07:38:21',
            'updated_at'=>'2022-02-17 07:38:21'
            ] );



            Subcategory::create( [
            'id'=>78,
            'category_id'=>5,
            'subcategory_name'=>'Снос и демонтаж',
            'price'=>700,
            'status'=>'',
            'created_at'=>'2022-02-17 07:39:27',
            'updated_at'=>'2022-02-17 07:39:27'
            ] );



            Subcategory::create( [
            'id'=>79,
            'category_id'=>5,
            'subcategory_name'=>'Строительство гараж',
            'price'=>4500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:39:27',
            'updated_at'=>'2022-02-17 07:39:27'
            ] );



            Subcategory::create( [
            'id'=>80,
            'category_id'=>5,
            'subcategory_name'=>'Сварочные работы, мелкосрочные работы',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 07:40:46',
            'updated_at'=>'2022-02-17 07:40:46'
            ] );



            Subcategory::create( [
            'id'=>81,
            'category_id'=>5,
            'subcategory_name'=>'Земляные работы',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:40:46',
            'updated_at'=>'2022-02-17 07:40:46'
            ] );



            Subcategory::create( [
            'id'=>82,
            'category_id'=>5,
            'subcategory_name'=>'Монтаж Лестницы ',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:42:07',
            'updated_at'=>'2022-02-17 07:42:07'
            ] );



            Subcategory::create( [
            'id'=>83,
            'category_id'=>5,
            'subcategory_name'=>'Высотные работы без техники',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:42:07',
            'updated_at'=>'2022-02-17 07:42:07'
            ] );



            Subcategory::create( [
            'id'=>84,
            'category_id'=>5,
            'subcategory_name'=>'Газовая сварка',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:43:37',
            'updated_at'=>'2022-02-17 07:43:37'
            ] );



            Subcategory::create( [
            'id'=>85,
            'category_id'=>5,
            'subcategory_name'=>'Слаботочные системы ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:43:37',
            'updated_at'=>'2022-02-17 07:43:37'
            ] );



            Subcategory::create( [
            'id'=>86,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт и установка замков',
            'price'=>100,
            'status'=>'',
            'created_at'=>'2022-02-17 07:45:18',
            'updated_at'=>'2022-02-17 07:45:18'
            ] );



            Subcategory::create( [
            'id'=>87,
            'category_id'=>5,
            'subcategory_name'=>'Реставрация и эмалировка ванн ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:45:18',
            'updated_at'=>'2022-02-17 07:45:18'
            ] );



            Subcategory::create( [
            'id'=>88,
            'category_id'=>5,
            'subcategory_name'=>'Демонтаж металлоконструкций',
            'price'=>400,
            'status'=>'',
            'created_at'=>'2022-02-17 07:46:31',
            'updated_at'=>'2022-02-17 07:46:31'
            ] );



            Subcategory::create( [
            'id'=>89,
            'category_id'=>5,
            'subcategory_name'=>'Вентиляция',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:46:31',
            'updated_at'=>'2022-02-17 07:46:31'
            ] );



            Subcategory::create( [
            'id'=>90,
            'category_id'=>5,
            'subcategory_name'=>'Алмазное сверление и резка',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:48:13',
            'updated_at'=>'2022-02-17 07:48:13'
            ] );



            Subcategory::create( [
            'id'=>91,
            'category_id'=>5,
            'subcategory_name'=>'Чистка труб ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:48:13',
            'updated_at'=>'2022-02-17 07:48:13'
            ] );



            Subcategory::create( [
            'id'=>92,
            'category_id'=>5,
            'subcategory_name'=>'Рольставни и секционные ворота',
            'price'=>600,
            'status'=>'',
            'created_at'=>'2022-02-17 07:50:05',
            'updated_at'=>'2022-02-17 07:50:05'
            ] );



            Subcategory::create( [
            'id'=>93,
            'category_id'=>5,
            'subcategory_name'=>'Изготовление ключей',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:50:05',
            'updated_at'=>'2022-02-17 07:50:05'
            ] );



            Subcategory::create( [
            'id'=>94,
            'category_id'=>5,
            'subcategory_name'=>'Настройка Антенн',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:04',
            'updated_at'=>'2022-02-17 07:51:04'
            ] );



            Subcategory::create( [
            'id'=>95,
            'category_id'=>5,
            'subcategory_name'=>'Озеленение',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:04',
            'updated_at'=>'2022-02-17 07:51:04'
            ] );



            Subcategory::create( [
            'id'=>96,
            'category_id'=>5,
            'subcategory_name'=>'Лепнина и мозаики ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:58',
            'updated_at'=>'2022-02-17 07:51:58'
            ] );



            Subcategory::create( [
            'id'=>97,
            'category_id'=>5,
            'subcategory_name'=>'Перетяжка и ремонт мягкой мебели ',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:58',
            'updated_at'=>'2022-02-17 07:51:58'
            ] );



            Subcategory::create( [
            'id'=>98,
            'category_id'=>5,
            'subcategory_name'=>'Изготовление кованых изделий ',
            'price'=>800,
            'status'=>'',
            'created_at'=>'2022-02-17 07:56:54',
            'updated_at'=>'2022-02-17 07:56:54'
            ] );



            Subcategory::create( [
            'id'=>99,
            'category_id'=>5,
            'subcategory_name'=>'Замена окна пластикового ',
            'price'=>400,
            'status'=>'',
            'created_at'=>'2022-02-17 07:56:54',
            'updated_at'=>'2022-02-17 07:56:54'
            ] );



            Subcategory::create( [
            'id'=>100,
            'category_id'=>5,
            'subcategory_name'=>'Сварочные работы ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:58:07',
            'updated_at'=>'2022-02-17 07:58:07'
            ] );



            Subcategory::create( [
            'id'=>101,
            'category_id'=>5,
            'subcategory_name'=>'Строительство бань, саун ',
            'price'=>1200,
            'status'=>'',
            'created_at'=>'2022-02-17 07:58:07',
            'updated_at'=>'2022-02-17 07:58:07'
            ] );



            Subcategory::create( [
            'id'=>102,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт квартиры под ключ ',
            'price'=>5000,
            'status'=>'',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Subcategory::create( [
            'id'=>103,
            'category_id'=>5,
            'subcategory_name'=>'Кровельные работы ',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:08:05',
            'updated_at'=>'2022-02-17 08:08:05'
            ] );



            Subcategory::create( [
            'id'=>104,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт офиса',
            'price'=>1400,
            'status'=>'',
            'created_at'=>'2022-02-17 08:08:05',
            'updated_at'=>'2022-02-17 08:08:05'
            ] );



            Subcategory::create( [
            'id'=>105,
            'category_id'=>5,
            'subcategory_name'=>'Охранные системы и контроль доступа',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:15:32',
            'updated_at'=>'2022-02-17 08:15:32'
            ] );



            Subcategory::create( [
            'id'=>106,
            'category_id'=>5,
            'subcategory_name'=>'Изготовление шкафов-купе ',
            'price'=>800,
            'status'=>'',
            'created_at'=>'2022-02-17 08:15:32',
            'updated_at'=>'2022-02-17 08:15:32'
            ] );



            Subcategory::create( [
            'id'=>107,
            'category_id'=>5,
            'subcategory_name'=>'Установка межкомнатных дверей ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:16:53',
            'updated_at'=>'2022-02-17 08:16:53'
            ] );



            Subcategory::create( [
            'id'=>108,
            'category_id'=>5,
            'subcategory_name'=>'Промышленные полы ',
            'price'=>3000,
            'status'=>'',
            'created_at'=>'2022-02-17 08:16:53',
            'updated_at'=>'2022-02-17 08:16:53'
            ] );



            Subcategory::create( [
            'id'=>109,
            'category_id'=>5,
            'subcategory_name'=>'Бурение скважины.',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 08:18:11',
            'updated_at'=>'2022-02-17 08:18:11'
            ] );



            Subcategory::create( [
            'id'=>110,
            'category_id'=>5,
            'subcategory_name'=>'Установка стен с Гипсокартона ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 08:18:11',
            'updated_at'=>'2022-02-17 08:18:11'
            ] );



            Subcategory::create( [
            'id'=>111,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт электрокотлов ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:19:02',
            'updated_at'=>'2022-02-17 08:19:02'
            ] );



            Subcategory::create( [
            'id'=>112,
            'category_id'=>5,
            'subcategory_name'=>'Кладка печей и каминов ',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:19:02',
            'updated_at'=>'2022-02-17 08:19:02'
            ] );



            Subcategory::create( [
            'id'=>113,
            'category_id'=>5,
            'subcategory_name'=>'Столярные и плотницкие работы',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:20:07',
            'updated_at'=>'2022-02-17 08:20:07'
            ] );



            Subcategory::create( [
            'id'=>114,
            'category_id'=>5,
            'subcategory_name'=>'Установка карнизов ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 08:20:07',
            'updated_at'=>'2022-02-17 08:20:07'
            ] );



            Subcategory::create( [
            'id'=>115,
            'category_id'=>5,
            'subcategory_name'=>'Ремонт и установка кодовых замков ',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-17 08:23:23',
            'updated_at'=>'2022-02-17 08:23:23'
            ] );



            Subcategory::create( [
            'id'=>116,
            'category_id'=>5,
            'subcategory_name'=>'Стекольные услуги ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:23:23',
            'updated_at'=>'2022-02-17 08:23:23'
            ] );



            Subcategory::create( [
            'id'=>117,
            'category_id'=>5,
            'subcategory_name'=>'Изготовление дверей из дерева ',
            'price'=>350,
            'status'=>'',
            'created_at'=>'2022-02-17 08:25:18',
            'updated_at'=>'2022-02-17 08:25:18'
            ] );



            Subcategory::create( [
            'id'=>118,
            'category_id'=>5,
            'subcategory_name'=>'Поверка счетчиков ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 08:25:18',
            'updated_at'=>'2022-02-17 08:25:18'
            ] );



            Subcategory::create( [
            'id'=>119,
            'category_id'=>5,
            'subcategory_name'=>'Роспись стен',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:26:46',
            'updated_at'=>'2022-02-17 08:26:46'
            ] );



            Subcategory::create( [
            'id'=>120,
            'category_id'=>5,
            'subcategory_name'=>'Проектирование зданий ',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 08:26:46',
            'updated_at'=>'2022-02-17 08:26:46'
            ] );



            Subcategory::create( [
            'id'=>125,
            'category_id'=>5,
            'subcategory_name'=>'Герметизация фасадов',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:30:14',
            'updated_at'=>'2022-02-17 08:30:14'
            ] );



            Subcategory::create( [
            'id'=>126,
            'category_id'=>5,
            'subcategory_name'=>'Другое',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 08:30:14',
            'updated_at'=>'2022-02-17 08:30:14'
            ] );



            Subcategory::create( [
            'id'=>127,
            'category_id'=>6,
            'subcategory_name'=>'Услуги дезинсекции ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:35:52',
            'updated_at'=>'2022-02-17 08:35:52'
            ] );



            Subcategory::create( [
            'id'=>128,
            'category_id'=>6,
            'subcategory_name'=>'Обеззараживание помещения ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:35:52',
            'updated_at'=>'2022-02-17 08:35:52'
            ] );



            Subcategory::create( [
            'id'=>129,
            'category_id'=>6,
            'subcategory_name'=>'Дезинфекция',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:39:44',
            'updated_at'=>'2022-02-17 08:39:44'
            ] );



            Subcategory::create( [
            'id'=>130,
            'category_id'=>6,
            'subcategory_name'=>'Избавление от плесени и грибка',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 08:39:44',
            'updated_at'=>'2022-02-17 08:39:44'
            ] );



            Subcategory::create( [
            'id'=>133,
            'category_id'=>6,
            'subcategory_name'=>'Уничтожение клопов ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:51:22',
            'updated_at'=>'2022-02-17 08:51:22'
            ] );



            Subcategory::create( [
            'id'=>134,
            'category_id'=>6,
            'subcategory_name'=>'Уничтожение тараканов ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:51:22',
            'updated_at'=>'2022-02-17 08:51:22'
            ] );



            Subcategory::create( [
            'id'=>135,
            'category_id'=>6,
            'subcategory_name'=>'Уничтожение грызунов ',
            'price'=>200,
            'status'=>' ',
            'created_at'=>'2022-02-17 08:53:22',
            'updated_at'=>'2022-02-17 08:53:22'
            ] );



            Subcategory::create( [
            'id'=>142,
            'category_id'=>11,
            'subcategory_name'=>'Веб-дизайнер',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:39:19',
            'updated_at'=>'2022-03-11 04:39:19'
            ] );



            Subcategory::create( [
            'id'=>143,
            'category_id'=>11,
            'subcategory_name'=>'Дизайнер интерьеров',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:40:18',
            'updated_at'=>'2022-03-11 04:41:11'
            ] );



            Subcategory::create( [
            'id'=>144,
            'category_id'=>11,
            'subcategory_name'=>'Графический дизайнер',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:41:45',
            'updated_at'=>'2022-03-11 04:41:45'
            ] );



            Subcategory::create( [
            'id'=>145,
            'category_id'=>11,
            'subcategory_name'=>'UX/UI-дизайнер',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:42:24',
            'updated_at'=>'2022-03-11 04:42:24'
            ] );



            Subcategory::create( [
            'id'=>146,
            'category_id'=>11,
            'subcategory_name'=>'Упаковка и реклам',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:42:46',
            'updated_at'=>'2022-03-11 04:42:46'
            ] );



            Subcategory::create( [
            'id'=>147,
            'category_id'=>11,
            'subcategory_name'=>'Ландшафтный дизайнер',
            'price'=>1000,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:43:16',
            'updated_at'=>'2022-03-11 04:43:16'
            ] );



            Subcategory::create( [
            'id'=>148,
            'category_id'=>12,
            'subcategory_name'=>'Персональный помощник',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:47:06',
            'updated_at'=>'2022-03-11 04:47:06'
            ] );



            Subcategory::create( [
            'id'=>149,
            'category_id'=>12,
            'subcategory_name'=>'Работа в MS Office',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:47:36',
            'updated_at'=>'2022-03-11 04:47:36'
            ] );



            Subcategory::create( [
            'id'=>150,
            'category_id'=>12,
            'subcategory_name'=>'Поиск информации',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:49:52',
            'updated_at'=>'2022-03-11 04:49:52'
            ] );



            Subcategory::create( [
            'id'=>151,
            'category_id'=>12,
            'subcategory_name'=>'Любая интеллектуальная работа',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:50:11',
            'updated_at'=>'2022-03-11 04:50:11'
            ] );



            Subcategory::create( [
            'id'=>152,
            'category_id'=>12,
            'subcategory_name'=>'Рутинная работа',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:50:39',
            'updated_at'=>'2022-03-11 04:50:39'
            ] );



            Subcategory::create( [
            'id'=>153,
            'category_id'=>12,
            'subcategory_name'=>'Менеджмент проектов',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:51:05',
            'updated_at'=>'2022-03-11 04:51:05'
            ] );



            Subcategory::create( [
            'id'=>154,
            'category_id'=>12,
            'subcategory_name'=>'Юридическая помощь',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:51:32',
            'updated_at'=>'2022-03-11 04:51:32'
            ] );



            Subcategory::create( [
            'id'=>155,
            'category_id'=>12,
            'subcategory_name'=>'Договор и доверенность',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:52:43',
            'updated_at'=>'2022-03-11 04:52:43'
            ] );



            Subcategory::create( [
            'id'=>156,
            'category_id'=>12,
            'subcategory_name'=>'Судебный документ',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:53:44',
            'updated_at'=>'2022-03-11 04:53:44'
            ] );



            Subcategory::create( [
            'id'=>157,
            'category_id'=>12,
            'subcategory_name'=>'Ведение ООО и ИП',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:54:43',
            'updated_at'=>'2022-03-11 04:54:43'
            ] );



            Subcategory::create( [
            'id'=>158,
            'category_id'=>12,
            'subcategory_name'=>'Юридическая консультация',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:55:03',
            'updated_at'=>'2022-03-11 04:55:03'
            ] );



            Subcategory::create( [
            'id'=>159,
            'category_id'=>12,
            'subcategory_name'=>'Подбор персонала',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:55:32',
            'updated_at'=>'2022-03-11 04:55:32'
            ] );



            Subcategory::create( [
            'id'=>160,
            'category_id'=>12,
            'subcategory_name'=>'Подбор резюме',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:55:57',
            'updated_at'=>'2022-03-11 04:55:57'
            ] );



            Subcategory::create( [
            'id'=>161,
            'category_id'=>12,
            'subcategory_name'=>'Найм специалиста',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:56:19',
            'updated_at'=>'2022-03-11 04:56:19'
            ] );



            Subcategory::create( [
            'id'=>162,
            'category_id'=>13,
            'subcategory_name'=>'Аренда квартир',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:23:42',
            'updated_at'=>'2022-03-11 05:23:42'
            ] );



            Subcategory::create( [
            'id'=>163,
            'category_id'=>13,
            'subcategory_name'=>'Аренда квартир посуточно',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:24:07',
            'updated_at'=>'2022-03-11 05:24:07'
            ] );



            Subcategory::create( [
            'id'=>164,
            'category_id'=>13,
            'subcategory_name'=>'Аренда домов, коттеджей',
            'price'=>250,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:24:35',
            'updated_at'=>'2022-03-11 05:24:35'
            ] );



            Subcategory::create( [
            'id'=>165,
            'category_id'=>13,
            'subcategory_name'=>'Оборудование разное',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:25:07',
            'updated_at'=>'2022-03-11 05:25:07'
            ] );



            Subcategory::create( [
            'id'=>166,
            'category_id'=>13,
            'subcategory_name'=>'Автомобили',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:25:27',
            'updated_at'=>'2022-03-11 05:25:27'
            ] );



            Subcategory::create( [
            'id'=>167,
            'category_id'=>13,
            'subcategory_name'=>'Автобетононасосы',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:25:59',
            'updated_at'=>'2022-03-11 05:25:59'
            ] );



            Subcategory::create( [
            'id'=>168,
            'category_id'=>13,
            'subcategory_name'=>'Автомобили-длинномеры',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:26:24',
            'updated_at'=>'2022-03-11 05:26:24'
            ] );



            Subcategory::create( [
            'id'=>169,
            'category_id'=>13,
            'subcategory_name'=>'Самосвалы',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:27:01',
            'updated_at'=>'2022-03-11 05:27:01'
            ] );



            Subcategory::create( [
            'id'=>170,
            'category_id'=>13,
            'subcategory_name'=>'Низкорамные платформы',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:27:32',
            'updated_at'=>'2022-03-11 05:27:32'
            ] );



            Subcategory::create( [
            'id'=>171,
            'category_id'=>13,
            'subcategory_name'=>'Автокраны и автовышки',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:27:54',
            'updated_at'=>'2022-03-11 05:27:54'
            ] );



            Subcategory::create( [
            'id'=>172,
            'category_id'=>13,
            'subcategory_name'=>'Экскаваторы и погрузчики',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:28:16',
            'updated_at'=>'2022-03-11 05:28:16'
            ] );



            Subcategory::create( [
            'id'=>173,
            'category_id'=>13,
            'subcategory_name'=>'Башенные краны',
            'price'=>1000,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:28:45',
            'updated_at'=>'2022-03-11 05:28:45'
            ] );



            Subcategory::create( [
            'id'=>174,
            'category_id'=>13,
            'subcategory_name'=>'Мини-экскаваторы и погрузчики',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:29:09',
            'updated_at'=>'2022-03-11 05:29:09'
            ] );



            Subcategory::create( [
            'id'=>175,
            'category_id'=>13,
            'subcategory_name'=>'Фотостудии',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:29:33',
            'updated_at'=>'2022-03-11 05:29:33'
            ] );



            Subcategory::create( [
            'id'=>176,
            'category_id'=>13,
            'subcategory_name'=>'Дорожная спецтехника',
            'price'=>800,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:29:54',
            'updated_at'=>'2022-03-11 05:29:54'
            ] );



            Subcategory::create( [
            'id'=>177,
            'category_id'=>13,
            'subcategory_name'=>'Ямобуры',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:30:16',
            'updated_at'=>'2022-03-11 05:30:16'
            ] );



            Subcategory::create( [
            'id'=>178,
            'category_id'=>13,
            'subcategory_name'=>'Илососы',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:30:38',
            'updated_at'=>'2022-03-11 05:30:38'
            ] );



            Subcategory::create( [
            'id'=>179,
            'category_id'=>13,
            'subcategory_name'=>'Автогидроподъёмники',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:31:00',
            'updated_at'=>'2022-03-11 05:31:00'
            ] );



            Subcategory::create( [
            'id'=>180,
            'category_id'=>13,
            'subcategory_name'=>'Скутеры',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:31:21',
            'updated_at'=>'2022-03-11 05:31:21'
            ] );



            Subcategory::create( [
            'id'=>181,
            'category_id'=>13,
            'subcategory_name'=>'Теплоходы',
            'price'=>900,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:31:41',
            'updated_at'=>'2022-03-11 05:31:41'
            ] );



            Subcategory::create( [
            'id'=>182,
            'category_id'=>13,
            'subcategory_name'=>'Автомобили под такси',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:32:01',
            'updated_at'=>'2022-03-11 05:32:01'
            ] );



            Subcategory::create( [
            'id'=>183,
            'category_id'=>13,
            'subcategory_name'=>'Лимузины',
            'price'=>700,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:32:22',
            'updated_at'=>'2022-03-11 05:32:22'
            ] );



            Subcategory::create( [
            'id'=>184,
            'category_id'=>13,
            'subcategory_name'=>'Вертолеты',
            'price'=>5000,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:32:49',
            'updated_at'=>'2022-03-11 05:32:49'
            ] );



            Subcategory::create( [
            'id'=>185,
            'category_id'=>13,
            'subcategory_name'=>'Строительные инструменты',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:33:06',
            'updated_at'=>'2022-03-11 05:33:06'
            ] );



            Subcategory::create( [
            'id'=>186,
            'category_id'=>13,
            'subcategory_name'=>'Лыжи и сноуборды',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:33:26',
            'updated_at'=>'2022-03-11 05:33:26'
            ] );



            Subcategory::create( [
            'id'=>187,
            'category_id'=>13,
            'subcategory_name'=>'Велосипеды',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:33:48',
            'updated_at'=>'2022-03-11 05:33:48'
            ] );



            Subcategory::create( [
            'id'=>188,
            'category_id'=>13,
            'subcategory_name'=>'Фото и видеотехника',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:34:13',
            'updated_at'=>'2022-03-11 05:34:13'
            ] );



            Subcategory::create( [
            'id'=>189,
            'category_id'=>13,
            'subcategory_name'=>'Гидроциклы',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:34:35',
            'updated_at'=>'2022-03-11 05:34:35'
            ] );



            Subcategory::create( [
            'id'=>190,
            'category_id'=>13,
            'subcategory_name'=>'Спортивный инвентарь',
            'price'=>350,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:35:00',
            'updated_at'=>'2022-03-11 05:35:00'
            ] );



            Subcategory::create( [
            'id'=>191,
            'category_id'=>13,
            'subcategory_name'=>'Мотоциклы',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:35:29',
            'updated_at'=>'2022-03-11 05:35:29'
            ] );



            Subcategory::create( [
            'id'=>192,
            'category_id'=>13,
            'subcategory_name'=>'Экскаваторы-планировщики',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:35:51',
            'updated_at'=>'2022-03-11 05:35:51'
            ] );



            Subcategory::create( [
            'id'=>193,
            'category_id'=>13,
            'subcategory_name'=>'Другое',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:36:10',
            'updated_at'=>'2022-03-11 05:36:10'
            ] );



            Subcategory::create( [
            'id'=>194,
            'category_id'=>14,
            'subcategory_name'=>'Услуги Фотографа',
            'price'=>600,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:37:47',
            'updated_at'=>'2022-03-11 05:37:47'
            ] );



            Subcategory::create( [
            'id'=>195,
            'category_id'=>14,
            'subcategory_name'=>'Фото на документы',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:38:14',
            'updated_at'=>'2022-03-11 05:38:14'
            ] );



            Subcategory::create( [
            'id'=>196,
            'category_id'=>14,
            'subcategory_name'=>'Постобработка',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:38:56',
            'updated_at'=>'2022-03-11 05:38:56'
            ] );



            Subcategory::create( [
            'id'=>197,
            'category_id'=>14,
            'subcategory_name'=>'Создание и монтаж видеороликов',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:39:43',
            'updated_at'=>'2022-03-11 05:39:43'
            ] );



            Subcategory::create( [
            'id'=>198,
            'category_id'=>14,
            'subcategory_name'=>'Видеосъемка',
            'price'=>700,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:40:10',
            'updated_at'=>'2022-03-11 05:40:10'
            ] );



            Subcategory::create( [
            'id'=>199,
            'category_id'=>14,
            'subcategory_name'=>'Модели для съемок',
            'price'=>800,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:41:28',
            'updated_at'=>'2022-03-11 05:41:28'
            ] );



            Subcategory::create( [
            'id'=>200,
            'category_id'=>14,
            'subcategory_name'=>'Создание 3D-видеороликов',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:41:51',
            'updated_at'=>'2022-03-11 05:41:51'
            ] );



            Subcategory::create( [
            'id'=>201,
            'category_id'=>14,
            'subcategory_name'=>'Запись музыки и песен',
            'price'=>1000,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:42:14',
            'updated_at'=>'2022-03-11 05:42:14'
            ] );



            Subcategory::create( [
            'id'=>202,
            'category_id'=>14,
            'subcategory_name'=>'Оцифровка',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:42:38',
            'updated_at'=>'2022-03-11 05:42:38'
            ] );



            Subcategory::create( [
            'id'=>203,
            'category_id'=>14,
            'subcategory_name'=>'Другое',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:44:56',
            'updated_at'=>'2022-03-11 05:44:56'
            ] );



            Subcategory::create( [
            'id'=>204,
            'category_id'=>15,
            'subcategory_name'=>'Ремонт одежды',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:46:03',
            'updated_at'=>'2022-03-11 05:46:03'
            ] );



            Subcategory::create( [
            'id'=>205,
            'category_id'=>15,
            'subcategory_name'=>'Уборка',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:46:28',
            'updated_at'=>'2022-03-11 05:46:28'
            ] );



            Subcategory::create( [
            'id'=>206,
            'category_id'=>15,
            'subcategory_name'=>'Ремонт обуви',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:46:48',
            'updated_at'=>'2022-03-11 05:46:48'
            ] );



            Subcategory::create( [
            'id'=>207,
            'category_id'=>15,
            'subcategory_name'=>'Химчистка одежды',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:47:14',
            'updated_at'=>'2022-03-11 05:47:14'
            ] );



            Subcategory::create( [
            'id'=>208,
            'category_id'=>15,
            'subcategory_name'=>'Няни',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:47:38',
            'updated_at'=>'2022-03-11 05:47:38'
            ] );



            Subcategory::create( [
            'id'=>209,
            'category_id'=>15,
            'subcategory_name'=>'Химчистка ковров и мебели',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:48:05',
            'updated_at'=>'2022-03-11 05:48:05'
            ] );



            Subcategory::create( [
            'id'=>210,
            'category_id'=>15,
            'subcategory_name'=>'Помощь в Саду и огороде',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:48:43',
            'updated_at'=>'2022-03-11 05:48:43'
            ] );



            Subcategory::create( [
            'id'=>211,
            'category_id'=>15,
            'subcategory_name'=>'Услуги Сиделки',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:49:44',
            'updated_at'=>'2022-03-11 05:49:44'
            ] );



            Subcategory::create( [
            'id'=>212,
            'category_id'=>15,
            'subcategory_name'=>'Уборка территории',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:50:12',
            'updated_at'=>'2022-03-11 05:50:12'
            ] );



            Subcategory::create( [
            'id'=>213,
            'category_id'=>15,
            'subcategory_name'=>'Спил и обрезка деревьев и кустарников',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:50:37',
            'updated_at'=>'2022-03-11 05:50:37'
            ] );



            Subcategory::create( [
            'id'=>214,
            'category_id'=>15,
            'subcategory_name'=>'Сиделки с проживанием',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:51:06',
            'updated_at'=>'2022-03-11 05:51:06'
            ] );



            Subcategory::create( [
            'id'=>215,
            'category_id'=>15,
            'subcategory_name'=>'Стирка',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:51:34',
            'updated_at'=>'2022-03-11 05:51:34'
            ] );



            Subcategory::create( [
            'id'=>216,
            'category_id'=>15,
            'subcategory_name'=>'Химчистка',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:51:58',
            'updated_at'=>'2022-03-11 05:51:58'
            ] );



            Subcategory::create( [
            'id'=>217,
            'category_id'=>15,
            'subcategory_name'=>'Другое',
            'price'=>80,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:52:29',
            'updated_at'=>'2022-03-11 05:52:29'
            ] );



            Subcategory::create( [
            'id'=>218,
            'category_id'=>16,
            'subcategory_name'=>'Представительство в суде',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:53:56',
            'updated_at'=>'2022-03-11 05:53:56'
            ] );



            Subcategory::create( [
            'id'=>219,
            'category_id'=>16,
            'subcategory_name'=>'Трудовые споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:54:20',
            'updated_at'=>'2022-03-11 05:54:20'
            ] );



            Subcategory::create( [
            'id'=>220,
            'category_id'=>16,
            'subcategory_name'=>'Взыскание долгов',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:54:54',
            'updated_at'=>'2022-03-11 05:54:54'
            ] );



            Subcategory::create( [
            'id'=>221,
            'category_id'=>16,
            'subcategory_name'=>'Семейные споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:55:26',
            'updated_at'=>'2022-03-11 05:55:26'
            ] );



            Subcategory::create( [
            'id'=>222,
            'category_id'=>16,
            'subcategory_name'=>'Жилищные споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:55:49',
            'updated_at'=>'2022-03-11 05:55:49'
            ] );



            Subcategory::create( [
            'id'=>223,
            'category_id'=>16,
            'subcategory_name'=>'Защита прав потребителей',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:56:13',
            'updated_at'=>'2022-03-11 05:56:13'
            ] );



            Subcategory::create( [
            'id'=>224,
            'category_id'=>16,
            'subcategory_name'=>'Кредитные споры',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:56:43',
            'updated_at'=>'2022-03-11 05:56:43'
            ] );



            Subcategory::create( [
            'id'=>225,
            'category_id'=>16,
            'subcategory_name'=>'Наследственные споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:57:05',
            'updated_at'=>'2022-03-11 05:57:05'
            ] );



            Subcategory::create( [
            'id'=>226,
            'category_id'=>16,
            'subcategory_name'=>'Автомобильные споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:57:25',
            'updated_at'=>'2022-03-11 05:57:25'
            ] );



            Subcategory::create( [
            'id'=>227,
            'category_id'=>16,
            'subcategory_name'=>'Юридические документы',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:59:02',
            'updated_at'=>'2022-03-11 05:59:02'
            ] );



            Subcategory::create( [
            'id'=>228,
            'category_id'=>16,
            'subcategory_name'=>'Налоговые споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:59:28',
            'updated_at'=>'2022-03-11 05:59:28'
            ] );



            Subcategory::create( [
            'id'=>229,
            'category_id'=>16,
            'subcategory_name'=>'Земельные споры',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:59:46',
            'updated_at'=>'2022-03-11 05:59:46'
            ] );



            Subcategory::create( [
            'id'=>230,
            'category_id'=>16,
            'subcategory_name'=>'Помощь в регистрации ООО и ИП',
            'price'=>250,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:00:29',
            'updated_at'=>'2022-03-11 06:00:29'
            ] );



            Subcategory::create( [
            'id'=>231,
            'category_id'=>16,
            'subcategory_name'=>'Проверка документов и договоров',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:01:50',
            'updated_at'=>'2022-03-11 06:01:50'
            ] );



            Subcategory::create( [
            'id'=>232,
            'category_id'=>16,
            'subcategory_name'=>'Юридическое сопровождение сделок',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:02:21',
            'updated_at'=>'2022-03-11 06:02:21'
            ] );



            Subcategory::create( [
            'id'=>233,
            'category_id'=>16,
            'subcategory_name'=>'Регистрационные услуги',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:02:45',
            'updated_at'=>'2022-03-11 06:02:45'
            ] );



            Subcategory::create( [
            'id'=>234,
            'category_id'=>16,
            'subcategory_name'=>'Тендеры',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:03:30',
            'updated_at'=>'2022-03-11 06:03:30'
            ] );



            Subcategory::create( [
            'id'=>235,
            'category_id'=>16,
            'subcategory_name'=>'Банкротство юридических лиц',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:03:52',
            'updated_at'=>'2022-03-11 06:03:52'
            ] );



            Subcategory::create( [
            'id'=>236,
            'category_id'=>16,
            'subcategory_name'=>'Проведение независимых экспертиз',
            'price'=>450,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:04:25',
            'updated_at'=>'2022-03-11 06:04:25'
            ] );



            Subcategory::create( [
            'id'=>237,
            'category_id'=>16,
            'subcategory_name'=>'Ликвидация юридических лиц',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:04:53',
            'updated_at'=>'2022-03-11 06:04:53'
            ] );
    }
}
