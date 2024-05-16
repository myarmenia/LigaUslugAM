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

            //Aragatsotn
            ['region_id'=>2,'rayon_name'=>'Աշտարակ'],
            ['region_id'=>2,'rayon_name'=>'Ագարակ'],
            ['region_id'=>2,'rayon_name'=>'Ապարան'],
            ['region_id'=>2,'rayon_name'=>'Արագածավան'],
            ['region_id'=>2,'rayon_name'=>'Արագածոտն'],
            ['region_id'=>2,'rayon_name'=>'Բյուրական'],
            ['region_id'=>2,'rayon_name'=>'Օշական'],
            ['region_id'=>2,'rayon_name'=>'Թալին'],
            ['region_id'=>2,'rayon_name'=>'Ծաղկահովիտ'],
            ['region_id'=>2,'rayon_name'=>'Դավթաշեն'],
            ['region_id'=>2,'rayon_name'=>'Սասունիկ'],
            ['region_id'=>2,'rayon_name'=>'Երնջատափ'],
            //Ararat
            ['region_id'=>3,'rayon_name'=>'Արտաշատ'],
            ['region_id'=>3,'rayon_name'=>'Աբովյան'],
            ['region_id'=>3,'rayon_name'=>'Արարատ'],
            ['region_id'=>3,'rayon_name'=>'Արգավանդ'],
            ['region_id'=>3,'rayon_name'=>'Այնթապ'],
            ['region_id'=>3,'rayon_name'=>'Գեղանիստ'],
            ['region_id'=>3,'rayon_name'=>'Հովտաշատ'],
            ['region_id'=>3,'rayon_name'=>'Մարմարաշեն'],
            ['region_id'=>3,'rayon_name'=>'Մասիս'],
            ['region_id'=>3,'rayon_name'=>'Նոր Խարբերդ'],
            ['region_id'=>3,'rayon_name'=>'Սուրենավան'],
            ['region_id'=>3,'rayon_name'=>'Վեդի'],
            ['region_id'=>3,'rayon_name'=>'Արաքսավան'],
            ['region_id'=>3,'rayon_name'=>'Բերքանուշ'],
            ['region_id'=>3,'rayon_name'=>'Լուսառատ'],
            ['region_id'=>3,'rayon_name'=>'Վարդաշեն'],
            ['region_id'=>3,'rayon_name'=>'Ոստան'],

            //Armavir
            ['region_id'=>1,'rayon_name'=>'Արմավիր'],
            ['region_id'=>4,'rayon_name'=>'Էջմիածին'],
            ['region_id'=>4,'rayon_name'=>'Արգավանդ'],
            ['region_id'=>4,'rayon_name'=>'Բաղրամյան'],
            ['region_id'=>4,'rayon_name'=>'Մերձավան'],
            ['region_id'=>4,'rayon_name'=>'Մեծամոր'],
            ['region_id'=>4,'rayon_name'=>'Մուսալեռ'],
            ['region_id'=>4,'rayon_name'=>'Փարաքար'],
            ['region_id'=>4,'rayon_name'=>'Ակնալիճ'],
            ['region_id'=>4,'rayon_name'=>'Արագած'],
            ['region_id'=>4,'rayon_name'=>'Այգեկ'],
            ['region_id'=>4,'rayon_name'=>'Դալարիկ'],
            ['region_id'=>4,'rayon_name'=>'Լեռնագոգ'],
            ['region_id'=>4,'rayon_name'=>'Լուկաշին'],
            ['region_id'=>4,'rayon_name'=>'Նորակերտ'],
            ['region_id'=>4,'rayon_name'=>'Շահումյան'],
            ['region_id'=>4,'rayon_name'=>'Զարթոնք'],
            //Gexarquniq
            ['region_id'=>5,'rayon_name'=>'Ճամբարակ'],
            ['region_id'=>5,'rayon_name'=>'Գավառ'],
            ['region_id'=>5,'rayon_name'=>'Մարտունի'],
            ['region_id'=>5,'rayon_name'=>'Սևան'],
            ['region_id'=>5,'rayon_name'=>'Վարդենիս'],
            ['region_id'=>5,'rayon_name'=>'Գագարին'],
            ['region_id'=>5,'rayon_name'=>'Գեղարքունիք'],
            ['region_id'=>5,'rayon_name'=>'Լճաշեն'],
            ['region_id'=>5,'rayon_name'=>'Ծովակ'],
            ['region_id'=>5,'rayon_name'=>'Վարդենիկ'],

            //Kotayq
            ['region_id'=>6,'rayon_name'=>'Աբովյան'],
            ['region_id'=>6,'rayon_name'=>'Աղվերան'],
            ['region_id'=>6,'rayon_name'=>'Ալափարս'],
            ['region_id'=>6,'rayon_name'=>'Արամուս'],
            ['region_id'=>6,'rayon_name'=>'Արգել'],
            ['region_id'=>6,'rayon_name'=>'Առինջ'],
            ['region_id'=>6,'rayon_name'=>'Արզական'],
            ['region_id'=>6,'rayon_name'=>'Բալահովիտ'],
            ['region_id'=>6,'rayon_name'=>'Բջնի'],
            ['region_id'=>6,'rayon_name'=>'Բյուրեղավան'],
            ['region_id'=>6,'rayon_name'=>'Չարենցավան'],
            ['region_id'=>6,'rayon_name'=>'Ձորաղբյուր'],
            ['region_id'=>6,'rayon_name'=>'Գառնի'],
            ['region_id'=>6,'rayon_name'=>'Գեղաշեն'],
            ['region_id'=>6,'rayon_name'=>'Հրազդան'],
            ['region_id'=>6,'rayon_name'=>'Ջրվեժ'],
            ['region_id'=>6,'rayon_name'=>'Քանաքեռավան'],
            ['region_id'=>6,'rayon_name'=>'Քարաշամբ'],
            ['region_id'=>6,'rayon_name'=>'Քասախ'],
            ['region_id'=>6,'rayon_name'=>'Կոտայք'],
            ['region_id'=>6,'rayon_name'=>'Մրգաշեն'],
            ['region_id'=>6,'rayon_name'=>'Նոր Գեղի'],
            ['region_id'=>6,'rayon_name'=>'Նոր Գյուղ'],
            ['region_id'=>6,'rayon_name'=>'Նոր Հաճն'],
            ['region_id'=>6,'rayon_name'=>'Նուռնուս'],
            ['region_id'=>6,'rayon_name'=>'Պռոշյան'],
            ['region_id'=>6,'rayon_name'=>'Պտղնի'],
            ['region_id'=>6,'rayon_name'=>'Ծաղկաձոր'],
            ['region_id'=>6,'rayon_name'=>'Եղվարդ'],
            ['region_id'=>6,'rayon_name'=>'Զովունի'],
            ['region_id'=>6,'rayon_name'=>'Գետարգել'],
            ['region_id'=>6,'rayon_name'=>'Հանքավան'],
            ['region_id'=>6,'rayon_name'=>'Մեղրաձոր'],
            ['region_id'=>6,'rayon_name'=>'Փյունիկ'],

            //Lori
            ['region_id'=>7,'rayon_name'=>'Վանաձոր'],
            ['region_id'=>7,'rayon_name'=>'Ալավերդի'],
            ['region_id'=>7,'rayon_name'=>'Գյուլագարակ'],
            ['region_id'=>7,'rayon_name'=>'Սպիտակ'],
            ['region_id'=>7,'rayon_name'=>'Ստեփանավան'],
            ['region_id'=>7,'rayon_name'=>'Տաշիր'],
            ['region_id'=>7,'rayon_name'=>'Ախթալա'],
            ['region_id'=>7,'rayon_name'=>'Ճոճկան'],
            ['region_id'=>7,'rayon_name'=>'Գուգարք'],
            ['region_id'=>7,'rayon_name'=>'Օձուն'],
            ['region_id'=>7,'rayon_name'=>'Շիրակամուտ'],
            ['region_id'=>7,'rayon_name'=>'Թումանյան'],
            //Shirak
            ['region_id'=>8,'rayon_name'=>'Գյումրի'],
            ['region_id'=>8,'rayon_name'=>'Ախուրյան'],
            ['region_id'=>8,'rayon_name'=>'Արթիկ'],
            ['region_id'=>8,'rayon_name'=>'Աշոցք'],
            ['region_id'=>8,'rayon_name'=>'Մարալիկ'],
            ['region_id'=>8,'rayon_name'=>'Ամասիա'],
            ['region_id'=>8,'rayon_name'=>'Պեմզաշեն'],
            ['region_id'=>8,'rayon_name'=>'Սարակապ'],
            //Syuniq
            ['region_id'=>9,'rayon_name'=>'Գորիս'],
            ['region_id'=>9,'rayon_name'=>'Քաջարան'],
            ['region_id'=>9,'rayon_name'=>'Կապան'],
            ['region_id'=>9,'rayon_name'=>'Մեղրի'],
            ['region_id'=>9,'rayon_name'=>'Սիսիան'],
            ['region_id'=>9,'rayon_name'=>'Ագարակ'],
            ['region_id'=>9,'rayon_name'=>'Դաստակերտ'],

            //Tavush
            ['region_id'=>10,'rayon_name'=>' Աչաջուր'],
            ['region_id'=>10,'rayon_name'=>' Բերդ'],
            ['region_id'=>10,'rayon_name'=>'Դիլիջան'],
            ['region_id'=>10,'rayon_name'=>'Իջևան'],
            ['region_id'=>10,'rayon_name'=>'Նոյեմբերյան'],
            ['region_id'=>10,'rayon_name'=>'Այրում'],
            ['region_id'=>10,'rayon_name'=>'Ազատամուտ'],
            ['region_id'=>10,'rayon_name'=>'Բագրատաշեն'],
            ['region_id'=>10,'rayon_name'=>'Տավուշ'],
            //Vayoc dzor
            ['region_id'=>11,'rayon_name'=>'Ջերմուկ'],
            ['region_id'=>11,'rayon_name'=>'Վայք'],
            ['region_id'=>11,'rayon_name'=>'Եղեգնաձոր'],


        ];

        Rayon::insert($cityInsert);

    }
}
