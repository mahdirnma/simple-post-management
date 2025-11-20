<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'title' => 'tag 1',
            'description' => 'lorem ipsum 1',
        ]);
        Tag::create([
            'title' => 'tag 2',
            'description' => 'lorem ipsum 2',
        ]);

    }
}
