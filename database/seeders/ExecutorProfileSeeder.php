<?php

namespace Database\Seeders;

use App\Models\ExecutorProfile;
use Illuminate\Database\Seeder;

class ExecutorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Executorprofile::create( [
            'id'=>1,
            'user_id'=>4,
            'total_reiting'=>2,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2021-12-29 05:16:40',
            'updated_at'=>'2021-12-29 05:16:40'
            ] );



            Executorprofile::create( [
            'id'=>2,
            'user_id'=>3,
            'total_reiting'=>2,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-02 01:50:00',
            'updated_at'=>'2022-01-02 01:50:00'
            ] );



            Executorprofile::create( [
            'id'=>3,
            'user_id'=>18,
            'total_reiting'=>2,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-02 01:55:00',
            'updated_at'=>'2022-01-02 01:55:00'
            ] );



            Executorprofile::create( [
            'id'=>4,
            'user_id'=>17,
            'total_reiting'=>10,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-02 01:56:54',
            'updated_at'=>'2022-01-02 01:56:54'
            ] );



            Executorprofile::create( [
            'id'=>5,
            'user_id'=>15,
            'total_reiting'=>15,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-02 01:59:08',
            'updated_at'=>'2022-01-02 01:59:08'
            ] );



            Executorprofile::create( [
            'id'=>6,
            'user_id'=>19,
            'total_reiting'=>25,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-03 06:32:14',
            'updated_at'=>'2022-01-03 06:32:14'
            ] );



            Executorprofile::create( [
            'id'=>7,
            'user_id'=>54,
            'total_reiting'=>NULL,
            'balance'=>5000,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-17 04:33:12',
            'updated_at'=>'2022-01-17 04:33:12'
            ] );



            Executorprofile::create( [
            'id'=>8,
            'user_id'=>55,
            'total_reiting'=>NULL,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-17 05:54:09',
            'updated_at'=>'2022-01-17 05:54:09'
            ] );



            Executorprofile::create( [
            'id'=>9,
            'user_id'=>56,
            'total_reiting'=>NULL,
            'balance'=>NULL,
            'region'=>NULL,
            'address'=>NULL,
            'about_me'=>'',
            'speciality'=>NULL,
            'created_at'=>'2022-01-17 07:27:01',
            'updated_at'=>'2022-01-17 07:27:01'
            ] );



            ExecutorProfile::create( [
            'id'=>10,
            'user_id'=>5,
            'total_reiting'=>NULL,
            'balance'=>1500,
            'region'=>'Moscow2',
            'address'=>'ylica1',
            'about_me'=>'I\'m a hard worker',
            'speciality'=>'manikyur,varsavir,petikyur',
            'created_at'=>'2022-01-23 08:03:22',
            'updated_at'=>'2022-01-26 09:03:36'
            ] );
    }
}
