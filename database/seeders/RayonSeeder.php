<?php

namespace Database\Seeders;

use App\Models\Rayon;
use Illuminate\Database\Seeder;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cityInsert = [
            //Yerevan
            ['region_id'=>1,'rayon_name'=>'Աջափնյակ'],
            ['region_id'=>1,'rayon_name'=>'Արաբկիր'],
            ['region_id'=>1,'rayon_name'=>'Ավան'],
            ['region_id'=>1,'rayon_name'=>'Դավիթաշեն'],
            ['region_id'=>1,'rayon_name'=>'Էրեբունի'],
            ['region_id'=>1,'rayon_name'=>'Քանաքեռ Զեյթուն'],
            ['region_id'=>1,'rayon_name'=>'Կենտրոն'],
            ['region_id'=>1,'rayon_name'=>'Մալաթիա Սեբաստիա'],
            ['region_id'=>1,'rayon_name'=>'Նոր Նորք'],
            ['region_id'=>1,'rayon_name'=>'Շենգավիթ'],
            ['region_id'=>1,'rayon_name'=>'Նորք Մարաշ'],
            ['region_id'=>1,'rayon_name'=>'Նուբարաշեն'],
            ['region_id'=>1,'rayon_name'=>'Արմավիր'],
            //Aragatsotn
            ['region_id'=>2,'rayon_name'=>'Աշտարակ'],
            ['region_id'=>2,'rayon_name'=>'Ապարան'],
            ['region_id'=>2,'rayon_name'=>'Թալին'],
            //Ararat
            ['region_id'=>3,'rayon_name'=>'Արտաշատ'],
            ['region_id'=>3,'rayon_name'=>'Արարատ'],
            ['region_id'=>3,'rayon_name'=>'Մասիս'],
            ['region_id'=>3,'rayon_name'=>'Վեդի'],
            //Armavir
            ['region_id'=>4,'rayon_name'=>'Էջմիածին'],
            ['region_id'=>4,'rayon_name'=>'Արմավիր'],
            ['region_id'=>4,'rayon_name'=>'Մեծամոր'],
            //Gexarquniq
            ['region_id'=>5,'rayon_name'=>'Գավառ'],
            ['region_id'=>5,'rayon_name'=>'Սևան'],
            ['region_id'=>5,'rayon_name'=>'Մարտունի'],
            ['region_id'=>5,'rayon_name'=>'Վարդենիս'],
            ['region_id'=>5,'rayon_name'=>'Ճամբարակ'],
            //Kotayq
            ['region_id'=>6,'rayon_name'=>'Աբովյան'],
            ['region_id'=>6,'rayon_name'=>'Հրազդան'],
            ['region_id'=>6,'rayon_name'=>'Չարենցավան'],
            ['region_id'=>6,'rayon_name'=>'Եղվարդ'],
            ['region_id'=>6,'rayon_name'=>'Բյուրեղավան'],
            ['region_id'=>6,'rayon_name'=>'Նոր Հաճն'],
            ['region_id'=>6,'rayon_name'=>'Ծաղկաձոր'],
            //Lori
            ['region_id'=>7,'rayon_name'=>'Վանաձոր'],
            ['region_id'=>7,'rayon_name'=>'Ալավերդի'],
            ['region_id'=>7,'rayon_name'=>'Ստեփանավան'],
            ['region_id'=>7,'rayon_name'=>'Սպիտակ'],
            ['region_id'=>7,'rayon_name'=>'Տաշիր'],
            ['region_id'=>7,'rayon_name'=>'Ախթալա'],
            ['region_id'=>7,'rayon_name'=>'Թումանյան'],
            ['region_id'=>7,'rayon_name'=>'Շամլուղ'],
            //Shirak
            ['region_id'=>8,'rayon_name'=>'Գյումրի'],
            ['region_id'=>8,'rayon_name'=>'Արթիկ'],
            ['region_id'=>8,'rayon_name'=>'Մարալիկ'],
            //Syuniq
            ['region_id'=>9,'rayon_name'=>'Կապան'],
            ['region_id'=>9,'rayon_name'=>'Գորիս'],
            ['region_id'=>9,'rayon_name'=>'Սիսիան'],
            ['region_id'=>9,'rayon_name'=>'Քաջարան'],
            ['region_id'=>9,'rayon_name'=>'Մեղրի'],
            ['region_id'=>9,'rayon_name'=>'Դաստակերտ'],
            //Tavush
            ['region_id'=>10,'rayon_name'=>'Իջևան'],
            ['region_id'=>10,'rayon_name'=>'Դիլիջան'],
            ['region_id'=>10,'rayon_name'=>'Բերդ'],
            ['region_id'=>10,'rayon_name'=>'Նոյեմբերյան'],
            ['region_id'=>10,'rayon_name'=>'Այրում'],
            //Vayoc dzor
            ['region_id'=>11,'rayon_name'=>'Եղեգնաձոր'],
            ['region_id'=>11,'rayon_name'=>'Վայք'],
            ['region_id'=>11,'rayon_name'=>'Ջերմուկ'],
        ];

        Rayon::insert($cityInsert);
     
    }
}
