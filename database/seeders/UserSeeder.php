<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'id'=>2,
            'role'=>0,
            'name'=>'Narine',
            'email'=>'narine@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$uiJWVSMtluysiMEJaOoITelfhvob6EpKA5mhPRxdH.KiFK3u40N.2',
            'remember_token'=>NULL,
            'img_path'=>'logo.png',
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'+712345678910',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 07:26:58',
            'updated_at'=>'2021-12-28 00:25:59'
            ] );



            User::create( [
            'id'=>3,
            'role'=>0,
            'name'=>'Simon',
            'email'=>'simon@webex.am',
            'email_verified_at'=>'2022-01-13 15:17:02',
            'password'=>'$2y$10$C9GLYt6dnCgG.FETpAL0xe8mCEFoffMMO5ubeUdwN/tcsfenhgtqW',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>'female',
            'birth_date'=>'1982-05-03',
            'phonenumber'=>'+712345678910',
           'phone_status'=>'not verified',
            'fasebook_link'=>'[abled\":true}]',
            'instagram_link'=>'https://www.twilio.com/',
            'geting_notification'=>'На почту',
            'status'=>NULL,
            'created_at'=>'2021-12-27 07:26:58',
            'updated_at'=>'2022-01-13 15:17:02'
            ] );



            User::create( [
            'id'=>4,
            'role'=>0,
            'name'=>'Petros',
            'email'=>'petros@webex.am',
            'email_verified_at'=>'2022-01-10 06:42:14',
            'password'=>'$2y$10$myzlaDLL9U2JPtj8mBNMwuJcct2DFS6Mf7z98xvXhSOZoJvpPRssa',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'+712345678910',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 07:26:58',
            'updated_at'=>'2022-01-10 06:42:14'
            ] );



            User::create( [
            'id'=>5,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros@webex.am',
            'email_verified_at'=>'2022-01-10 06:42:14',
            'password'=>'$2y$10$70FzybreNV0KqklFAT3bIuQEUNfU7WM5fAEc/WO1ijZI57R9NC972',
            'remember_token'=>NULL,
            'img_path'=>'1643195115Clip.png',
            'gender'=>'mail',
            'birth_date'=>'1991-05-31',
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>'http://translate_martiros.@google.com',
            'instagram_link'=>'http://translate2.@google.com',
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 08:54:34',
            'updated_at'=>'2022-01-26 07:05:15'
            ] );



            User::create( [
            'id'=>6,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros1@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$RD/jznoto0keRwHMljopVeKI/UvGxV8Jv90nm.KUfDNMIDUXbIe66',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:05:33',
            'updated_at'=>'2021-12-27 09:05:33'
            ] );



            User::create( [
            'id'=>7,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros2@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Yh5hEJ479MzcYnX0l3fPAesRBBedSRe7uPHv3vZTWxM2UjkCD99rm',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:14:12',
            'updated_at'=>'2021-12-27 09:14:12'
            ] );



            User::create( [
            'id'=>9,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros3@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$x3/37vaG2/jaBc..RWLln.cfiPq2Tp3NmSLp31dKFtScFJxtUcFwS',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'15556667777',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:20:24',
            'updated_at'=>'2021-12-27 09:20:24'
            ] );



            User::create( [
            'id'=>10,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros4@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$milIFEK566pY2qlBvraJIOwVJw5Cf5gNhsWfj8.n/d93uYl.nGONe',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'15556667777',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:22:14',
            'updated_at'=>'2021-12-27 09:22:14'
            ] );



            User::create( [
            'id'=>11,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros6@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$WwfM6QAu.EyOA1R.TEK/guYFQlaOzjShjwDvRkdmJKhcmOTUQDaaO',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'15556667777',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:24:57',
            'updated_at'=>'2021-12-27 09:24:57'
            ] );



            User::create( [
            'id'=>12,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros7@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$OVKro0uEe7i3vDV37z.HgORK91Y3NBT0K/Onux7drsV9WpZ8agtJ6',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'+1555666777',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:32:14',
            'updated_at'=>'2021-12-27 09:32:14'
            ] );



            User::create( [
            'id'=>13,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros8@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$bN9TNj5icjXSgMIFEDqvouFnz1SI.bqUoEyYzdQ.8cgvxd50mTduW',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'15556667777',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:35:05',
            'updated_at'=>'2021-12-27 09:35:05'
            ] );



            User::create( [
            'id'=>14,
            'role'=>0,
            'name'=>'Martiros',
            'email'=>'martiros10@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Us2qunh8LlWyQdEzDQkzmuPstJEYwNqEwS78kgVdkwl8OuFZnpKVi',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'12345678910',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 09:36:43',
            'updated_at'=>'2021-12-27 09:36:43'
            ] );



            User::create( [
            'id'=>15,
            'role'=>0,
            'name'=>'Martiros11',
            'email'=>'martiros11@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$jCEOnqfyQDNBcsBcrIqo4e8vFhHXI9gVjcqL/goWhNX87nx9IVw4O',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'12345678910',
           'phone_status'=>'not verified',
            'fasebook_link'=>'https://mail.ru/',
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-27 22:55:58',
            'updated_at'=>'2022-01-03 04:24:58'
            ] );



            User::create( [
            'id'=>16,
            'role'=>0,
            'name'=>'Martiros11',
            'email'=>'martiros13@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$/obeOjEtV1EFTAsBh/79cOO0iQ0B5/2s0xHsQUShsvr7a2l91JQm.',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'12345678917',
            'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-28 02:41:43',
            'updated_at'=>'2021-12-28 02:41:43'
            ] );



            User::create( [
            'id'=>17,
            'role'=>0,
            'name'=>'Martiros14',
            'email'=>'martiros14@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$lOOeQCIApjaKTVmvhF58QuS.5A/09lpD/.iN5YHnhCQ3FE1dXz1HO',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'1234567891',
           'phone_status'=>'not verified',
            'fasebook_link'=>'https://mail.ru/',
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-28 02:42:07',
            'updated_at'=>'2022-01-03 05:01:18'
            ] );



            User::create( [
            'id'=>18,
            'role'=>0,
            'name'=>'Martiros15',
            'email'=>'martiros15@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$oenQmE38l7/aUEHy5Jph3eGFvBGhHpuR2teGhbl8UPEZKIQOjaaPC',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'1234567897',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2021-12-28 02:42:48',
            'updated_at'=>'2021-12-28 02:42:48'
            ] );



            User::create( [
            'id'=>19,
            'role'=>0,
            'name'=>'Martiros16',
            'email'=>'martiros16@webex.am',
            'email_verified_at'=>'2022-01-09 10:57:45',
            'password'=>'$2y$10$LWPhHwgPA0q8h1naJxn/EueNX1XpGBrRn3IewQCRLlAJNNaTzSIk6',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'1234567816',
           'phone_status'=>'not verified',
            'fasebook_link'=>'https://translate.goog.com/',
            'instagram_link'=>'https://translate.google.com/',
            'geting_notification'=>'via email',
            'status'=>NULL,
            'created_at'=>'2022-01-03 05:46:28',
            'updated_at'=>'2022-01-08 03:19:01'
            ] );



            User::create( [
            'id'=>20,
            'role'=>0,
            'name'=>'Martiros16',
            'email'=>'martiros17@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$U3mrx7LCJMuGsmGuh/pMw.qJ8bfd25mZespnYPgzGjW2Rx5RfFXEu',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'1234567816',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-04 02:35:02',
            'updated_at'=>'2022-01-04 02:35:02'
            ] );



            User::create( [
            'id'=>21,
            'role'=>0,
            'name'=>'Martiros16',
            'email'=>'martiros18@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$FsZDJfXEAtorSAf6rwFun.1sEvPTgUp2Pf912qHQbR2TJEbHGuOAe',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>'female',
            'birth_date'=>'1982-05-03',
            'phonenumber'=>'0037493257297',
           'phone_status'=>'not verified',
            'fasebook_link'=>'https://www.twilio.com/',
            'instagram_link'=>'https://www.twilio.com/',
            'geting_notification'=>'На почту',
            'status'=>NULL,
            'created_at'=>'2022-01-05 06:26:06',
            'updated_at'=>'2022-01-10 02:54:02'
            ] );



            User::create( [
            'id'=>22,
            'role'=>0,
            'name'=>'arliga',
            'email'=>'arligagames@gmail.com',
            'email_verified_at'=>'2022-01-09 10:57:45',
            'password'=>'$2y$10$scKefcYVqoHIzxK5irPxUuofprw4snkigspcwf4aV9Gjco3FBocOa',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'0037493257297',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-09 09:10:23',
            'updated_at'=>'2022-01-18 09:20:48'
            ] );



            User::create( [
            'id'=>25,
            'role'=>0,
            'name'=>'Narine',
            'email'=>'armine1@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$tHMVjotXMzKaQS1VtYbESugJQ.Cc.2CdV9vikKYrHihSwrwZFiV7u',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'0037493257297',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-11 18:02:54',
            'updated_at'=>'2022-01-11 18:02:54'
            ] );



            User::create( [
            'id'=>29,
            'role'=>0,
            'name'=>'Karine',
            'email'=>'karine@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$5vPbVawLnlhAGA0m9VLdc.iRoX3mLRclNPUXQzdMeeY3YiibTguL6',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'0037493257297',
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-11 19:53:03',
            'updated_at'=>'2022-01-11 19:53:03'
            ] );



            User::create( [
            'id'=>54,
            'role'=>0,
            'name'=>'Armine',
            'email'=>'armine.khachatryan1982@gmail.com',
            'email_verified_at'=>'2022-01-14 07:47:13',
            'password'=>'$2y$10$MQ1tuvFRvjq03txl/O3rquTl5Zy4KLxGlRATzdEvB8lGnMT0zE8AW',
            'remember_token'=>NULL,
            'img_path'=>'1643179145Clip.png',
            'gender'=>'female',
            'birth_date'=>'1982-05-03',
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>'http://translate1.@google.com',
            'instagram_link'=>'http://translate2.@google.com',
            'geting_notification'=>'sms',
            'status'=>NULL,
            'created_at'=>'2022-01-14 07:45:23',
            'updated_at'=>'2022-01-26 02:39:05'
            ] );



            User::create( [
            'id'=>55,
            'role'=>0,
            'name'=>'Armine',
            'email'=>'armine@webex.am',
            'email_verified_at'=>'2022-01-17 01:42:51',
            'password'=>'$2y$10$gbvVnUJzkqvve7IpfPxdiumzAgQTnnHEaGjuU7lVSTyB/lowHh2hW',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-17 01:39:34',
            'updated_at'=>'2022-01-17 01:42:51'
            ] );



            User::create( [
            'id'=>56,
            'role'=>0,
            'name'=>'Sargis',
            'email'=>'sargis@webex.am',
            'email_verified_at'=>'2022-01-09 10:57:45',
            'password'=>'$2y$10$fKNZ2OxHjEMagu.B3LKbyePqO3lMNaGt7Dp8b.AtCY1Xh8siQ405u',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-17 03:22:45',
            'updated_at'=>'2022-01-17 03:22:45'
            ] );



            User::create( [
            'id'=>57,
            'role'=>0,
            'name'=>'Sargis',
            'email'=>'sargis1@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$AXlQ6WBfpn220A/ezo0e0.6isQKDvrOV3eVecGi25ZUQi0fTBOpGO',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>NULL,
           'phone_status'=>'not verified',
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-19 07:32:24',
            'updated_at'=>'2022-01-19 07:32:24'
            ] );



            User::create( [
            'id'=>58,
            'role'=>0,
            'name'=>'Sargis',
            'email'=>'sarg@webex.am',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$XkZHg0smWb7M9JT4pJpfI.P/TFYPo0vc2Zg5UAgwQx7x7oVAIETk.',
            'remember_token'=>NULL,
            'img_path'=>NULL,
            'gender'=>NULL,
            'birth_date'=>NULL,
            'phonenumber'=>'0037493257297',
            ' 'phone_status'=>'not verified','=>NULL,
            'fasebook_link'=>NULL,
            'instagram_link'=>NULL,
            'geting_notification'=>NULL,
            'status'=>NULL,
            'created_at'=>'2022-01-21 05:28:50',
            'updated_at'=>'2022-01-21 05:28:50'
            ] );
    }
}
