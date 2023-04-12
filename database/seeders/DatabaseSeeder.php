<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $categories = [
            [
                'name' => 'đồ ăn',
                'hot'  => 0
            ],
            [
                'name' => 'đồ uống',
                'hot'  => 0
            ],
            [
                'name' => 'đồ ăn sáng',
                'hot'  => 0
            ],
            [
                'name' => 'đồ ăn tối',
                'hot'  => 1
            ],
        ];

        foreach ($categories as $item) {
            Category::create([
                'name'       => $item['name'],
                'slug'       => Str::slug($item['name']),
                'created_at' => Carbon::now(),
                'hot'        => $item['hot']
            ]);
        }
    }
}
