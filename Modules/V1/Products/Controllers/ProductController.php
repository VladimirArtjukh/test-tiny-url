<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\V1\Products\Controllers;

use App\Http\Controllers\Controller;
use Modules\V1\Products\Requests\ProductIndexRequest;
use Modules\V1\Products\Requests\ProductStoreRequest;
use Modules\V1\Products\Requests\ProductUpdateRequest;
use Modules\V1\Products\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }


    public function index(ProductIndexRequest $request): object
    {
        $products = $this->service->index($request->all());
        return view('products.index', compact('products'));
    }

    public function show($id): object
    {
        $product = $this->service->show($id);
        return view('products.show', compact('product'));
    }

    public function store(ProductStoreRequest $request): object
    {
        $this->service->store($request->all());
        return redirect()->route('products.index');
    }

    public function update(ProductUpdateRequest $request, $id):\Illuminate\Http\RedirectResponse
    {
        $this->service->update($id, $request->all());
        return redirect()->route('products.show', $id);
    }

    public function destroy($id):\Illuminate\Http\RedirectResponse
    {
        $this->service->destroy($id);
        return redirect()->route('products.index');
    }
}
