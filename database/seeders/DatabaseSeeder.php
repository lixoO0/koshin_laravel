<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Calling the individual seeders
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);

        // Creating 100 blog posts using the factory
        BlogPost::factory(100)->create();
    }
}
