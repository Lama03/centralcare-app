<?php

namespace Modules\Offer\Seeds;


use Illuminate\Database\Seeder;
use Modules\Offer\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'ar' => [
                'name'       => 'تبييض الأسنان'
            ],
            'en' => [
                'name'       => 'Teeth whitening'
            ],
            'price' => '1200',
            'service_id' => 1,
            'image' => '/web/assets/images/offer.png'
        ];
        Offer::create($data);
        $data = [
            'ar' => [
                'name'       => 'جلسة ليزر إزالة شعر جسم كامل مع ظهر وبطن'
            ],
            'en' => [
                'name'       => 'Full body laser hair removal session with back and abdomen'
            ],
            'price' => '2000',
            'service_id' => 1,
            'image' => '/web/assets/images/offer.png'
        ];
        Offer::create($data);
        $data = [
            'ar' => [
                'name'       => 'تبييض الأسنان'
            ],
            'en' => [
                'name'       => 'Teeth whitening'
            ],
            'price' => '1200',
            'service_id' => 1,
            'image' => '/web/assets/images/offer.png'
        ];
        Offer::create($data);
        $data = [
            'ar' => [
                'name'       => 'جلسة ليزر إزالة شعر جسم كامل مع ظهر وبطن'
            ],
            'en' => [
                'name'       => 'Full body laser hair removal session with back and abdomen'
            ],
            'price' => '2000',
            'service_id' => 1,
            'image' => '/web/assets/images/offer.png'
        ];

        Offer::create($data);

    }
}
