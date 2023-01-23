<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ExecutorCategory;
use App\Models\ExecutorEducation;
use App\Models\ExecutorEducationCertificate;
use App\Models\ExecutorProfile;
use App\Models\ExecutorSubcategory;
use App\Models\ExecutorWorkingRegion;
use App\Models\ImageTask;
use App\Models\Rayon;
use App\Models\Reiting;
use App\Models\Subcategory;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            // UserSeeder::class,
            // TaskSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            RegionSeeder::class,
            RayonSeeder::class,
            CreateAdminUserSeeder::class,
            CountriesSeeder::class,
            // ReitingSeeder::class,
            // ExecutorProfileSeeder::class,
            // ExecutorCategorySeeder::class,
            // ImageTaskSeeder::class,
            // ExecutorWorkingRegionSeeder::class,
            // ExecutorEducationSeeder::class,
            // ExecutorEducationCertificateSeeder::class,
            // ExecutorSubcategorySeeder::class,
            PermissionTableSeeder::class,
        ]);
    }
}
