<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "id" => "1",
                "name" => "Makanan",
                "slug" => "makanan",
            ],
            [
                "id" => "2",
                "name" => "Minuman",
                "slug" => "minuman",
            ],
            [
                "id" => "3",
                "name" => "Snack",
                "slug" => "snack",
            ]
        ];
        foreach ($categories as $key => $value) {
            Category::create([
                "id" => $value["id"],
                "name" => $value["name"],
                "slug" => $value["slug"],
            ]);
        }
    }
}
