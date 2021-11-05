<?php

use Illuminate\Database\Seeder;
use \App\Models\Region;
use \App\Models\Country;

class CountryRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
//            'USA' => [
//                'name' => [
//                    'en' => 'USA',
//                    'ru' => 'США'
//                ],
//                'region_naming' => [
//                    'en' => 'State',
//                    'ru' => 'Штат'
//                ],
//                'regions' => [
//                    'Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming',
//                ],
//                'is_enable' => false
//            ],
//            'Australia' => [
//                'name' => [
//                    'en' => 'Australia',
//                    'ru' => 'Австралия'
//                ],
//                'region_naming' => [
//                    'en' => 'State',
//                    'ru' => 'Штат'
//                ],
//                'regions' => [
//                    'Queensland','New South Wales','Australian Capital Territory','Victoria','South Australia','Western Australia','Tasmania','Northern Territory',
//                ],
//                'is_enable' => false
//            ],
//            'United Kingdom' => [
//                'name' => [
//                    'en' => 'United Kingdom',
//                    'ru' => 'Великая Британия'
//                ],
//                'region_naming' => [
//                    'en' => 'Region',
//                    'ru' => 'Регион'
//                ],
//                'regions' => [
//                    'South East','London','North West','East of England','West Midlands','South West','Yorkshire and the Humber','East Midlands','North East',
//                ],
//                'is_enable' => false
//            ],
//            'India' => [
//                'name' => [
//                    'en' => 'India',
//                    'ru' => 'Индия'
//                ],
//                'region_naming' => [
//                    'en' => 'State',
//                    'ru' => 'Штат'
//                ],
//                'regions' => [
//                    'Andhra Pradesh','Arunachal Pradesh','Assam','Bihar','Chhattisgarh','Goa','Gujarat','Haryana','Himachal Pradesh','Jharkhand','Karnataka','Kerala','Madhya Pradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Odisha','Punjab','Rajasthan','Sikkim','Tamil Nadu','Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal',
//                ],
//                'is_enable' => false
//            ],
//            'Canada' => [
//                'name' => [
//                    'en' => 'Canada',
//                    'ru' => 'Канада'
//                ],
//                'region_naming' => [
//                    'en' => 'Province',
//                    'ru' => 'Провинция'
//                ],
//                'regions' => [
//                    'Alberta','British Columbia','Manitoba','New Brunswick','Newfoundland and Labrador','Northwest Territories','Nova Scotia','Nunavut','Ontario','Prince Edward Island','Quebec','Saskatchewan',
//                ],
//                'is_enable' => false
//            ],
//            'China' => [
//                'name' => [
//                    'en' => 'China',
//                    'ru' => 'Китай'
//                ],
//                'region_naming' => [
//                    'en' => 'Province',
//                    'ru' => 'Провинция'
//                ],
//                'regions' => [
//                    'Anhui','Fujian','Gansu','Guangdong','Guizhou','Hainan','Hebei','Heilongjiang','Henan','Hubei','Hunan','Jiangsu','Jiangxi','Jilin','Liaoning','Qinghai','Shaanxi','Shandong','Shanxi','Sichuan','Yunnan','Zhejiang','Guangxi','Inner Mongolia','Ningxia ','Xinjiang ','Tibet ','Beijing','Chongqing','Shanghai','Tianjin','Hong Kong','Macau',
//                ],
//                'is_enable' => false
//            ],
//            'Pakistan' => [
//                'name' => [
//                    'en' => 'Pakistan',
//                    'ru' => 'Пакистан'
//                ],
//                'region_naming' => [
//                    'en' => 'Province',
//                    'ru' => 'Провинция'
//                ],
//                'regions' => [
//                    'Sindh','Punjab','Khyber Pakhtunkhwa','Islamabad Capital Territory','Gilgit-Baltistan','Balochistan','Azad Kashmir',
//                ],
//                'is_enable' => false
//            ],
//            'South Africa' => [
//                'name' => [
//                    'en' => 'South Africa',
//                    'ru' => 'ЮАР'
//                ],
//                'region_naming' => [
//                    'en' => 'Province',
//                    'ru' => 'Провинция'
//                ],
//                'regions' => [
//                    'Eastern Cape','Free State','Gauteng','KwaZulu-Natal','Limpopo','Mpumalanga','North West','Northern Cape','Western Cape',
//                ],
//                'is_enable' => false
//            ],
            'Российская федерация' => [
                'name' => [
                    'en' => 'Russia',
                    'ru' => 'Российская федерация'
                ],
                'region_naming' => [
                    'en' => 'Region',
                    'ru' => 'Регион'
                ],
                'regions' => [
                    'Белгородская область','Брянская область','Владимирская область','Воронежская область','Ивановская область','Калужская область','Костромская область','Курская область','Липецкая область','Московская область','Орловская область','Рязанская область','Смоленская область','Тамбовская область','Тверская область','Тульская область','Ярославская область','г. Москва','Северо-Западный федеральный округ','Республика Карелия','Республика Коми','Архангельская область ','Ненецкий автономный округ','Вологодская область','Калининградская область','Ленинградская область','Мурманская область','Новгородская область','Псковская область','г. Санкт-Петербург','Южный федеральный округ','Республика Адыгея','Республика Дагестан','Республика Ингушетия','Кабардино-Балкарская Республика','Республика Калмыкия','Карачаево-Черкесская Республика','Республика Северная Осетия - Алания','Чеченская Республика','Краснодарский край','Ставропольский край','Астраханская область','Волгоградская область','Ростовская область','Приволжский федеральный округ','Республика Башкортостан','Республика Марий Эл','Республика Мордовия','Республика Татарстан','Удмуртская Республика','Чувашская Республика','Кировская область','Нижегородская область','Оренбургская область','Пензенская область','Пермская область','Коми-Пермяцкий автономный округ','Самарская область','Саратовская область','Ульяновская область','Уральский федеральный округ','Курганская область','Свердловская область','Тюменская область','Ханты-Мансийский автономный округ - Югра','Ямало-Ненецкий автономный округ','Челябинская область','Сибирский федеральный округ','Республика Алтай','Республика Бурятия','Республика Тыва','Республика Хакасия','Алтайский край','Красноярский край','Таймырский (Долгано-Ненецкий) автономный округ','Эвенкийский автономный округ','Иркутская область','Бурятский автономный округ','Кемеровская область','Новосибирская область','Омская область','Томская область','Читинская область','Бурятский автономный округ','Дальневосточный федеральный округ','Республика Саха (Якутия)','Приморский край','Хабаровский край','Амурская область','Камчатская область','Корякский автономный округ','Магаданская область','Сахалинская область','Еврейская автономная область','Чукотский автономный округ',
                ],
                'is_enable' => true
            ],
