<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     *
    */
    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    /**
     *
    */
    public function getProductById(int $id)
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     *
    */
    public function makeProduct(array $product)
    {
        $product['url'] = Str::kebab($product['title']);
        $product['uuid'] = Str::uuid();

        return $this->productRepository->createProduct($product);
    }

    /**
     *
     */
    public function updateProduct(int $id, array $product)
    {
        $prod = $this->productRepository->getProductById($id);

        if (!$prod) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $this->productRepository->updateProduct($prod, $product);
        return response()->json(['message' => 'Product Updated'], 200);
    }

    /**
     *
     */
    public function destroyProduct(int $id)
    {
        $prod = $this->productRepository->getProductById($id);

        if (!$prod) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $this->productRepository->destroyProduct($prod);
        return response()->json(['message' => 'Product Deleted'], 200);
    }

    /**
     *
     */
    public function storeImageProduct(object $image)
    {
        return $image->store("/products");
    }
}
