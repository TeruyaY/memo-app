<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@example.com'], // このメールアドレスがいなければ作る、いれば更新
            [
                'name' => 'Test User',
                'password' => bcrypt('password123'), // 🌟 パスワードを 'password123' に固定
            ]
        );

        $this->call([
            InitialSettingsSeeder::class,
        ]);

    }
}
