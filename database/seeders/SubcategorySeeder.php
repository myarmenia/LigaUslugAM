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
            'subcategory_name'=>'Համակարգչային օգնություն',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2021-12-21 02:17:30',
            'updated_at'=>'2022-03-08 14:06:07'
            ] );



            Subcategory::create( [
            'id'=>2,
            'category_id'=>1,
            'subcategory_name'=>'CMS կայքեր',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2021-12-21 02:26:17',
            'updated_at'=>'2021-12-21 02:26:17'
            ] );



            Subcategory::create( [
            'id'=>3,
            'category_id'=>1,
            'subcategory_name'=>'Ծրագրային ապահովման մշակում',
            'price'=>470,
            'status'=>'0',
            'created_at'=>'2021-12-21 02:33:45',
            'updated_at'=>'2021-12-21 02:33:45'
            ] );



            Subcategory::create( [
            'id'=>4,
            'category_id'=>1,
            'subcategory_name'=>'Ադմինիստրատիվ աշխատանք',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2021-12-22 12:07:10',
            'updated_at'=>'2021-12-22 12:07:10'
            ] );



            Subcategory::create( [
            'id'=>5,
            'category_id'=>1,
            'subcategory_name'=>'Կայքերի ստեղծում',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-01-21 09:12:32',
            'updated_at'=>'2022-01-21 09:12:32'
            ] );



            Subcategory::create( [
            'id'=>6,
            'category_id'=>1,
            'subcategory_name'=>'Քարթրիջների լիցքավորում',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 09:49:02',
            'updated_at'=>'2022-02-10 09:49:02'
            ] );



            Subcategory::create( [
            'id'=>7,
            'category_id'=>1,
            'subcategory_name'=>'Բջջային հավելվածի ստեղծում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 09:49:40',
            'updated_at'=>'2022-02-10 09:49:40'
            ] );



            Subcategory::create( [
            'id'=>8,
            'category_id'=>1,
            'subcategory_name'=>'Խաղերի ստեղծում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:50:23',
            'updated_at'=>'2022-02-10 09:50:23'
            ] );



            Subcategory::create( [
            'id'=>9,
            'category_id'=>1,
            'subcategory_name'=>'Այլ',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-10 09:51:33',
            'updated_at'=>'2022-02-10 09:51:33'
            ] );



            Subcategory::create( [
            'id'=>10,
            'category_id'=>2,
            'subcategory_name'=>'Անվադողերի սպասարկում',
            'price'=>100,
            'status'=>'',
            'created_at'=>'2022-02-10 09:54:25',
            'updated_at'=>'2022-02-10 09:54:25'
            ] );



            Subcategory::create( [
            'id'=>11,
            'category_id'=>2,
            'subcategory_name'=>'Թափքի վերանորոգում 1',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:54:25',
            'updated_at'=>'2022-03-02 05:02:04'
            ] );



            Subcategory::create( [
            'id'=>12,
            'category_id'=>2,
            'subcategory_name'=>'Ախտորոշում',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 09:55:16',
            'updated_at'=>'2022-02-10 09:55:16'
            ] );


            Subcategory::create( [
            'id'=>14,
            'category_id'=>2,
            'subcategory_name'=>'Ապակու փոխարինում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 09:57:10',
            'updated_at'=>'2022-02-10 09:57:10'
            ] );



            Subcategory::create( [
            'id'=>15,
            'category_id'=>2,
            'subcategory_name'=>'Մեքենայի կախոցներ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:06:18',
            'updated_at'=>'2022-02-10 10:06:18'
            ] );



            Subcategory::create( [
            'id'=>16,
            'category_id'=>2,
            'subcategory_name'=>'Ղեկ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:06:18',
            'updated_at'=>'2022-02-10 10:06:18'
            ] );


            Subcategory::create( [
            'id'=>18,
            'category_id'=>2,
            'subcategory_name'=>'Անիվների հավասարեցում',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:08:16',
            'updated_at'=>'2022-02-10 10:08:16'
            ] );



            Subcategory::create( [
            'id'=>19,
            'category_id'=>2,
            'subcategory_name'=>'Արգելակային համակարգ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:09:21',
            'updated_at'=>'2022-02-10 10:09:21'
            ] );



            Subcategory::create( [
            'id'=>20,
            'category_id'=>2,
            'subcategory_name'=>'Բեռնատարների վերանորոգում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:09:21',
            'updated_at'=>'2022-02-10 10:09:21'
            ] );


            Subcategory::create( [
            'id'=>22,
            'category_id'=>2,
            'subcategory_name'=>'Մեքենայի լվացում և խնամք',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 10:11:18',
            'updated_at'=>'2022-02-10 10:11:18'
            ] );



            Subcategory::create( [
            'id'=>23,
            'category_id'=>2,
            'subcategory_name'=>'Շարժիչի կապիտալ վերանորոգում ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:12:13',
            'updated_at'=>'2022-02-10 10:12:13'
            ] );



            Subcategory::create( [
            'id'=>24,
            'category_id'=>2,
            'subcategory_name'=>'Տեխնիկական սպասարկում',
            'price'=>100,
            'status'=>'',
            'created_at'=>'2022-02-10 10:12:13',
            'updated_at'=>'2022-02-10 10:12:13'
            ] );



            Subcategory::create( [
            'id'=>25,
            'category_id'=>2,
            'subcategory_name'=>'Թյունինգ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:13:22',
            'updated_at'=>'2022-02-10 10:13:22'
            ] );



            Subcategory::create( [
            'id'=>26,
            'category_id'=>2,
            'subcategory_name'=>'Էլեկտրասարքավորումներ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:13:22',
            'updated_at'=>'2022-02-10 10:13:22'
            ] );



            Subcategory::create( [
            'id'=>27,
            'category_id'=>2,
            'subcategory_name'=>'Շարժական անվադողերի տեղադրում',
            'price'=>180,
            'status'=>'',
            'created_at'=>'2022-02-10 10:14:30',
            'updated_at'=>'2022-02-10 10:14:30'
            ] );



            Subcategory::create( [
            'id'=>28,
            'category_id'=>2,
            'subcategory_name'=>'Մեքենայի ջեռուցում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:14:30',
            'updated_at'=>'2022-02-10 10:14:30'
            ] );



            Subcategory::create( [
            'id'=>29,
            'category_id'=>2,
            'subcategory_name'=>'Հատուկ սարքավորումների վերանորոգում',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:15:49',
            'updated_at'=>'2022-02-10 10:15:49'
            ] );



            Subcategory::create( [
            'id'=>30,
            'category_id'=>2,
            'subcategory_name'=>'Ներկում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:20:27',
            'updated_at'=>'2022-02-10 10:20:27'
            ] );



            Subcategory::create( [
            'id'=>31,
            'category_id'=>2,
            'subcategory_name'=>'Այլ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:18:28',
            'updated_at'=>'2022-02-10 10:18:28'
            ] );



            Subcategory::create( [
            'id'=>32,
            'category_id'=>3,
            'subcategory_name'=>'Բեռնափոխադրումներ',
            'price'=>55,
            'status'=>'',
            'created_at'=>'2022-02-10 10:49:49',
            'updated_at'=>'2022-02-10 10:49:49'
            ] );



            Subcategory::create( [
            'id'=>33,
            'category_id'=>3,
            'subcategory_name'=>'Շինանյութի տեղափոխում',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:49:49',
            'updated_at'=>'2022-02-10 10:49:49'
            ] );



            Subcategory::create( [
            'id'=>34,
            'category_id'=>3,
            'subcategory_name'=>'Բեռնիչի ծառայություններ',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-10 10:50:29',
            'updated_at'=>'2022-02-10 10:50:29'
            ] );



            Subcategory::create( [
            'id'=>35,
            'category_id'=>3,
            'subcategory_name'=>'Աղբի հեռացում',
            'price'=>60,
            'status'=>'',
            'created_at'=>'2022-02-10 10:51:44',
            'updated_at'=>'2022-02-10 10:51:44'
            ] );



            Subcategory::create( [
            'id'=>36,
            'category_id'=>3,
            'subcategory_name'=>'Միջքաղաքային տրանսպորտ',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-10 10:51:44',
            'updated_at'=>'2022-02-10 10:51:44'
            ] );



            Subcategory::create( [
            'id'=>37,
            'category_id'=>3,
            'subcategory_name'=>'Ապրանքների տեղափոխում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:52:59',
            'updated_at'=>'2022-02-10 10:52:59'
            ] );



            Subcategory::create( [
            'id'=>38,
            'category_id'=>3,
            'subcategory_name'=>'Առաքիչ',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:52:59',
            'updated_at'=>'2022-02-10 10:52:59'
            ] );



            Subcategory::create( [
            'id'=>39,
            'category_id'=>3,
            'subcategory_name'=>'Առաքիչ իր ավտոմեքենայով',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-10 10:54:13',
            'updated_at'=>'2022-02-10 10:54:13'
            ] );



            Subcategory::create( [
            'id'=>40,
            'category_id'=>3,
            'subcategory_name'=>'Մանիպուլյատորների ծառայություններ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:54:13',
            'updated_at'=>'2022-02-10 10:54:13'
            ] );



            Subcategory::create( [
            'id'=>41,
            'category_id'=>3,
            'subcategory_name'=>'Չափազանց մեծ բեռների տեղափոխում',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-10 10:55:33',
            'updated_at'=>'2022-02-10 10:55:33'
            ] );



            Subcategory::create( [
            'id'=>42,
            'category_id'=>3,
            'subcategory_name'=>'Ապրանքների տեղափոխում սառնարանով',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-10 10:55:33',
            'updated_at'=>'2022-02-10 10:55:33'
            ] );



            Subcategory::create( [
            'id'=>43,
            'category_id'=>3,
            'subcategory_name'=>'Քարշակ մեքենաներ',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-10 10:57:53',
            'updated_at'=>'2022-02-10 10:57:53'
            ] );



            Subcategory::create( [
            'id'=>44,
            'category_id'=>3,
            'subcategory_name'=>'Կենդանիների միջքաղաքային տեղափոխում',
            'price'=>450,
            'status'=>'',
            'created_at'=>'2022-02-10 10:57:53',
            'updated_at'=>'2022-02-10 10:57:53'
            ] );



            Subcategory::create( [
            'id'=>45,
            'category_id'=>3,
            'subcategory_name'=>'Միջքաղաքային տեղափոխում',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-10 10:58:42',
            'updated_at'=>'2022-02-10 10:58:42'
            ] );



            Subcategory::create( [
            'id'=>46,
            'category_id'=>3,
            'subcategory_name'=>'Այլ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-10 10:58:42',
            'updated_at'=>'2022-02-10 10:58:42'
            ] );



            Subcategory::create( [
            'id'=>47,
            'category_id'=>4,
            'subcategory_name'=>'Զբոսանք',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:07:08',
            'updated_at'=>'2022-02-17 07:07:08'
            ] );



            Subcategory::create( [
            'id'=>48,
            'category_id'=>4,
            'subcategory_name'=>'Կենդանիների մազերի խնամք',
            'price'=>80,
            'status'=>'',
            'created_at'=>'2022-02-17 07:07:08',
            'updated_at'=>'2022-02-17 07:07:08'
            ] );



            Subcategory::create( [
            'id'=>49,
            'category_id'=>4,
            'subcategory_name'=>'Տեղափոխում',
            'price'=>70,
            'status'=>'',
            'created_at'=>'2022-02-17 07:10:07',
            'updated_at'=>'2022-02-17 07:10:07'
            ] );



            Subcategory::create( [
            'id'=>50,
            'category_id'=>4,
            'subcategory_name'=>'Պահել',
            'price'=>90,
            'status'=>'',
            'created_at'=>'2022-02-17 07:10:07',
            'updated_at'=>'2022-02-17 07:10:07'
            ] );


            ////////
            Subcategory::create( [
            'id'=>53,
            'category_id'=>4,
            'subcategory_name'=>'Տոհմաբանության կազմում',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:17:20',
            'updated_at'=>'2022-02-17 07:17:20'
            ] );



            Subcategory::create( [
            'id'=>54,
            'category_id'=>4,
            'subcategory_name'=>'Վարժեցում',
            'price'=>900,
            'status'=>'',
            'created_at'=>'2022-02-17 07:17:20',
            'updated_at'=>'2022-02-17 07:17:20'
            ] );



            Subcategory::create( [
            'id'=>55,
            'category_id'=>4,
            'subcategory_name'=>'Եղունգների կտրում',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:17:59',
            'updated_at'=>'2022-02-17 07:17:59'
            ] );



            Subcategory::create( [
            'id'=>56,
            'category_id'=>5,
            'subcategory_name'=>'Էլեկտրամոնտաժային աշխատանքներ',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:22:01',
            'updated_at'=>'2022-02-17 07:22:01'
            ] );



            Subcategory::create( [
            'id'=>57,
            'category_id'=>5,
            'subcategory_name'=>'Կահույքի պատրաստում',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:22:01',
            'updated_at'=>'2022-02-17 07:22:01'
            ] );



            Subcategory::create( [
            'id'=>58,
            'category_id'=>5,
            'subcategory_name'=>'Խոհանոցի պատրաստում',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:23:12',
            'updated_at'=>'2022-02-17 07:23:12'
            ] );



            Subcategory::create( [
            'id'=>59,
            'category_id'=>5,
            'subcategory_name'=>'Սալիկի աշխատանքներ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:23:12',
            'updated_at'=>'2022-02-17 07:23:12'
            ] );



            Subcategory::create( [
            'id'=>60,
            'category_id'=>5,
            'subcategory_name'=>'Մայթաքարերի տեղադրում',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:24:46',
            'updated_at'=>'2022-02-17 07:24:46'
            ] );



            Subcategory::create( [
            'id'=>61,
            'category_id'=>5,
            'subcategory_name'=>'Բետոնի աշխատանքներ',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:24:46',
            'updated_at'=>'2022-02-17 07:24:46'
            ] );



            Subcategory::create( [
            'id'=>62,
            'category_id'=>5,
            'subcategory_name'=>'Սանտեխնիկական աշխատանքներ, ջրամատակարարում, կոյուղի և ջեռուցում',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:26:11',
            'updated_at'=>'2022-02-17 07:26:11'
            ] );



            Subcategory::create( [
            'id'=>63,
            'category_id'=>5,
            'subcategory_name'=>'Սանտեխնիկական աշխատանքներ, ջրամատակարարում, կոյուղի և ջեռուցում առանձնատներում',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:26:11',
            'updated_at'=>'2022-02-17 07:26:11'
            ] );



            Subcategory::create( [
            'id'=>64,
            'category_id'=>5,
            'subcategory_name'=>'Սանտեխնիկական աշխատանքներ, ջրամատակարարում, կոյուղի և ջեռուցում շուկաներում',
            'price'=>3000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:27:29',
            'updated_at'=>'2022-02-17 07:27:29'
            ] );



            Subcategory::create( [
            'id'=>65,
            'category_id'=>5,
            'subcategory_name'=>'Սանտեխնիկական աշխատանքներ, ջրամատակարարում, կոյուղի և ջեռուցման արդյունաբերական շենքերում',
            'price'=>4000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:27:29',
            'updated_at'=>'2022-02-17 07:27:29'
            ] );



            Subcategory::create( [
            'id'=>66,
            'category_id'=>5,
            'subcategory_name'=>'Սանտեխնիկայի վերանորոգում',
            'price'=>80,
            'status'=>'',
            'created_at'=>'2022-02-17 07:28:50',
            'updated_at'=>'2022-02-17 07:28:50'
            ] );



            Subcategory::create( [
            'id'=>67,
            'category_id'=>5,
            'subcategory_name'=>'Ճակատային աշխատանքների իրականացում',
            'price'=>3000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:28:50',
            'updated_at'=>'2022-02-17 07:28:50'
            ] );



            Subcategory::create( [
            'id'=>68,
            'category_id'=>5,
            'subcategory_name'=>'Փայտե տների, լոգարանների, սաունաների հարդարում։ Ցանկապատեր և պարիսպներ',
            'price'=>800,
            'status'=>'',
            'created_at'=>'2022-02-17 07:31:25',
            'updated_at'=>'2022-02-17 07:31:25'
            ] );


            Subcategory::create( [
            'id'=>70,
            'category_id'=>5,
            'subcategory_name'=>'Կահույքի հավաքում և վերանորոգում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:32:57',
            'updated_at'=>'2022-02-17 07:32:57'
            ] );



            Subcategory::create( [
            'id'=>71,
            'category_id'=>5,
            'subcategory_name'=>'Ձգվող առաստաղ',
            'price'=>280,
            'status'=>'',
            'created_at'=>'2022-02-17 07:32:57',
            'updated_at'=>'2022-02-17 07:32:57'
            ] );



            Subcategory::create( [
            'id'=>72,
            'category_id'=>5,
            'subcategory_name'=>'Պատշգամբի վերանորոգում',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:35:53',
            'updated_at'=>'2022-02-17 07:35:53'
            ] );



            Subcategory::create( [
            'id'=>73,
            'category_id'=>5,
            'subcategory_name'=>'Պատշգամբների ապակեպատում',
            'price'=>750,
            'status'=>'',
            'created_at'=>'2022-02-17 07:35:53',
            'updated_at'=>'2022-02-17 07:35:53'
            ] );



            Subcategory::create( [
            'id'=>74,
            'category_id'=>5,
            'subcategory_name'=>'Սանհանգույցի վերանորոգում',
            'price'=>1800,
            'status'=>'',
            'created_at'=>'2022-02-17 07:37:14',
            'updated_at'=>'2022-02-17 07:37:14'
            ] );



            Subcategory::create( [
            'id'=>75,
            'category_id'=>5,
            'subcategory_name'=>'Տների, քոթեջների կառուցում',
            'price'=>10000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:37:14',
            'updated_at'=>'2022-02-17 07:37:14'
            ] );



            Subcategory::create( [
            'id'=>76,
            'category_id'=>5,
            'subcategory_name'=>'Վարպետ մեկ ժամով, ցանկացած կարճաժամկետ աշխատանքի համար',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 07:38:21',
            'updated_at'=>'2022-02-17 07:38:21'
            ] );



            Subcategory::create( [
            'id'=>77,
            'category_id'=>5,
            'subcategory_name'=>'Պաստառ և ներկման աշխատանքներ',
            'price'=>700,
            'status'=>'',
            'created_at'=>'2022-02-17 07:38:21',
            'updated_at'=>'2022-02-17 07:38:21'
            ] );



            Subcategory::create( [
            'id'=>78,
            'category_id'=>5,
            'subcategory_name'=>'Քանդում և ապամոնտաժում',
            'price'=>700,
            'status'=>'',
            'created_at'=>'2022-02-17 07:39:27',
            'updated_at'=>'2022-02-17 07:39:27'
            ] );



            Subcategory::create( [
            'id'=>79,
            'category_id'=>5,
            'subcategory_name'=>'Շինարարական ավտոտնակ',
            'price'=>4500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:39:27',
            'updated_at'=>'2022-02-17 07:39:27'
            ] );



            Subcategory::create( [
            'id'=>80,
            'category_id'=>5,
            'subcategory_name'=>'Եռակցման աշխատանքներ, կարճաժամկետ աշխատանք',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 07:40:46',
            'updated_at'=>'2022-02-17 07:40:46'
            ] );



            Subcategory::create( [
            'id'=>81,
            'category_id'=>5,
            'subcategory_name'=>'Պեղում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:40:46',
            'updated_at'=>'2022-02-17 07:40:46'
            ] );



            Subcategory::create( [
            'id'=>82,
            'category_id'=>5,
            'subcategory_name'=>'Աստիճանների տեղադրում',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:42:07',
            'updated_at'=>'2022-02-17 07:42:07'
            ] );



            Subcategory::create( [
            'id'=>83,
            'category_id'=>5,
            'subcategory_name'=>'Աշխատանք բարձրության վրա՝ առանց սարքավորումների',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:42:07',
            'updated_at'=>'2022-02-17 07:42:07'
            ] );



            Subcategory::create( [
            'id'=>84,
            'category_id'=>5,
            'subcategory_name'=>'Գազի զոդում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:43:37',
            'updated_at'=>'2022-02-17 07:43:37'
            ] );



            Subcategory::create( [
            'id'=>85,
            'category_id'=>5,
            'subcategory_name'=>'Ցածր հոսանքի համակարգ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:43:37',
            'updated_at'=>'2022-02-17 07:43:37'
            ] );



            Subcategory::create( [
            'id'=>86,
            'category_id'=>5,
            'subcategory_name'=>'Փականների վերանորոգում և տեղադրում',
            'price'=>100,
            'status'=>'',
            'created_at'=>'2022-02-17 07:45:18',
            'updated_at'=>'2022-02-17 07:45:18'
            ] );



            Subcategory::create( [
            'id'=>87,
            'category_id'=>5,
            'subcategory_name'=>'Լոգարանների վերականգնում և էմալապատում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:45:18',
            'updated_at'=>'2022-02-17 07:45:18'
            ] );



            Subcategory::create( [
            'id'=>88,
            'category_id'=>5,
            'subcategory_name'=>'Մետաղական կոնստրուկցիաների ապամոնտաժում',
            'price'=>400,
            'status'=>'',
            'created_at'=>'2022-02-17 07:46:31',
            'updated_at'=>'2022-02-17 07:46:31'
            ] );



            Subcategory::create( [
            'id'=>89,
            'category_id'=>5,
            'subcategory_name'=>'Օդափոխում',
            'price'=>2000,
            'status'=>'',
            'created_at'=>'2022-02-17 07:46:31',
            'updated_at'=>'2022-02-17 07:46:31'
            ] );



            Subcategory::create( [
            'id'=>90,
            'category_id'=>5,
            'subcategory_name'=>'Ալմազով կտրում',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:48:13',
            'updated_at'=>'2022-02-17 07:48:13'
            ] );



            Subcategory::create( [
            'id'=>91,
            'category_id'=>5,
            'subcategory_name'=>'Խողովակների մաքրում',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:48:13',
            'updated_at'=>'2022-02-17 07:48:13'
            ] );



            Subcategory::create( [
            'id'=>92,
            'category_id'=>5,
            'subcategory_name'=>'Գլանափեղկեր և սեկցիոն դռներ',
            'price'=>600,
            'status'=>'',
            'created_at'=>'2022-02-17 07:50:05',
            'updated_at'=>'2022-02-17 07:50:05'
            ] );



            Subcategory::create( [
            'id'=>93,
            'category_id'=>5,
            'subcategory_name'=>'Բանալիների արտադրություն',
            'price'=>50,
            'status'=>'',
            'created_at'=>'2022-02-17 07:50:05',
            'updated_at'=>'2022-02-17 07:50:05'
            ] );



            Subcategory::create( [
            'id'=>94,
            'category_id'=>5,
            'subcategory_name'=>'Ալեհավաքի կարգավորումներ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:04',
            'updated_at'=>'2022-02-17 07:51:04'
            ] );



            Subcategory::create( [
            'id'=>95,
            'category_id'=>5,
            'subcategory_name'=>'Կանաչապատում',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:04',
            'updated_at'=>'2022-02-17 07:51:04'
            ] );



            Subcategory::create( [
            'id'=>96,
            'category_id'=>5,
            'subcategory_name'=>'Սվազ և խճանկար',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:58',
            'updated_at'=>'2022-02-17 07:51:58'
            ] );



            Subcategory::create( [
            'id'=>97,
            'category_id'=>5,
            'subcategory_name'=>'Փափուկ կահույքի պաստառապատում և վերանորոգում',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-17 07:51:58',
            'updated_at'=>'2022-02-17 07:51:58'
            ] );



            Subcategory::create( [
            'id'=>98,
            'category_id'=>5,
            'subcategory_name'=>'Դարբնոցային արտադրություն',
            'price'=>800,
            'status'=>'',
            'created_at'=>'2022-02-17 07:56:54',
            'updated_at'=>'2022-02-17 07:56:54'
            ] );



            Subcategory::create( [
            'id'=>99,
            'category_id'=>5,
            'subcategory_name'=>'Պլաստիկ պատուհանի փոխարինում',
            'price'=>400,
            'status'=>'',
            'created_at'=>'2022-02-17 07:56:54',
            'updated_at'=>'2022-02-17 07:56:54'
            ] );



            Subcategory::create( [
            'id'=>100,
            'category_id'=>5,
            'subcategory_name'=>'Եռակցման աշխատանքներ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 07:58:07',
            'updated_at'=>'2022-02-17 07:58:07'
            ] );



            Subcategory::create( [
            'id'=>101,
            'category_id'=>5,
            'subcategory_name'=>'Լոգարանների, սաունաների կառուցում',
            'price'=>1200,
            'status'=>'',
            'created_at'=>'2022-02-17 07:58:07',
            'updated_at'=>'2022-02-17 07:58:07'
            ] );



            Subcategory::create( [
            'id'=>102,
            'category_id'=>5,
            'subcategory_name'=>'Բնակարանի վերանորոգում',
            'price'=>5000,
            'status'=>'',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Subcategory::create( [
            'id'=>103,
            'category_id'=>5,
            'subcategory_name'=>'Տանիքապատում',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:08:05',
            'updated_at'=>'2022-02-17 08:08:05'
            ] );



            Subcategory::create( [
            'id'=>104,
            'category_id'=>5,
            'subcategory_name'=>'Գրասենյակի վերանորոգում',
            'price'=>1400,
            'status'=>'',
            'created_at'=>'2022-02-17 08:08:05',
            'updated_at'=>'2022-02-17 08:08:05'
            ] );



            Subcategory::create( [
            'id'=>105,
            'category_id'=>5,
            'subcategory_name'=>'Անվտանգության համակարգեր և մուտքի վերահսկում',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:15:32',
            'updated_at'=>'2022-02-17 08:15:32'
            ] );



            Subcategory::create( [
            'id'=>106,
            'category_id'=>5,
            'subcategory_name'=>'Զգեստապահարանների արտադրություն',
            'price'=>800,
            'status'=>'',
            'created_at'=>'2022-02-17 08:15:32',
            'updated_at'=>'2022-02-17 08:15:32'
            ] );



            Subcategory::create( [
            'id'=>107,
            'category_id'=>5,
            'subcategory_name'=>'Ներքին դռների տեղադրում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:16:53',
            'updated_at'=>'2022-02-17 08:16:53'
            ] );



            Subcategory::create( [
            'id'=>108,
            'category_id'=>5,
            'subcategory_name'=>'Արդյունաբերական հատակներ',
            'price'=>3000,
            'status'=>'',
            'created_at'=>'2022-02-17 08:16:53',
            'updated_at'=>'2022-02-17 08:16:53'
            ] );



            Subcategory::create( [
            'id'=>109,
            'category_id'=>5,
            'subcategory_name'=>'Հորատանցք հորատում',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 08:18:11',
            'updated_at'=>'2022-02-17 08:18:11'
            ] );



            Subcategory::create( [
            'id'=>110,
            'category_id'=>5,
            'subcategory_name'=>'Պատերի տեղադրում գիպսաստվարաթղթով',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 08:18:11',
            'updated_at'=>'2022-02-17 08:18:11'
            ] );


                ///////////
            Subcategory::create( [
            'id'=>111,
            'category_id'=>5,
            'subcategory_name'=>'Էլեկտրական կաթսաների վերանորոգում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:19:02',
            'updated_at'=>'2022-02-17 08:19:02'
            ] );



            Subcategory::create( [
            'id'=>112,
            'category_id'=>5,
            'subcategory_name'=>'Վառարանների և բուխարիների տեղադրում',
            'price'=>1500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:19:02',
            'updated_at'=>'2022-02-17 08:19:02'
            ] );



            Subcategory::create( [
            'id'=>113,
            'category_id'=>5,
            'subcategory_name'=>'Հյուսնային և ատաղձագործական աշխատանքներ',
            'price'=>500,
            'status'=>'',
            'created_at'=>'2022-02-17 08:20:07',
            'updated_at'=>'2022-02-17 08:20:07'
            ] );



            Subcategory::create( [
            'id'=>114,
            'category_id'=>5,
            'subcategory_name'=>'Վարագույրների տեղադրում',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 08:20:07',
            'updated_at'=>'2022-02-17 08:20:07'
            ] );



            Subcategory::create( [
            'id'=>115,
            'category_id'=>5,
            'subcategory_name'=>'Համակցված փականների վերանորոգում և տեղադրում',
            'price'=>250,
            'status'=>'',
            'created_at'=>'2022-02-17 08:23:23',
            'updated_at'=>'2022-02-17 08:23:23'
            ] );



            Subcategory::create( [
            'id'=>116,
            'category_id'=>5,
            'subcategory_name'=>'Ապակեգործի ծառայություններ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:23:23',
            'updated_at'=>'2022-02-17 08:23:23'
            ] );



            Subcategory::create( [
            'id'=>117,
            'category_id'=>5,
            'subcategory_name'=>'Փայտից դռների պատրաստում',
            'price'=>350,
            'status'=>'',
            'created_at'=>'2022-02-17 08:25:18',
            'updated_at'=>'2022-02-17 08:25:18'
            ] );



            Subcategory::create( [
            'id'=>118,
            'category_id'=>5,
            'subcategory_name'=>'Հաշվիչների ստուգում',
            'price'=>150,
            'status'=>'',
            'created_at'=>'2022-02-17 08:25:18',
            'updated_at'=>'2022-02-17 08:25:18'
            ] );

            Subcategory::create( [
            'id'=>119,
            'category_id'=>5,
            'subcategory_name'=>'Պատի նկարչություն',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:26:46',
            'updated_at'=>'2022-02-17 08:26:46'
            ] );

            Subcategory::create( [
            'id'=>120,
            'category_id'=>5,
            'subcategory_name'=>'Շենքի նախագծում',
            'price'=>1000,
            'status'=>'',
            'created_at'=>'2022-02-17 08:26:46',
            'updated_at'=>'2022-02-17 08:26:46'
            ] );



            Subcategory::create( [
            'id'=>125,
            'category_id'=>5,
            'subcategory_name'=>'Ֆասադների հերմետիկացում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:30:14',
            'updated_at'=>'2022-02-17 08:30:14'
            ] );



            Subcategory::create( [
            'id'=>126,
            'category_id'=>5,
            'subcategory_name'=>'Այլ',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 08:30:14',
            'updated_at'=>'2022-02-17 08:30:14'
            ] );



            Subcategory::create( [
            'id'=>127,
            'category_id'=>6,
            'subcategory_name'=>'Ախտահանման ծառայություններ',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:35:52',
            'updated_at'=>'2022-02-17 08:35:52'
            ] );



            Subcategory::create( [
            'id'=>128,
            'category_id'=>6,
            'subcategory_name'=>'Տարածքի ախտահանում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:35:52',
            'updated_at'=>'2022-02-17 08:35:52'
            ] );



            Subcategory::create( [
            'id'=>129,
            'category_id'=>6,
            'subcategory_name'=>'Ախտահանում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:39:44',
            'updated_at'=>'2022-02-17 08:39:44'
            ] );



            Subcategory::create( [
            'id'=>130,
            'category_id'=>6,
            'subcategory_name'=>'Ազատվել բորբոսից և սնկից',
            'price'=>300,
            'status'=>'',
            'created_at'=>'2022-02-17 08:39:44',
            'updated_at'=>'2022-02-17 08:39:44'
            ] );

            Subcategory::create( [
            'id'=>134,
            'category_id'=>6,
            'subcategory_name'=>'Ուտիճների ոչնչացում',
            'price'=>200,
            'status'=>'',
            'created_at'=>'2022-02-17 08:51:22',
            'updated_at'=>'2022-02-17 08:51:22'
            ] );



            Subcategory::create( [
            'id'=>135,
            'category_id'=>6,
            'subcategory_name'=>'Կրծողների ոչնչացում',
            'price'=>200,
            'status'=>' ',
            'created_at'=>'2022-02-17 08:53:22',
            'updated_at'=>'2022-02-17 08:53:22'
            ] );



            Subcategory::create( [
            'id'=>142,
            'category_id'=>9,
            'subcategory_name'=>'Վեբ դիզայներ',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:39:19',
            'updated_at'=>'2022-03-11 04:39:19'
            ] );



            Subcategory::create( [
            'id'=>143,
            'category_id'=>6,
            'subcategory_name'=>'Ինտերիերի դիզայներ',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:40:18',
            'updated_at'=>'2022-03-11 04:41:11'
            ] );



            Subcategory::create( [
            'id'=>144,
            'category_id'=>9,
            'subcategory_name'=>'Գրաֆիկական դիզայներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:41:45',
            'updated_at'=>'2022-03-11 04:41:45'
            ] );



            Subcategory::create( [
            'id'=>145,
            'category_id'=>9,
            'subcategory_name'=>'UX/UI դիզայներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:42:24',
            'updated_at'=>'2022-03-11 04:42:24'
            ] );



            Subcategory::create( [
            'id'=>146,
            'category_id'=>9,
            'subcategory_name'=>'Փաթեթավորում և գովազդ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:42:46',
            'updated_at'=>'2022-03-11 04:42:46'
            ] );



            Subcategory::create( [
            'id'=>147,
            'category_id'=>9,
            'subcategory_name'=>'Լանդշաֆտային դիզայներ',
            'price'=>1000,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:43:16',
            'updated_at'=>'2022-03-11 04:43:16'
            ] );



            Subcategory::create( [
            'id'=>148,
            'category_id'=>14,
            'subcategory_name'=>'Անձնական օգնական',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:47:06',
            'updated_at'=>'2022-03-11 04:47:06'
            ] );



            Subcategory::create( [
            'id'=>149,
            'category_id'=>12,
            'subcategory_name'=>'Աշխատանք MS Office-ով',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:47:36',
            'updated_at'=>'2022-03-11 04:47:36'
            ] );



            Subcategory::create( [
            'id'=>150,
            'category_id'=>12,
            'subcategory_name'=>'Տեղեկությունների որոնում',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:49:52',
            'updated_at'=>'2022-03-11 04:49:52'
            ] );



            Subcategory::create( [
            'id'=>151,
            'category_id'=>12,
            'subcategory_name'=>'Ցանկացած ինտելեկտուալ աշխատանք',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:50:11',
            'updated_at'=>'2022-03-11 04:50:11'
            ] );



            Subcategory::create( [
            'id'=>152,
            'category_id'=>12,
            'subcategory_name'=>'Սովորական աշխատանք',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:50:39',
            'updated_at'=>'2022-03-11 04:50:39'
            ] );



            Subcategory::create( [
            'id'=>153,
            'category_id'=>12,
            'subcategory_name'=>'Ծրագրի կառավարում',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:51:05',
            'updated_at'=>'2022-03-11 04:51:05'
            ] );



            Subcategory::create( [
            'id'=>154,
            'category_id'=>14,
            'subcategory_name'=>'Իրավաբանական օգնություն',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:51:32',
            'updated_at'=>'2022-03-11 04:51:32'
            ] );



            Subcategory::create( [
            'id'=>155,
            'category_id'=>14,
            'subcategory_name'=>'Համաձայնագիր և լիազորագիր',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:52:43',
            'updated_at'=>'2022-03-11 04:52:43'
            ] );



            Subcategory::create( [
            'id'=>156,
            'category_id'=>14,
            'subcategory_name'=>'Դատական ​​փաստաթուղթ',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:53:44',
            'updated_at'=>'2022-03-11 04:53:44'
            ] );



            Subcategory::create( [
            'id'=>157,
            'category_id'=>14,
            'subcategory_name'=>'ՍՊԸ-ների և անհատ ձեռնարկատերերի կառավարում',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:54:43',
            'updated_at'=>'2022-03-11 04:54:43'
            ] );



            Subcategory::create( [
            'id'=>158,
            'category_id'=>14,
            'subcategory_name'=>'Իրավաբանական խորհրդատվություն',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:55:03',
            'updated_at'=>'2022-03-11 04:55:03'
            ] );



            Subcategory::create( [
            'id'=>159,
            'category_id'=>14,
            'subcategory_name'=>'Աշխատողների հավաքագրում',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:55:32',
            'updated_at'=>'2022-03-11 04:55:32'
            ] );



            Subcategory::create( [
            'id'=>160,
            'category_id'=>12,
            'subcategory_name'=>'Ռեզյումեների պատրաստում',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:55:57',
            'updated_at'=>'2022-03-11 04:55:57'
            ] );



            Subcategory::create( [
            'id'=>161,
            'category_id'=>14,
            'subcategory_name'=>'Վարձել մասնագետ',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 04:56:19',
            'updated_at'=>'2022-03-11 04:56:19'
            ] );



            Subcategory::create( [
            'id'=>162,
            'category_id'=>13,
            'subcategory_name'=>'Բնակարանների վարձակալություն',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:23:42',
            'updated_at'=>'2022-03-11 05:23:42'
            ] );



            Subcategory::create( [
            'id'=>163,
            'category_id'=>13,
            'subcategory_name'=>'Բնակարանների վարձակալություն օրավարձով',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:24:07',
            'updated_at'=>'2022-03-11 05:24:07'
            ] );



            Subcategory::create( [
            'id'=>164,
            'category_id'=>13,
            'subcategory_name'=>'Վարձակալություն ՝ տների, քոթեջների',
            'price'=>250,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:24:35',
            'updated_at'=>'2022-03-11 05:24:35'
            ] );



            Subcategory::create( [
            'id'=>165,
            'category_id'=>13,
            'subcategory_name'=>'Տարբեր սարքավորումներ',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:25:07',
            'updated_at'=>'2022-03-11 05:25:07'
            ] );



            Subcategory::create( [
            'id'=>166,
            'category_id'=>13,
            'subcategory_name'=>'Ավտոմեքենաներ',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:25:27',
            'updated_at'=>'2022-03-11 05:25:27'
            ] );



            Subcategory::create( [
            'id'=>167,
            'category_id'=>13,
            'subcategory_name'=>'Բետոնե պոմպեր',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:25:59',
            'updated_at'=>'2022-03-11 05:25:59'
            ] );



            Subcategory::create( [
            'id'=>168,
            'category_id'=>13,
            'subcategory_name'=>'Երկարաթափք մեքենաներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:26:24',
            'updated_at'=>'2022-03-11 05:26:24'
            ] );



            Subcategory::create( [
            'id'=>169,
            'category_id'=>13,
            'subcategory_name'=>'Ինքնաթափ բեռնատարներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:27:01',
            'updated_at'=>'2022-03-11 05:27:01'
            ] );


                /////////////
            Subcategory::create( [
            'id'=>170,
            'category_id'=>13,
            'subcategory_name'=>'Ցածրաբեռնիչ հարթակներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:27:32',
            'updated_at'=>'2022-03-11 05:27:32'
            ] );



            Subcategory::create( [
            'id'=>171,
            'category_id'=>13,
            'subcategory_name'=>'Բեռնատար Կռունկներ',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:27:54',
            'updated_at'=>'2022-03-11 05:27:54'
            ] );



            Subcategory::create( [
            'id'=>172,
            'category_id'=>13,
            'subcategory_name'=>'Էքսկավատորներ և բանվորներ',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:28:16',
            'updated_at'=>'2022-03-11 05:28:16'
            ] );

            Subcategory::create( [
            'id'=>173,
            'category_id'=>13,
            'subcategory_name'=>'Աշտարակային կռունկներ',
            'price'=>1000,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:28:45',
            'updated_at'=>'2022-03-11 05:28:45'
            ] );

            Subcategory::create( [
            'id'=>174,
            'category_id'=>13,
            'subcategory_name'=>'Մինի էքսկավատորներ և բանվորներ',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:29:09',
            'updated_at'=>'2022-03-11 05:29:09'
            ] );



            Subcategory::create( [
            'id'=>175,
            'category_id'=>13,
            'subcategory_name'=>'Ֆոտոստուդիաներ',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:29:33',
            'updated_at'=>'2022-03-11 05:29:33'
            ] );



            Subcategory::create( [
            'id'=>176,
            'category_id'=>13,
            'subcategory_name'=>'Ճանապարհային Հատուկ տեխնիկա',
            'price'=>800,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:29:54',
            'updated_at'=>'2022-03-11 05:29:54'
            ] );



            Subcategory::create( [
            'id'=>177,
            'category_id'=>13,
            'subcategory_name'=>'Փոս փորող բուրեր',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:30:16',
            'updated_at'=>'2022-03-11 05:30:16'
            ] );

            Subcategory::create( [
            'id'=>179,
            'category_id'=>13,
            'subcategory_name'=>'Ավտոհիդրավլիկ վերելակներ',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:31:00',
            'updated_at'=>'2022-03-11 05:31:00'
            ] );



            Subcategory::create( [
            'id'=>180,
            'category_id'=>13,
            'subcategory_name'=>'Սկուտերներ',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:31:21',
            'updated_at'=>'2022-03-11 05:31:21'
            ] );

            Subcategory::create( [
            'id'=>182,
            'category_id'=>13,
            'subcategory_name'=>'Վարձով մեքենաներ տաքսիի համար',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:32:01',
            'updated_at'=>'2022-03-11 05:32:01'
            ] );



            Subcategory::create( [
            'id'=>183,
            'category_id'=>13,
            'subcategory_name'=>'Լիմուզին',
            'price'=>700,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:32:22',
            'updated_at'=>'2022-03-11 05:32:22'
            ] );

            Subcategory::create( [
            'id'=>185,
            'category_id'=>13,
            'subcategory_name'=>'Շինարարական գործիքներ',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:33:06',
            'updated_at'=>'2022-03-11 05:33:06'
            ] );



            Subcategory::create( [
            'id'=>186,
            'category_id'=>13,
            'subcategory_name'=>'Դահուկներ և սնոուբորդներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:33:26',
            'updated_at'=>'2022-03-11 05:33:26'
            ] );



            Subcategory::create( [
            'id'=>187,
            'category_id'=>13,
            'subcategory_name'=>'Հեծանիվներ',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:33:48',
            'updated_at'=>'2022-03-11 05:33:48'
            ] );



            Subcategory::create( [
            'id'=>188,
            'category_id'=>13,
            'subcategory_name'=>'Ֆոտո և վիդեոտեխնիկա',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:34:13',
            'updated_at'=>'2022-03-11 05:34:13'
            ] );


            Subcategory::create( [
            'id'=>190,
            'category_id'=>13,
            'subcategory_name'=>'Սպորտային սարքավորումներ',
            'price'=>350,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:35:00',
            'updated_at'=>'2022-03-11 05:35:00'
            ] );



            Subcategory::create( [
            'id'=>191,
            'category_id'=>13,
            'subcategory_name'=>'Մոտոցիկլներ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:35:29',
            'updated_at'=>'2022-03-11 05:35:29'
            ] );


            Subcategory::create( [
            'id'=>193,
            'category_id'=>13,
            'subcategory_name'=>'Այլ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:36:10',
            'updated_at'=>'2022-03-11 05:36:10'
            ] );



            Subcategory::create( [
            'id'=>194,
            'category_id'=>14,
            'subcategory_name'=>'Լուսանկարչի ծառայություններ',
            'price'=>600,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:37:47',
            'updated_at'=>'2022-03-11 05:37:47'
            ] );



            Subcategory::create( [
            'id'=>195,
            'category_id'=>14,
            'subcategory_name'=>'Փաստաթղթերի լուսանկար',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:38:14',
            'updated_at'=>'2022-03-11 05:38:14'
            ] );


            Subcategory::create( [
            'id'=>197,
            'category_id'=>14,
            'subcategory_name'=>'Տեսանյութերի ստեղծում և մոնտաժ',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:39:43',
            'updated_at'=>'2022-03-11 05:39:43'
            ] );



            Subcategory::create( [
            'id'=>198,
            'category_id'=>14,
            'subcategory_name'=>'Տեսանկարահանում',
            'price'=>700,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:40:10',
            'updated_at'=>'2022-03-11 05:40:10'
            ] );



            Subcategory::create( [
            'id'=>199,
            'category_id'=>14,
            'subcategory_name'=>'Նկարահանման մոդելներ',
            'price'=>800,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:41:28',
            'updated_at'=>'2022-03-11 05:41:28'
            ] );



            Subcategory::create( [
            'id'=>200,
            'category_id'=>14,
            'subcategory_name'=>'3D տեսանյութերի ստեղծում',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:41:51',
            'updated_at'=>'2022-03-11 05:41:51'
            ] );



            Subcategory::create( [
            'id'=>201,
            'category_id'=>14,
            'subcategory_name'=>'Երաժշտության և երգերի ձայնագրում',
            'price'=>1000,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:42:14',
            'updated_at'=>'2022-03-11 05:42:14'
            ] );



            Subcategory::create( [
            'id'=>202,
            'category_id'=>14,
            'subcategory_name'=>'Թվայնացում',
            'price'=>500,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:42:38',
            'updated_at'=>'2022-03-11 05:42:38'
            ] );



            Subcategory::create( [
            'id'=>203,
            'category_id'=>14,
            'subcategory_name'=>'Այլ',
            'price'=>400,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:44:56',
            'updated_at'=>'2022-03-11 05:44:56'
            ] );



            Subcategory::create( [
            'id'=>204,
            'category_id'=>15,
            'subcategory_name'=>'Հագուստի վերանորոգում',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:46:03',
            'updated_at'=>'2022-03-11 05:46:03'
            ] );



            Subcategory::create( [
            'id'=>205,
            'category_id'=>15,
            'subcategory_name'=>'Մաքրում',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:46:28',
            'updated_at'=>'2022-03-11 05:46:28'
            ] );



            Subcategory::create( [
            'id'=>206,
            'category_id'=>15,
            'subcategory_name'=>'Կոշիկի վերանորոգում',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:46:48',
            'updated_at'=>'2022-03-11 05:46:48'
            ] );



            Subcategory::create( [
            'id'=>207,
            'category_id'=>15,
            'subcategory_name'=>'Հագուստի քիմմաքրում',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:47:14',
            'updated_at'=>'2022-03-11 05:47:14'
            ] );



            Subcategory::create( [
            'id'=>208,
            'category_id'=>15,
            'subcategory_name'=>'Դայակներ',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:47:38',
            'updated_at'=>'2022-03-11 05:47:38'
            ] );



            Subcategory::create( [
            'id'=>209,
            'category_id'=>15,
            'subcategory_name'=>'Գորգերի և կահույքի քիմմաքրում',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:48:05',
            'updated_at'=>'2022-03-11 05:48:05'
            ] );



            Subcategory::create( [
            'id'=>210,
            'category_id'=>15,
            'subcategory_name'=>'Օգնություն պարտեզում և բանջարանոցում',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:48:43',
            'updated_at'=>'2022-03-11 05:48:43'
            ] );



            Subcategory::create( [
            'id'=>211,
            'category_id'=>15,
            'subcategory_name'=>'Խնամողի ծառայություններ',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:49:44',
            'updated_at'=>'2022-03-11 05:49:44'
            ] );



            Subcategory::create( [
            'id'=>212,
            'category_id'=>15,
            'subcategory_name'=>'Տարածքի մաքրում',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:50:12',
            'updated_at'=>'2022-03-11 05:50:12'
            ] );



            Subcategory::create( [
            'id'=>213,
            'category_id'=>15,
            'subcategory_name'=>'Ծառերի և թփերի կտրում և էտում',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:50:37',
            'updated_at'=>'2022-03-11 05:50:37'
            ] );



            Subcategory::create( [
            'id'=>214,
            'category_id'=>15,
            'subcategory_name'=>'Խնամակալներ բնակեցումով',
            'price'=>100,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:51:06',
            'updated_at'=>'2022-03-11 05:51:06'
            ] );



            Subcategory::create( [
            'id'=>215,
            'category_id'=>15,
            'subcategory_name'=>'Լվացում',
            'price'=>50,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:51:34',
            'updated_at'=>'2022-03-11 05:51:34'
            ] );



            Subcategory::create( [
            'id'=>216,
            'category_id'=>15,
            'subcategory_name'=>'Քիմմաքրում',
            'price'=>70,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:51:58',
            'updated_at'=>'2022-03-11 05:51:58'
            ] );



            Subcategory::create( [
            'id'=>217,
            'category_id'=>15,
            'subcategory_name'=>'Այլ',
            'price'=>80,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:52:29',
            'updated_at'=>'2022-03-11 05:52:29'
            ] );



            Subcategory::create( [
            'id'=>218,
            'category_id'=>16,
            'subcategory_name'=>'Ներկայացուցչություն դատարանում',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:53:56',
            'updated_at'=>'2022-03-11 05:53:56'
            ] );



            Subcategory::create( [
            'id'=>219,
            'category_id'=>16,
            'subcategory_name'=>'Աշխատանքային վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:54:20',
            'updated_at'=>'2022-03-11 05:54:20'
            ] );



            Subcategory::create( [
            'id'=>220,
            'category_id'=>16,
            'subcategory_name'=>'Պարտքերի հավաքագրում',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:54:54',
            'updated_at'=>'2022-03-11 05:54:54'
            ] );



            Subcategory::create( [
            'id'=>221,
            'category_id'=>16,
            'subcategory_name'=>'Ընտանեկան վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:55:26',
            'updated_at'=>'2022-03-11 05:55:26'
            ] );



            Subcategory::create( [
            'id'=>222,
            'category_id'=>16,
            'subcategory_name'=>'Բնակարանային վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:55:49',
            'updated_at'=>'2022-03-11 05:55:49'
            ] );



            Subcategory::create( [
            'id'=>223,
            'category_id'=>16,
            'subcategory_name'=>'Սպառողների իրավունքների պաշտպանություն',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:56:13',
            'updated_at'=>'2022-03-11 05:56:13'
            ] );



            Subcategory::create( [
            'id'=>224,
            'category_id'=>16,
            'subcategory_name'=>'Վարկային վեճեր',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:56:43',
            'updated_at'=>'2022-03-11 05:56:43'
            ] );



            Subcategory::create( [
            'id'=>225,
            'category_id'=>16,
            'subcategory_name'=>'Ժառանգական վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:57:05',
            'updated_at'=>'2022-03-11 05:57:05'
            ] );



            Subcategory::create( [
            'id'=>226,
            'category_id'=>16,
            'subcategory_name'=>'Ավտոմեքենաների վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:57:25',
            'updated_at'=>'2022-03-11 05:57:25'
            ] );



            Subcategory::create( [
            'id'=>227,
            'category_id'=>16,
            'subcategory_name'=>'Իրավական փաստաթղթեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:59:02',
            'updated_at'=>'2022-03-11 05:59:02'
            ] );



            Subcategory::create( [
            'id'=>228,
            'category_id'=>16,
            'subcategory_name'=>'Հարկային վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:59:28',
            'updated_at'=>'2022-03-11 05:59:28'
            ] );



            Subcategory::create( [
            'id'=>229,
            'category_id'=>16,
            'subcategory_name'=>'Հողային վեճեր',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 05:59:46',
            'updated_at'=>'2022-03-11 05:59:46'
            ] );



            Subcategory::create( [
            'id'=>230,
            'category_id'=>16,
            'subcategory_name'=>'Օգնություն ՍՊԸ-ի և անհատ ձեռնարկատիրոջ գրանցման գործում',
            'price'=>250,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:00:29',
            'updated_at'=>'2022-03-11 06:00:29'
            ] );



            Subcategory::create( [
            'id'=>231,
            'category_id'=>16,
            'subcategory_name'=>'Փաստաթղթերի և պայմանագրերի ստուգում',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:01:50',
            'updated_at'=>'2022-03-11 06:01:50'
            ] );



            Subcategory::create( [
            'id'=>232,
            'category_id'=>16,
            'subcategory_name'=>'Գործարքների իրավաբանական ուղեկցում',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:02:21',
            'updated_at'=>'2022-03-11 06:02:21'
            ] );



            Subcategory::create( [
            'id'=>233,
            'category_id'=>16,
            'subcategory_name'=>'Գրանցման ծառայություններ',
            'price'=>150,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:02:45',
            'updated_at'=>'2022-03-11 06:02:45'
            ] );



            Subcategory::create( [
            'id'=>234,
            'category_id'=>16,
            'subcategory_name'=>'Տենդերներ',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:03:30',
            'updated_at'=>'2022-03-11 06:03:30'
            ] );



            Subcategory::create( [
            'id'=>235,
            'category_id'=>16,
            'subcategory_name'=>'Իրավաբանական անձանց սնանկություն',
            'price'=>200,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:03:52',
            'updated_at'=>'2022-03-11 06:03:52'
            ] );



            Subcategory::create( [
            'id'=>236,
            'category_id'=>16,
            'subcategory_name'=>'Անկախ փորձաքննությունների իրականացում',
            'price'=>450,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:04:25',
            'updated_at'=>'2022-03-11 06:04:25'
            ] );



            Subcategory::create( [
            'id'=>237,
            'category_id'=>16,
            'subcategory_name'=>'Իրավաբանական անձանց լուծարումը',
            'price'=>300,
            'status'=>'0',
            'created_at'=>'2022-03-11 06:04:53',
            'updated_at'=>'2022-03-11 06:04:53'
            ] );
    }
}
