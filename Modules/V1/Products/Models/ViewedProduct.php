<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewedProduct extends Model
{
    /** @use HasFactory<\Database\Factories\ViewedProductFactory> */
    use HasFactory;

    protected $fillable = ['session_id', 'product_id', 'viewed_at'];
}
