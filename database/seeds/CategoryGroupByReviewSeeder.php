<?php

use Illuminate\Database\Seeder;

use App\Models\CategoryByReview;
use App\Models\GroupByReview;
use App\Models\ReviewCategory;

class CategoryGroupByReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Convenience products' => [
                'title' => [
                    'en' => 'Convenience products',
                    'ru' => 'Удобные продукты'
                ],
                'categories' => [
                    'Alcohol' => [
                        'en' => 'Alcohol',
                        'ru' => 'Алкоголь'
                    ],
                    'Cigarettes' => [
                        'en' => 'Cigarettes',
                        'ru' => 'Сигареты'
                    ],
                    'Fruit' => [
                        'en' => 'Fruit',
                        'ru' => 'Фпукты'
                    ],
                    'Most food items' => [
                        'en' => 'Most food items',
                        'ru' => 'Продукты питания'
                    ],
                    'Snack foods and candy bars' => [
                        'en' => 'Snack foods and candy bars',
                        'ru' => 'Снэки и сладости'
                    ],
                    'Soft drinks' => [
                        'en' => 'Soft drinks',
                        'ru' => 'Напитки'
                    ],
                    'Vegetables' => [
                        'en' => 'Vegetables',
                        'ru' => 'Овощи'
                    ],
                    'Other' => [
                        'en' => 'Other',
                        'ru' => 'Другое'
                    ]
                ]
            ],
            'Shopping products' => [
                'title' => [
                    'en' => 'Shopping products',
                    'ru' => 'Товары'
                ],
                'categories' => [
                    'Cameras' => [
                        'en' => 'Cameras',
                        'ru' => 'Камеры'
                    ],
                    'Camping equipment' => [
                        'en' => 'Camping equipment',
                        'ru' => 'Снаряжение для кэмпинга'
                    ],
                    'Clothing' => [
                        'en' => 'Clothing',
                        'ru' => 'Вещи'
                    ],
                    'Electric Car' => [
                        'en' => 'Electric Car',
                        'ru' => 'Електрические машины'
                    ],
                    'Electronics' => [
                        'en' => 'Electronics',
                        'ru' => 'Електроника'
                    ],
                    'Furniture' => [
                        'en' => 'Furniture',
                        'ru' => 'Фурнитура'
                    ],
                    'Golf equipment' => [
                        'en' => 'Golf equipment',
                        'ru' => 'Снаряжение для гольфа'
                    ],
                    'Jewelry' => [
                        'en' => 'Jewelry',
                        'ru' => 'Ювелирные изделия'
                    ],
                    'Kitchen equipment' => [
                        'en' => 'Kitchen equipment',
                        'ru' => 'Кухонная утворь'
                    ],
                    'Luggage' => [
                        'en' => 'Luggage',
                        'ru' => 'Багаж'
                    ],
                    'Mobile phones' => [
                        'en' => 'Mobile phones',
                        'ru' => 'Мобильные телефоны'
                    ],
                    'Perfumes and cosmetics' => [
                        'en' => 'Perfumes and cosmetics',
                        'ru' => 'Парфюмерия и косметика'
                    ],
                    'Plants' => [
                        'en' => 'Plants',
                        'ru' => 'Растения'
                    ],
                    'Sporting equipment' => [
                        'en' => 'Sporting equipment',
                        'ru' => 'Спортивная экипировка'
                    ],
                    'Tools' => [
                        'en' => 'Tools',
                        'ru' => 'Инструменты'
                    ],
                    'Toys' => [
                        'en' => 'Toys',
                        'ru' => 'Игрушки'
                    ],
                    'Washing machines and dishwashers' => [
                        'en' => 'Washing machines and dishwashers',
                        'ru' => 'Стиральные машины'
                    ],
                    'Other' => [
                        'en' => 'Other',
                        'ru' => 'Другое'
                    ]
                ],
            ],
            'Specialty products' => [
                'title' => [
                    'en' => 'Specialty products',
                    'ru' => 'Специальные товары'
                ],
                'categories' => [
                    'Book' => [
                        'en' => 'Book',
                        'ru' => 'Кгини'
                    ],
                    'Cleaning & Detergents products' => [
                        'en' => 'Cleaning & Detergents products',
                        'ru' => 'Моющие средства'
                    ],
                    'Flowers' => [
                        'en' => 'Flowers',
                        'ru' => 'Цветы'
                    ],
                    'Medicines and vitamins' => [
                        'en' => 'Medicines and vitamins',
                        'ru' => 'Медикаменты и витамины'
                    ],
                    'Newspapers and magazines' => [
                        'en' => 'Newspapers and magazines',
                        'ru' => 'Газеты и журналы'
                    ],
                    'Pet food' => [
                        'en' => 'Pet food',
                        'ru' => 'Корм для животных '
                    ],
                    'Solar Panel & Wind System' => [
                        'en' => 'Solar Panel & Wind System',
                        'ru' => 'Солнечные батареи и ветряки'
                    ],
                    'Toothpaste, soap, and shampoo' => [
                        'en' => 'Toothpaste, soap, and shampoo',
                        'ru' => 'Зубные пасты, мыло, шампунь'
                    ],
                    'TV Chanel' => [
                        'en' => 'TV Chanel',
                        'ru' => 'Телепрограммы'
                    ],
                    'Virtual Game' => [
                        'en' => 'Virtual Game',
                        'ru' => 'Виртуальные игры'
                    ],
                    'Other' => [
                        'en' => 'Other',
                        'ru' => 'Другое'
                    ]
                ],
            ],
            'City' => [
                'title' => [
                    'en' => 'City',
                    'ru' => 'Город'
                ],
            ],
            'Cruise' => [
                'title' => [
                    'en' => 'Cruise',
                    'ru' => 'Круиз'
                ],
            ],
            'Resort' => [
                'title' => [
                    'en' => 'Resort',
                    'ru' => 'Курорт'
                ],
            ],
            'Hotel' => [
                'title' => [
                    'en' => 'Hotel',
                    'ru' => 'Отель'
                ],
            ],
            'National parks' => [
                'title' => [
                    'en' => 'National parks',
                    'ru' => 'Национальный парк'
                ],
            ],
            'State parks' => [
                'title' => [
                    'en' => 'State parks',
                    'ru' => 'Региональный парк'
                ],
            ],
            'Beaches' => [
                'title' => [
                    'en' => 'Beaches',
                    'ru' => 'Пляжи'
                ],
            ],
            'Other' => [
                'title' => [
                    'en' => 'Other',
                    'ru' => 'ДРУГОЕ'
                ],
            ],
        ];

        $reviewCategory = ReviewCategory::whereSlug('goods')->first();
        foreach($categories as $categoryName => $categoryData){
            $isNotRegionEmpty = \Illuminate\Support\Arr::has($categoryData, 'categories');
            $reviewCategoryId = $isNotRegionEmpty ? $reviewCategory->id : null;

            $data = [
                'review_category_id' => $reviewCategoryId
            ];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $data[$localeKey] = [
                    'name' => \Illuminate\Support\Arr::get($categoryData['title'], $localeKey, app('laravellocalization')->getDefaultLocale())
                ];
            }
            $category = CategoryByReview::create($data);
            if($isNotRegionEmpty){
                $groups = $categoryData['categories'];
                foreach($groups as $group){
                    $groupData = [
                        'category_id' => $category->id,
                    ];
                    foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                        $groupData[$localeKey] = [
                            'name' => \Illuminate\Support\Arr::get($group, $localeKey, app('laravellocalization')->getDefaultLocale())
                        ];
                    }
                    GroupByReview::create($groupData);
                }
            }
        }
    }
}
