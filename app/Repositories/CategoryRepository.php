<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;


class CategoryRepository implements CategoryRepositoryInterface
{

    protected $entity;

    public function __construct(Category $category)
    {
        $this->entity = $category;
    }

    /**
     * Get all Categories
     * @return array
     */
    public function getAllCategories()
    {
        return $this->entity->paginate();
    }

    /**
     * Seleciona a Categoria por ID
     * @param int $id
     * @return object
     */
    public function getCategorieById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria uma nova categoria
     * @param array $category
     * @return object
     */
    public function createCategorie(array $category)
    {
        return $this->entity->create($category);
    }

    /**
     * Atualiza os dados da categoria
     * @param object $category
     * @param array $categorie
     * @return object
     */
    public function updateCategorie(object $category, array $categorie)
    {
        return $category->update($categorie);
    }

    /**
     * Deleta uma categoria
     * @param object $category
     */
    public function destroyCategorie(object $category)
    {
        return $category->delete();
    }
}
