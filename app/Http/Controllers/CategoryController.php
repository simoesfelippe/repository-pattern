<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\StoreUpdateCategory;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return CategoryResource::collection($categories);
    }

    public function store(StoreUpdateCategory $request)
    {
        $category = $this->categoryService->makeCategory($request->all());
        return new CategoryResource($category);
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategorieById($id);
        return new CategoryResource($category);
    }

    public function update(StoreUpdateCategory $request, $id)
    {
        $category = $this->categoryService->updateCategory($id, $request->all());
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->categoryService->destroyCategorie($id);
        return $category;
    }
}
