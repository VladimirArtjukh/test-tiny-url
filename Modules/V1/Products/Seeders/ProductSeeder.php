<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Products\Seeders;

use Illuminate\Database\Seeder;
use Modules\V1\Products\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100000000; $i++) { // Batch for demo; scale with chunking for 100M
            Product::create([
                'name' => fake()->word,
                'description' => fake()->sentence,
                'price' => fake()->randomFloat(2, 1, 1000),
                'is_top' => fake()->boolean(10),
            ]);
        }
    }
}
