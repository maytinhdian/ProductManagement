<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;


class ProductController extends Controller
{
    protected $productRepo;
    /**
     * Class constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        $products = $this->productRepo->getAll();
        dd($products);
    }
}
