<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategorieById($id);
    public function createCategorie(array $categorie);
    public function updateCategorie(int $id, array $categorie);
    public function destroyCategorie(int $id);

}
