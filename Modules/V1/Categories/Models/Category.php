<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Categories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\V1\Products\Models\Product;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
