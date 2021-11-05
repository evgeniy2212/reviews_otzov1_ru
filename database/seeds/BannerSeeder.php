<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_1',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_2',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_3',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_4',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_5',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_6',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_7',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_8',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_9',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_10',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\Models\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/default_images/banners/default_banner.png',
                'name' => 'admin_banner_11',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
        ];

        foreach($banners as $banner){
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $banner['locale'] = $localeKey;
                Banner::firstOrCreate($banner);
            }
        }
    }
}
