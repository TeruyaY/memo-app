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
            ['color' => 'none', 'name' => 'none', 'hex' => '#FFFFFF'],
            ['color' => 'red', 'name' => 'red', 'hex' => '#EF4444'],
            ['color' => 'blue', 'name' => 'blue', 'hex' => '#3B82F6'],
            ['color' => 'green', 'name' => 'green', 'hex' => '#10B981'],
            ['color' => 'yellow', 'name' => 'yellow', 'hex' => '#FACC15'],
            ['color' => 'orange', 'name' => 'orange', 'hex' => '#F59E0B'],
            ['color' => 'purple', 'name' => 'purple', 'hex' => '#8B5CF6'],
        ];


        foreach ($tags as $tag) {
            Tag::firstOrCreate($tag);
        }

    }
}
