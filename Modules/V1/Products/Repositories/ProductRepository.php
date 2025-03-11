<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Products\Repositories;

use Modules\V1\Products\Enums\ProductEnum;
use Modules\V1\Products\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductRepository
{
    protected Product $model;

    public function __construct(Product $task)
    {
        $this->model = $task;
    }

    public function all(array $request): mixed
    {
        $page = $request['page'] ?? '1';
        $sortBy = $request['sortBy'] ?? 'name';
        $direction = $request['direction'] ?? 'asc';
        return Cache::remember("products_{$sortBy}_{$direction}_{$page}", 60, function () use ($sortBy, $direction) {
            return $this->model->active()
                ->orderBy('is_top', 'desc')
                ->orderBy($sortBy, $direction)
                ->paginate((int)ProductEnum::PAGINATE->value);
        });
    }

    public function find($id): mixed
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): mixed
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id): mixed
    {
        $product = $this->find($id);
        $product->update(['is_deleted' => true]);
    }

    public function toggleTop($id): mixed
    {
        $product = $this->find($id);
        $product->update(['is_top' => !$product->is_top]);
    }
}
