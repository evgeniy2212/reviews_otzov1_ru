<?php

use Illuminate\Database\Seeder;
use App\Models\UserCongratulationCategory;

class UserCongratulationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => [
                    'en' => 'Birthday of Martin Luther King Jr.',
                    'ru' => 'День рождения Мартина Лютера Кинга-младшего.'
                ],
                'name' => [
                    'en' => 'Birthday of Martin Luther King Jr.',
                    'ru' => 'День рождения Мартина Лютера Кинга-младшего.'
                ],
                'slug' => \Illuminate\Support\Str::slug('Birthday of Martin Luther King Jr'),
                'is_published' => false,
            ],
            [
                'title' => [
                    'en' => 'Christmas',
                    'ru' => 'Рождество'
                ],
                'name' => [
                    'en' => 'Christmas',
                    'ru' => 'Рождество'
                ],
                'slug' => \Illuminate\Support\Str::slug('Christmas'),
                'is_published' => true,
            ],
//            [
//                'title' => [
//                    'en' => 'Columbus Day',
//                    'ru' => 'Columbus Day'
//                ],
//                'name' => [
//                    'en' => 'Columbus Day',
//                    'ru' => 'Columbus Day'
//                ],
//                'slug' => \Illuminate\Support\Str::slug('Columbus Day'),
//                'is_published' => false,
//            ],
            [
                'title' => [
                    'en' => 'Easter',
                    'ru' => 'Пасха'
                ],
                'name' => [
                    'en' => 'Easter',
                    'ru' => 'Пасха'
                ],
                'slug' => \Illuminate\Support\Str::slug('Easter'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Engagements',
                    'ru' => 'Помолвка'
                ],
                'name' => [
                    'en' => 'Engagements',
                    'ru' => 'Помолвка'
                ],
                'slug' => \Illuminate\Support\Str::slug('Engagements'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Father`s Day',
                    'ru' => 'День отца'
                ],
                'name' => [
                    'en' => 'Father`s Day',
                    'ru' => 'День отца'
                ],
                'slug' => \Illuminate\Support\Str::slug('Father`s Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Graduation',
                    'ru' => 'Выпускной'
                ],
                'name' => [
                    'en' => 'Graduation',
                    'ru' => 'Выпускной'
                ],
                'slug' => \Illuminate\Support\Str::slug('Graduation'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Happy anniversary',
                    'ru' => 'С годовщиной'
                ],
                'name' => [
                    'en' => 'Happy anniversary',
                    'ru' => 'С годовщинов'
                ],
                'slug' => \Illuminate\Support\Str::slug('Happy anniversary'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Happy birthday',
                    'ru' => 'День рождения'
                ],
                'name' => [
                    'en' => 'Happy birthday',
                    'ru' => 'День рождения'
                ],
                'slug' => \Illuminate\Support\Str::slug('Happy birthday'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Independence Day',
                    'ru' => 'День независимости'
                ],
                'name' => [
                    'en' => 'Independence Day',
                    'ru' => 'День независимости'
                ],
                'slug' => \Illuminate\Support\Str::slug('Independence Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Labor Day',
                    'ru' => 'День труда'
                ],
                'name' => [
                    'en' => 'Labor Day',
                    'ru' => 'День труда'
                ],
                'slug' => \Illuminate\Support\Str::slug('Labor Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Memorial Day',
                    'ru' => 'День памяти'
                ],
                'name' => [
                    'en' => 'Memorial Day',
                    'ru' => 'День памяти'
                ],
                'slug' => \Illuminate\Support\Str::slug('Memorial Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Mother`s Day',
                    'ru' => 'День матери'
                ],
                'name' => [
                    'en' => 'Mother`s Day',
                    'ru' => 'День матери'
                ],
                'slug' => \Illuminate\Support\Str::slug('Mother`s Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'New born',
                    'ru' => 'С рождением'
                ],
                'name' => [
                    'en' => 'New born',
                    'ru' => 'С рождением'
                ],
                'slug' => \Illuminate\Support\Str::slug('New born'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'New home',
                    'ru' => 'Новоселье'
                ],
                'name' => [
                    'en' => 'New home',
                    'ru' => 'Новоселье'
                ],
                'slug' => \Illuminate\Support\Str::slug('New home'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'New year',
                    'ru' => 'Новый год'
                ],
                'name' => [
                    'en' => 'New year',
                    'ru' => 'Новый год'
                ],
                'slug' => \Illuminate\Support\Str::slug('New year'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Promotion',
                    'ru' => 'Продвижение'
                ],
                'name' => [
                    'en' => 'Promotion',
                    'ru' => 'Продвижение'
                ],
                'slug' => \Illuminate\Support\Str::slug('Promotion'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Starting a new business',
                    'ru' => 'Старт нового бизнеса'
                ],
                'name' => [
                    'en' => 'Starting a new business',
                    'ru' => 'Старт нового бизнеса'
                ],
                'slug' => \Illuminate\Support\Str::slug('Starting a new business'),
                'is_published' => true,
            ],
//            [
//                'title' => [
//                    'en' => 'Thanksgiving',
//                    'ru' => 'Thanksgiving'
//                ],
//                'name' => [
//                    'en' => 'Thanksgiving',
//                    'ru' => 'Thanksgiving'
//                ],
//                'slug' => \Illuminate\Support\Str::slug('Thanksgiving'),
//                'is_published' => false,
//            ],
            [
                'title' => [
                    'en' => 'Veterans Day',
                    'ru' => 'День ветеранов'
                ],
                'name' => [
                    'en' => 'Veterans Day',
                    'ru' => 'День ветеранов'
                ],
                'slug' => \Illuminate\Support\Str::slug('Veterans Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Wedding',
                    'ru' => 'Свадьба'
                ],
                'name' => [
                    'en' => 'Wedding',
                    'ru' => 'Свадьба'
                ],
                'slug' => \Illuminate\Support\Str::slug('Wedding'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Other',
                    'ru' => 'Другое'
                ],
                'name' => [
                    'en' => '',
                    'ru' => ''
                ],
                'slug' => \Illuminate\Support\Str::slug('Other'),
                'is_published' => true,
            ],
        ];

        foreach($categories as $category){
            $userCongratData = [];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $userCongratData[$localeKey] = [
                    'title' => $category['title'][$localeKey],
                    'name' => $category['name'][$localeKey],
                ];
            }
            UserCongratulationCategory::updateOrCreate(
                [
                    'slug' => $category['slug'],
                    'is_published' => $category['is_published'],
                ],
                $userCongratData
            );
        }
    }
}