//            'Afghanistan' => [
//                'is_enable' => false
//            ], 'Albania' => ['is_enable' => false], 'Algeria' => ['is_enable' => false], 'American Samoa' => ['is_enable' => false], 'Andorra' => ['is_enable' => false], 'Angola' => ['is_enable' => false], 'Anguilla' => ['is_enable' => false], 'Antigua and Barbuda' => ['is_enable' => false], 'Argentina' => ['is_enable' => false], 'Armenia' => ['is_enable' => false], 'Aruba' => ['is_enable' => false], 'Austria' => ['is_enable' => false], 'Azerbaijan' => ['is_enable' => false], 'Bangladesh' => ['is_enable' => false], 'Barbados' => ['is_enable' => false], 'Bahamas' => ['is_enable' => false], 'Bahrain' => ['is_enable' => false], 'Belarus' => ['is_enable' => false], 'Belgium' => ['is_enable' => false], 'Belize' => ['is_enable' => false], 'Benin' => ['is_enable' => false], 'Bermuda' => ['is_enable' => false], 'Bhutan' => ['is_enable' => false], 'Bolivia' => ['is_enable' => false], 'Bosnia and Herzegovina' => ['is_enable' => false], 'Botswana' => ['is_enable' => false], 'Brazil' => ['is_enable' => false], 'British Indian Ocean Territory' => ['is_enable' => false], 'British Virgin Islands' => ['is_enable' => false], 'Brunei Darussalam' => ['is_enable' => false], 'Bulgaria' => ['is_enable' => false], 'Burkina Faso' => ['is_enable' => false], 'Burma' => ['is_enable' => false], 'Burundi' => ['is_enable' => false], 'Cambodia' => ['is_enable' => false], 'Cameroon' => ['is_enable' => false], 'Cape Verde' => ['is_enable' => false], 'Cayman Islands' => ['is_enable' => false], 'Central African Republic' => ['is_enable' => false], 'Chad' => ['is_enable' => false], 'Chile' => ['is_enable' => false], 'Christmas Island' => ['is_enable' => false], 'Cocos (Keeling) Islands' => ['is_enable' => false], 'Colombia' => ['is_enable' => false], 'Comoros' => ['is_enable' => false], 'Congo-Brazzaville' => ['is_enable' => false], 'Congo-Kinshasa' => ['is_enable' => false], 'Cook Islands' => ['is_enable' => false], 'Costa Rica' => ['is_enable' => false], 'Croatia' => ['is_enable' => false], 'Cura?ao' => ['is_enable' => false], 'Cyprus' => ['is_enable' => false], 'Czech Republic' => ['is_enable' => false], 'Denmark' => ['is_enable' => false], 'Djibouti' => ['is_enable' => false], 'Dominica' => ['is_enable' => false], 'Dominican Republic' => ['is_enable' => false], 'East Timor' => ['is_enable' => false], 'Ecuador' => ['is_enable' => false], 'El Salvador' => ['is_enable' => false], 'Egypt' => ['is_enable' => false], 'Equatorial Guinea' => ['is_enable' => false], 'Eritrea' => ['is_enable' => false], 'Estonia' => ['is_enable' => false], 'Ethiopia' => ['is_enable' => false], 'Falkland Islands' => ['is_enable' => false], 'Faroe Islands' => ['is_enable' => false], 'Federated States of Micronesia' => ['is_enable' => false], 'Fiji' => ['is_enable' => false], 'Finland' => ['is_enable' => false], 'France' => ['is_enable' => false], 'French Guiana' => ['is_enable' => false], 'French Polynesia' => ['is_enable' => false], 'French Southern Lands' => ['is_enable' => false], 'Gabon' => ['is_enable' => false], 'Gambia' => ['is_enable' => false], 'Georgia' => ['is_enable' => false], 'Germany' => ['is_enable' => false], 'Ghana' => ['is_enable' => false], 'Gibraltar' => ['is_enable' => false], 'Greece' => ['is_enable' => false], 'Greenland' => ['is_enable' => false], 'Grenada' => ['is_enable' => false], 'Guadeloupe' => ['is_enable' => false], 'Guam' => ['is_enable' => false], 'Guatemala' => ['is_enable' => false], 'Guernsey' => ['is_enable' => false], 'Guinea' => ['is_enable' => false], 'Guinea-Bissau' => ['is_enable' => false], 'Guyana' => ['is_enable' => false], 'Haiti' => ['is_enable' => false], 'Heard and McDonald Islands' => ['is_enable' => false], 'Honduras' => ['is_enable' => false], 'Hong Kong' => ['is_enable' => false], 'Hungary' => ['is_enable' => false], 'Iceland' => ['is_enable' => false], 'Indonesia' => ['is_enable' => false], 'Iraq' => ['is_enable' => false], 'Ireland' => ['is_enable' => false], 'Isle of Man' => ['is_enable' => false], 'Israel' => ['is_enable' => false], 'Italy' => ['is_enable' => false], 'Jamaica' => ['is_enable' => false], 'Japan' => ['is_enable' => false], 'Jersey' => ['is_enable' => false], 'Jordan' => ['is_enable' => false], 'Kazakhstan' => ['is_enable' => false], 'Kenya' => ['is_enable' => false], 'Kiribati' => ['is_enable' => false], 'Kuwait' => ['is_enable' => false], 'Kyrgyzstan' => ['is_enable' => false], 'Laos' => ['is_enable' => false], 'Latvia' => ['is_enable' => false], 'Lebanon' => ['is_enable' => false], 'Lesotho' => ['is_enable' => false], 'Liberia' => ['is_enable' => false], 'Libya' => ['is_enable' => false], 'Liechtenstein' => ['is_enable' => false], 'Lithuania' => ['is_enable' => false], 'Luxembourg' => ['is_enable' => false], 'Macau' => ['is_enable' => false], 'Macedonia' => ['is_enable' => false], 'Madagascar' => ['is_enable' => false], 'Malawi' => ['is_enable' => false], 'Malaysia' => ['is_enable' => false], 'Maldives' => ['is_enable' => false], 'Mali' => ['is_enable' => false], 'Malta' => ['is_enable' => false], 'Marshall Islands' => ['is_enable' => false], 'Martinique' => ['is_enable' => false], 'Mauritania' => ['is_enable' => false], 'Mauritius' => ['is_enable' => false], 'Mayotte' => ['is_enable' => false], 'Mexico' => ['is_enable' => false], 'Moldova' => ['is_enable' => false], 'Monaco' => ['is_enable' => false], 'Mongolia' => ['is_enable' => false], 'Montenegro' => ['is_enable' => false], 'Montserrat' => ['is_enable' => false], 'Morocco' => ['is_enable' => false], 'Mozambique' => ['is_enable' => false], 'Namibia' => ['is_enable' => false], 'Nauru' => ['is_enable' => false], 'Nepal' => ['is_enable' => false], 'Netherlands' => ['is_enable' => false], 'New Caledonia' => ['is_enable' => false], 'New Zealand' => ['is_enable' => false], 'Nicaragua' => ['is_enable' => false], 'Niger' => ['is_enable' => false], 'Nigeria' => ['is_enable' => false], 'Niue' => ['is_enable' => false], 'Norfolk Island' => ['is_enable' => false], 'Northern Mariana Islands' => ['is_enable' => false], 'Norway' => ['is_enable' => false], 'Oman' => ['is_enable' => false], 'Palau' => ['is_enable' => false], 'Panama' => ['is_enable' => false], 'Papua New Guinea' => ['is_enable' => false], 'Paraguay' => ['is_enable' => false], 'Peru' => ['is_enable' => false], 'Philippines' => ['is_enable' => false], 'Pitcairn Islands' => ['is_enable' => false], 'Poland' => ['is_enable' => false], 'Portugal' => ['is_enable' => false], 'Puerto Rico' => ['is_enable' => false], 'Qatar' => ['is_enable' => false], 'R?union' => ['is_enable' => false], 'Romania' => ['is_enable' => false], 'Russia' => ['is_enable' => false], 'Rwanda' => ['is_enable' => false], 'Saint Barth?lemy' => ['is_enable' => false], 'Saint Helena' => ['is_enable' => false], 'Saint Kitts and Nevis' => ['is_enable' => false], 'Saint Lucia' => ['is_enable' => false], 'Saint Martin' => ['is_enable' => false], 'Saint Pierre and Miquelon' => ['is_enable' => false], 'Saint Vincent' => ['is_enable' => false], 'Samoa' => ['is_enable' => false], 'San Marino' => ['is_enable' => false], 'S?o Tom? and Pr?ncipe' => ['is_enable' => false], 'Saudi Arabia' => ['is_enable' => false], 'Senegal' => ['is_enable' => false], 'Serbia' => ['is_enable' => false], 'Seychelles' => ['is_enable' => false], 'Sierra Leone' => ['is_enable' => false], 'Singapore' => ['is_enable' => false], 'Sint Maarten' => ['is_enable' => false], 'Slovakia' => ['is_enable' => false], 'Slovenia' => ['is_enable' => false], 'Solomon Islands' => ['is_enable' => false], 'Somalia' => ['is_enable' => false], 'South Georgia' => ['is_enable' => false], 'South Korea' => ['is_enable' => false], 'Spain' => ['is_enable' => false], 'Sri Lanka' => ['is_enable' => false], 'Sudan' => ['is_enable' => false], 'Suriname' => ['is_enable' => false], 'Svalbard and Jan Mayen' => ['is_enable' => false], 'Sweden' => ['is_enable' => false], 'Swaziland' => ['is_enable' => false], 'Switzerland' => ['is_enable' => false], 'Syria' => ['is_enable' => false], 'Taiwan' => ['is_enable' => false], 'Tajikistan' => ['is_enable' => false], 'Tanzania' => ['is_enable' => false], 'Thailand' => ['is_enable' => false], 'Togo' => ['is_enable' => false], 'Tokelau' => ['is_enable' => false], 'Tonga' => ['is_enable' => false], 'Trinidad and Tobago' => ['is_enable' => false], 'Tunisia' => ['is_enable' => false], 'Turkey' => ['is_enable' => false], 'Turkmenistan' => ['is_enable' => false], 'Turks and Caicos Islands' => ['is_enable' => false], 'Tuvalu' => ['is_enable' => false], 'Uganda' => ['is_enable' => false], 'Ukraine' => ['is_enable' => false], 'United Arab Emirates' => ['is_enable' => false], 'Uruguay' => ['is_enable' => false], 'Uzbekistan' => ['is_enable' => false], 'Vanuatu' => ['is_enable' => false], 'Vatican City' => ['is_enable' => false], 'Vietnam' => ['is_enable' => false], 'Venezuela' => ['is_enable' => false], 'Wallis and Futuna' => ['is_enable' => false], 'Western Sahara' => ['is_enable' => false], 'Yemen' => ['is_enable' => false], 'Zambia' => ['is_enable' => false], 'Zimbabwe' =>['is_enable' => false]
        ];

        foreach($countries as $countryName => $countryData){
            $slug = \Illuminate\Support\Str::slug($countryName);
            $country = Country::firstOrCreate(['slug' => $slug]);
            $transData = [];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $naming = $countryName;
                if(\Illuminate\Support\Arr::has($countryData, 'name')){
                    $naming = \Illuminate\Support\Arr::get($countryData['name'], $localeKey, app('laravellocalization')->getDefaultLocale());
                }
                $transData[$localeKey] = [
                    'country' => $naming
                ];
            }
            $transData['is_enable'] = $countryData['is_enable'];
            Country::updateOrCreate(
                [
                    'slug' => $slug
                ],
                $transData);
            $regions = \Illuminate\Support\Arr::has($countryData, 'regions')
                ?  \Illuminate\Support\Arr::get($countryData, 'regions')
                : [];
            if(!empty($regions)){
                foreach($regions as $regionName){
                    $slug = \Illuminate\Support\Str::slug($regionName);
                    $region = Region::firstOrCreate(['slug' => $slug, 'country_id' => $country->id]);
                    $transRegionData = [];
                    foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                        $naming = $regionName;
//                        if(\Illuminate\Support\Arr::has($countryData, 'name')){
//                            $naming = \Illuminate\Support\Arr::get($countryData['name'], $localeKey, app('laravellocalization')->getDefaultLocale());
//                        }
                        $regionNaming = 'Region';
                        if(\Illuminate\Support\Arr::has($countryData, 'region_naming')){
                            $regionNaming = \Illuminate\Support\Arr::get($countryData['region_naming'], $localeKey, app('laravellocalization')->getDefaultLocale());
                        }
                        $transRegionData[$localeKey] = [
                            'region' => $naming,
                            'region_naming' => $regionNaming
                        ];
                    }

                    Region::updateOrCreate(
                        [
                            'slug' => $slug,
                            'country_id' => $country->id
                        ],
                        $transRegionData
                    );
                }
            }
        }
    }
}
