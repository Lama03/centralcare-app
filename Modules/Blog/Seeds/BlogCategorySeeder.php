<?php

namespace Modules\Blog\Seeds;


use Illuminate\Database\Seeder;
use Modules\Blog\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
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
                'name'       => 'أسنان',
                'slug'       => 'أسنان',
            ],
            'en' => [
                'name'       => 'dental',
                'slug'       => 'dental',
            ],
        ];

        BlogCategory::create($data);

        $data = [
            'ar' => [
                'name'       => 'جلدية',
                'slug'       => 'جلدية',
            ],
            'en' => [
                'name'       => 'dermal',
                'slug'       => 'dermal',
            ],
        ];

        BlogCategory::create($data);
    }
}
