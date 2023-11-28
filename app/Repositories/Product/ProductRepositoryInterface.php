<?php

use App\Repositories\RepositoryInterface;

interface ProductsRepositoryInterface extends RepositoryInterface{
    //Lấy danh sách sản phẩm  
    public function getProducts();
}
