<?php
namespace App\Repositories;

interface ProductRepositoryInterface {
    public function withVariantionDefault();
    public function findBySlug($slug, $columns = array('*'));
}
