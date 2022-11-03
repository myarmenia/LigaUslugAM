<?php

namespace Database\Seeders;

use App\Models\Reiting;
use Illuminate\Database\Seeder;

class ReitingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reiting::create( [
            'id'=>1,
            'task_id'=>1,
            'user_id'=>4,
            'executor_profile_id'=>4,
            'employer_star_count_to_executor'=>'1',
            'employer_review_to_executor'=>'bad work',
            'executor_star_count_to_employer'=>0,
            'executor_review_to_employer'=>'',
            'created_at'=>'2021-12-26 21:37:59',
            'updated_at'=>'2021-12-26 21:37:59'
            ] );



            Reiting::create( [
            'id'=>3,
            'task_id'=>4,
            'user_id'=>4,
            'executor_profile_id'=>5,
            'employer_star_count_to_executor'=>'5',
            'employer_review_to_executor'=>'Good work',
            'executor_star_count_to_employer'=>0,
            'executor_review_to_employer'=>'',
            'created_at'=>'2021-12-27 02:15:09',
            'updated_at'=>'2021-12-27 02:15:09'
            ] );



            Reiting::create( [
            'id'=>4,
            'task_id'=>3,
            'user_id'=>4,
            'executor_profile_id'=>6,
            'employer_star_count_to_executor'=>'5',
            'employer_review_to_executor'=>'very interesting work',
            'executor_star_count_to_employer'=>0,
            'executor_review_to_employer'=>'',
            'created_at'=>'2022-01-05 11:31:28',
            'updated_at'=>'2022-01-05 11:31:28'
            ] );



            Reiting::create( [
            'id'=>5,
            'task_id'=>34,
            'user_id'=>24,
            'executor_profile_id'=>6,
            'employer_star_count_to_executor'=>'5',
            'employer_review_to_executor'=>'The best worker ',
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'He is the best employer, it is easy to work with him',
            'created_at'=>'2022-01-10 13:49:31',
            'updated_at'=>'2022-01-10 13:49:31'
            ] );



            Reiting::create( [
            'id'=>6,
            'task_id'=>37,
            'user_id'=>54,
            'executor_profile_id'=>6,
            'employer_star_count_to_executor'=>'',
            'employer_review_to_executor'=>'',
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'I have never seen such kindly employer',
            'created_at'=>'2022-01-17 05:25:13',
            'updated_at'=>'2022-01-17 05:25:13'
            ] );



            Reiting::create( [
            'id'=>7,
            'task_id'=>36,
            'user_id'=>4,
            'executor_profile_id'=>8,
            'employer_star_count_to_executor'=>'',
            'employer_review_to_executor'=>'',
            'executor_star_count_to_employer'=>4,
            'executor_review_to_employer'=>'good  employer',
            'created_at'=>'2022-01-17 05:57:33',
            'updated_at'=>'2022-01-17 05:57:33'
            ] );



            Reiting::create( [
            'id'=>8,
            'task_id'=>33,
            'user_id'=>4,
            'executor_profile_id'=>8,
            'employer_star_count_to_executor'=>'',
            'employer_review_to_executor'=>'',
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'It was very interesting to work with you',
            'created_at'=>'2022-01-17 07:15:30',
            'updated_at'=>'2022-01-17 07:15:30'
            ] );



            Reiting::create( [
            'id'=>31,
            'task_id'=>39,
            'user_id'=>54,
            'executor_profile_id'=>9,
            'employer_star_count_to_executor'=>'5',
            'employer_review_to_executor'=>'You are the best worker',
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'I glad to meet you',
            'created_at'=>'2022-01-19 01:35:52',
            'updated_at'=>'2022-01-19 01:35:52'
            ] );



            Reiting::create( [
            'id'=>32,
            'task_id'=>32,
            'user_id'=>4,
            'executor_profile_id'=>NULL,
            'employer_star_count_to_executor'=>NULL,
            'employer_review_to_executor'=>NULL,
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'good worker',
            'created_at'=>'2022-01-19 01:44:27',
            'updated_at'=>'2022-01-19 01:44:27'
            ] );



            Reiting::create( [
            'id'=>33,
            'task_id'=>31,
            'user_id'=>4,
            'executor_profile_id'=>NULL,
            'employer_star_count_to_executor'=>NULL,
            'employer_review_to_executor'=>NULL,
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'good worker',
            'created_at'=>'2022-01-19 02:03:16',
            'updated_at'=>'2022-01-19 02:03:16'
            ] );



            Reiting::create( [
            'id'=>37,
            'task_id'=>29,
            'user_id'=>4,
            'executor_profile_id'=>7,
            'employer_star_count_to_executor'=>NULL,
            'employer_review_to_executor'=>NULL,
            'executor_star_count_to_employer'=>5,
            'executor_review_to_employer'=>'good worke4',
            'created_at'=>'2022-01-19 07:44:41',
            'updated_at'=>'2022-01-19 07:44:41'
            ] );
    }
}
