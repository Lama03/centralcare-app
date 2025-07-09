<?php

namespace Modules\Specificity\Seeds;


use Illuminate\Database\Seeder;
use Modules\Specificity\Models\Specificity;

class SpecificitySeeder extends Seeder
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
                'name'              => 'جراحة وزراعة الأسنان',
                'slug'              => 'جراحة-وزراعة-الأسنان',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'جراحة وزراعة الأسنان',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'Dental Surgery and Implants',
                'slug'              => 'Dental-Surgery-and-Implants',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'Dental Surgery and Implants',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-1.jpg',
            'image' => '/web/assets/images/services/service-1.jpg',
            'service_id' => 2        ];

        Specificity::create($data);

        $data = [
            'ar' => [
                'name'              => 'طب وتجميل الأسنان',
                'slug'              => 'طب-وتجميل-الأسنان',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'طب وتجميل الأسنان',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'Dentistry and Cosmetic Dentistry',
                'slug'              => 'Dentistry-and-Cosmetic-Dentistry',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'Dentistry and Cosmetic Dentistry',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-2.jpg',
            'image' => '/web/assets/images/services/service-2.jpg',
            'service_id' => 2
        ];

        Specificity::create($data);

        $data = [
            'ar' => [
                'name'              => 'تقويم الأسنان',
                'slug'              => 'تقويم-الأسنان',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'تقويم الأسنان',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'Orthodontics',
                'slug'              => 'Orthodontics',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'Orthodontics',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-3.jpg',
            'image' => '/web/assets/images/services/service-3.jpg',
            'service_id' => 2
        ];

        Specificity::create($data);

        $data = [
            'ar' => [
                'name'              => 'طب أسنان الأطفال',
                'slug'              => 'طب-أسنان-الأطفال',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'طب أسنان الأطفال',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'Pediatric Dentistry',
                'slug'              => 'Pediatric-Dentistry',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'Pediatric Dentistry',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-4.jpg',
            'image' => '/web/assets/images/services/service-4.jpg',
            'service_id' => 2
        ];

        Specificity::create($data);

        $data = [
            'ar' => [
                'name'              => 'علاج وتجميل اللثة',
                'slug'              => 'علاج-وتجميل-اللثة',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'علاج وتجميل اللثة',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'Gum Treatment and Beautification',
                'slug'              => 'Gum Treatment-and-Beautification',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'Gum Treatment and Beautification',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-1.jpg',
            'image' => '/web/assets/images/services/service-1.jpg',
            'service_id' => 2
        ];

        Specificity::create($data);

        $data = [
            'ar' => [
                'name'              => 'صحة الفم والأسنان',
                'slug'              => 'صحة-الفم-والأسنان',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'صحة الفم والأسنان',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'The Mouth and Teeth`s Health',
                'slug'              => 'The-Mouth-and-Teeth`s-Health',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'The Mouth and Teeth`s Health',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-2.jpg',
            'image' => '/web/assets/images/services/service-2.jpg',
            'service_id' => 2
        ];

        Specificity::create($data);

        $data = [
            'ar' => [
                'name'              => 'علاج جذور الاسنان',
                'slug'              => ' علاج-جذور-الاسنان',
                'description'       => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_title'        => 'علاج جذور الاسنان',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'في عيادات رام ستعيش تجربة فريدة من نوعها أثناء فترة علاجك لأننا رائدون في الرعاية الصحية بوجود بيئة مريحة ورعاية متكاملة نوفرها لك، كما إننا نهدف الى بناء جسور الثقة مع جميع عملاؤنا عن طريق التعليم والتثقيف الصحي بالإضافة الى المصداقية',
                'meta_keywords'     => 'المصداقية, عيادات رام',
            ],
            'en' => [
                'name'              => 'Endodontics',
                'slug'              => 'Endodontics',
                'description'       => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_title'        => 'Endodontics',
                'canonical_url'     => '127.0.0.1:8000',
                'meta_description'  => 'At Ram Clinics, you will live a unique experience during your treatment because we are pioneers in healthcare with a comfortable environment and integrated care that we provide to you, and we aim to build bridges of trust with all our clients through education and health education in addition to credibility',
                'meta_keywords'     => 'credibility, At Ram Clinics',
            ],
            'icon' => '/web/assets/images/services/service-3.jpg',
            'image' => '/web/assets/images/services/service-3.jpg',
            'service_id' => 2
        ];

        Specificity::create($data);

    }
}
