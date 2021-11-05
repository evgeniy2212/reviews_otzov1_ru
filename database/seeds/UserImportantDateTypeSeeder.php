<?php

use Illuminate\Database\Seeder;

class UserImportantDateTypeSeeder extends Seeder
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
                    'en' => 'Good Friday',
                    'ru' => 'Хорошей пятницы'
                ],
                'name' => [
                    'en' => 'Good Friday',
                    'ru' => 'Хорошей пятницы'
                ],
                'slug' => \Illuminate\Support\Str::slug('Good Friday'),
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
                    'ru' => 'С годовщиной'
                ],
                'slug' => \Illuminate\Support\Str::slug('Happy anniversary'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Happy birthday',
                    'ru' => 'День рождения'
                ],'',
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
//            [
//                'title' => [
//                    'en' => 'Juneteenth',
//                    'ru' => 'Juneteenth'
//                ],
//                'name' => [
//                    'en' => 'Juneteenth',
//                    'ru' => 'Juneteenth'
//                ],
//                'slug' => \Illuminate\Support\Str::slug('Juneteenth'),
//                'is_published' => false,
//            ],
            [
                'title' => [
                    'en' => 'Labor Day',
                    'ru' => 'День благодарения'
                ],
                'name' => [
                    'en' => 'Labor Day',
                    'ru' => 'День благодарения'
                ],
                'slug' => \Illuminate\Support\Str::slug('Labor Day'),
                'is_published' => true,
            ],
//            [
//                'title' => [
//                    'en' => 'Martin Luther King Jr. Day',
//                    'ru' => 'Martin Luther King Jr. Day'
//                ],
//                'name' => [
//                    'en' => 'Martin Luther King Jr. Day',
//                    'ru' => 'Martin Luther King Jr. Day'
//                ],
//                'slug' => \Illuminate\Support\Str::slug('Martin Luther King Jr. Day'),
//                'is_published' => false,
//            ],
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
                'is_published' => false,
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
                    'en' => 'New Business',
                    'ru' => 'Новый бизнес'
                ],
                'name' => [
                    'en' => 'New Business',
                    'ru' => 'Новый бизнес'
                ],
                'slug' => \Illuminate\Support\Str::slug('New Business'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'New Year’s Day',
                    'ru' => 'Новый год'
                ],
                'name' => [
                    'en' => 'New Year’s Day',
                    'ru' => 'Новый Год'
                ],
                'slug' => \Illuminate\Support\Str::slug('New Year’s Day'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Newborn',
                    'ru' => 'Рождение'
                ],
                'name' => [
                    'en' => 'Newborn',
                    'ru' => 'Рождение'
                ],
                'slug' => \Illuminate\Support\Str::slug('Newborn'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Promotion',
                    'ru' => 'Повышение'
                ],
                'name' => [
                    'en' => 'Promotion',
                    'ru' => 'Повышение'
                ],
                'slug' => \Illuminate\Support\Str::slug('Promotion'),
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
                    'en' => 'Valentine’s Day',
                    'ru' => 'День валентина'
                ],
                'name' => [
                    'en' => 'Valentine’s Day',
                    'ru' => 'День Валентина'
                ],
                'slug' => \Illuminate\Support\Str::slug('Valentine’s Day'),
                'is_published' => true,
            ],
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
                'is_published' => false,
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
            ]
        ];

        foreach(\App\Models\UserImportantDateType::all() as $importantType){
            $importantType->delete();
        }

        foreach($categories as $category){
            $userCongratData = [
                'is_published' => true,
            ];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $userCongratData[$localeKey] = [
                    'title' => $category['title'][$localeKey],
                    'name' => $category['name'][$localeKey],
                ];
            }
            \App\Models\UserImportantDateType::updateOrCreate(
                [
                    'slug' => $category['slug']
                ], $userCongratData);
        }
    }
}
