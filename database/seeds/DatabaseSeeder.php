<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryRegionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ReviewCategorySeeder::class);
        $this->call(ReviewCharacteristicsSeeder::class);
        $this->call(CategoryGroupByReviewSeeder::class);
        $this->call(CongratulationSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ReviewFilterSeeder::class);
        $this->call(ReviewFilterValuesSeeder::class);
        $this->call(BadWordsSeeder::class);
        $this->call(ServiceInfoSeeder::class);
        $this->call(BannerCategoriesSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(UserCongratulationCategorySeeder::class);
        $this->call(UserImportantDateTypeSeeder::class);
        $this->call(UserCongratulationSeeder::class);
//        $this->call(UserImportantDateSeeder::class);
//        $this->call(DefaultImageSeeder::class);
    }
}
