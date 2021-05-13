<?php
namespace App\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        $this->model_class_name = \App\Models\Product::class;
    }

    public function withVariantionDefault($columns = array('*'))
    {
        return call_user_func_array("{$this->model_class_name}::withVariantionDefault", $columns);
    }

    public function findBySlug($slug, $columns = array('*')) {
        return call_user_func_array("{$this->model_class_name}::firstWhere", array('slug'));
    }
}
