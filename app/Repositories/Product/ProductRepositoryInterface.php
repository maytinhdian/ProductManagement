<?php
namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface{
    //Lấy danh sách sản phẩm
    public function getProducts();
}
