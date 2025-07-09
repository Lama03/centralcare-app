<?php

namespace Modules\News\Seeds;


use Illuminate\Database\Seeder;
use Modules\News\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
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
                'name'       => 'اخبار',
                'slug'       => 'اخبار',
            ],
            'en' => [
                'name'       => 'news',
                'slug'       => 'news',
            ],
        ];

        NewsCategory::create($data);

        $data = [
            'ar' => [
                'name'       => 'احداث',
                'slug'       => 'احداث',
            ],
            'en' => [
                'name'       => 'events',
                'slug'       => 'events',
            ],
        ];

        NewsCategory::create($data);
    }
}
