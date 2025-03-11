<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Categories\Seeders;

use Illuminate\Database\Seeder;
use Modules\V1\Categories\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) { // Batch for demo; scale with chunking for 100M
            Category::create([
                'name' => fake()->word,
            ]);
        }
    }
}
