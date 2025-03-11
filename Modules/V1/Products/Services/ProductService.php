<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Products\Services;

use Modules\V1\Products\Models\ViewedProduct;
use Modules\V1\Products\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepository;
    protected ViewedProduct $viewedProduct;

    public function __construct(ProductRepository $productRepository, ViewedProduct $viewedProduct)
    {
        $this->productRepository = $productRepository;
        $this->viewedProduct = $viewedProduct;
    }

    public function index(array $request): mixed
    {
        return $this->productRepository->all($request);
    }

    public function show($id): mixed
    {
        return $this->productRepository->find($id);
    }

    public function store(array $request): mixed
    {
        $this->productRepository->create($request);
    }

    public function update($id, $data): mixed
    {
        $this->productRepository->update($id, $data);
    }

    public function destroy($id): mixed
    {
        $this->productRepository->delete($id);
    }

    public function toggleTop($id): mixed
    {
        $this->productRepository->toggleTop($id);
        return redirect()->route('products.index');
    }

    protected function trackViewedProduct($productId)
    {
        $sessionId = session()->getId();
        $this->viewedProduct->create([
            'session_id' => $sessionId,
            'product_id' => $productId,
            'viewed_at' => now(),
        ]);
    }
}
