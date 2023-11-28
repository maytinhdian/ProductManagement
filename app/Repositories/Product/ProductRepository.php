<?php

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductsRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }
    public function getProducts()
    {
        return $this->model->getAll();
    }
}
