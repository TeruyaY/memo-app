<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class InitialSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['color' => 'red', 'name' => 'red', 'hex' => '#EF4444', 'user_id' => 1],
            ['color' => 'blue', 'name' => 'blue', 'hex' => '#3B82F6', 'user_id' => 1],
            ['color' => 'green', 'name' => 'green', 'hex' => '#10B981', 'user_id' => 1],
            ['color' => 'yellow', 'name' => 'yellow', 'hex' => '#FACC15', 'user_id' => 1],
            ['color' => 'orange', 'name' => 'orange', 'hex' => '#F59E0B', 'user_id' => 1],
            ['color' => 'purple', 'name' => 'purple', 'hex' => '#8B5CF6', 'user_id' => 1],
        ];


        foreach ($tags as $tag) {
            Tag::firstOrCreate($tag);
        }

    }
}
