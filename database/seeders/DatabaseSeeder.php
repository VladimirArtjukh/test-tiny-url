<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\V1\Categories\Seeders\CategorySeeder;
use Modules\V1\Products\Seeders\ProductSeeder;
use Modules\V1\Users\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
