<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     *
    */
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    /**
     *
    */
    public function getCategorieById(int $id)
    {
        return $this->categoryRepository->getCategorieById($id);
    }

    /**
     *
    */
    public function makeCategory(array $categorie)
    {
        $categorie['url'] = Str::kebab($categorie['name']);
        $categorie['uuid'] = Str::uuid();

        return $this->categoryRepository->createCategorie($categorie);
    }

    /**
     *
    */
    public function updateCategory(int $id, array $categorie)
    {
        $category = $this->categoryRepository->getCategorieById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        if ($categorie['name']) {
            $categorie['url'] = Str::kebab($categorie['name']);
        }
        $this->categoryRepository->updateCategorie($category, $categorie);
        return response()->json(['message' => 'Category Updated'], 200);
    }

    /**
     *
    */
    public function destroyCategorie(int $id)
    {
        $category = $this->categoryRepository->getCategorieById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        $this->categoryRepository->destroyCategorie($category);

        return response()->json(['message' => 'Category Deleted'], 200);
    }
}
