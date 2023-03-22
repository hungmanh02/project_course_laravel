<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo=$productRepo;
    }

    public function index()
    {
        $product=$this->productRepo->getProduct();
        dd($product);
    }
}
