<?php

use Illuminate\Database\Seeder;

class DefaultImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultImages = [
            [
                'src' => 'images/default_images/congratulations/novyy_god.jpg',
                'name' => 'novyy_god',
                'original_name' => 'novyy_god.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/pravoslavnoe_rozhdestvo.jpg',
                'name' => 'pravoslavnoe_rozhdestvo',
                'original_name' => 'pravoslavnoe_rozhdestvo.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/den_zashchitnika_otechestva.jpg',
                'name' => 'den_zashchitnika_otechestva',
                'original_name' => 'den_zashchitnika_otechestva.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/mezhdunarodnyy_zhenskiy_den.jpg',
                'name' => 'mezhdunarodnyy_zhenskiy_den',
                'original_name' => 'mezhdunarodnyy_zhenskiy_den.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/prazdnik_vesny_i_truda.jpg',
                'name' => 'prazdnik_vesny_i_truda',
                'original_name' => 'prazdnik_vesny_i_truda.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/den_pobedy.jpg',
                'name' => 'den_pobedy',
                'original_name' => 'den_pobedy.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/den_rossii.jpg',
                'name' => 'den_rossii',
                'original_name' => 'den_rossii.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/den_narodnogo_edinstva.jpg',
                'name' => 'den_narodnogo_edinstva',
                'original_name' => 'den_narodnogo_edinstva.jpg'
            ],
        ];

        foreach($defaultImages as $defaultImage){
            \App\Models\DefaultImage::firstOrCreate($defaultImage);
        }
    }
}
