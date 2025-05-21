<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService
    ) {}

    public function index(): View
    {
        $products = $this->productService->getAll();
        return view('products.index', compact('products'));
    }

    public function indexPage(): View
    {
        $products = $this->productService->getAll();
        return view('index', compact('products'));
    }

    public function create(): View
    {
        $categories = $this->categoryService->getAllCategories();
        return view('products.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $this->productService->create($request->validated());
        return to_route('products.index')->with('success', 'Товар успешно добавлен.');
    }

    public function show(int $id): View
    {
        $product = $this->productService->find($id);
        return view('products.show', compact('product'));
    }

    public function edit(int $id): View
    {
        $product = $this->productService->find($id);
        $categories = $this->categoryService->getAllCategories();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, int $id): RedirectResponse
    {
        $this->productService->update($id, $request->validated());
        return to_route('products.index')->with('success', 'Товар успешно обновлен!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->productService->delete($id);
        return to_route('products.index')->with('success', 'Product deleted successfully!');
    }
}