<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'laravel',
            'slug' => Str::slug(request('name')),
        ]);

        Category::create([
            'name' => 'PHP',
            'slug' => Str::slug(request('name')),
        ]);

        Category::create([
            'name' => 'Yii2',
            'slug' => Str::slug(request('name')),
        ]);

        Category::create([
            'name' => 'Python',
            'slug' => Str::slug(request('name')),
        ]);
    }
}
