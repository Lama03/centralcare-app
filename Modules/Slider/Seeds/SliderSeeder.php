<?php

namespace Modules\Slider\Seeds;

use Illuminate\Database\Seeder;
use Modules\Slider\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders =
            [
                [
                    'ar' => [
                        'first_title' => 'رمز الثقة',
                        'second_title' => 'في الرعاية الطبية',
                        'description' => '                                        نوفر خدمات ذات جودة عالية تحت سقف واحد بأحدث التقنيات المتقدمة في جميع التخصصات ( أسنان – جلدية – طبي ).',
                    ],
                    'en' => [
                        'first_title' => 'A Symbol of trust',
                        'second_title' => 'in Medical Care.',
                        'description' => 'We provide high quality services under one roof with the latest advanced technologies in all specialties (dental - dermatology - medical)',
                    ],
                    'image' => '/web/assets/images/slider/slider-1.png'
                ],
                [
                    'ar' => [
                        'first_title' => 'نوفر لكم أفضل خدمات',
                        'second_title' => 'الأسنان الجلدية والطبية',
                        'description' => 'نوفر خدمات ذات جودة عالية تحت سقف واحد بأحدث التقنيات المتقدمة في جميع التخصصات ( أسنان – جلدية – طبي ).',
                    ],
                    'en' => [
                        'first_title' => 'We provide the best',
                        'second_title' => 'Dental, Derma and Medical services.',
                        'description' => 'We provide high quality services under one roof with the latest advanced technologies in all specialties (dental - dermatology - medical)',
                    ],
                    'image' => '/web/assets/images/slider/slider-2.jpg'
                ],
                [
                    'ar' => [
                        'first_title' => 'إستمتعي بالجمال',
                        'second_title' => 'الآن ومدى الحياة',
                        'description' => 'نوفر خدمات ذات جودة عالية تحت سقف واحد بأحدث التقنيات المتقدمة في جميع التخصصات ( أسنان – جلدية – طبي ).',
                    ],
                    'en' => [
                        'first_title' => 'Feel the Beauty',
                        'second_title' => 'now and forever.',
                        'description' => 'We provide high quality services under one roof with the latest advanced technologies in all specialties (dental - dermatology - medical)',
                    ],
                    'image' => '/web/assets/images/slider/slider-3.jpg'
                ]
            ];

        foreach ($sliders as $slider){
            Slider::create($slider);
        }
    }
}
