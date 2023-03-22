<?php 
namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //ví dụ lấy 5 sản phẩm đầu

    public function getProduct();
}