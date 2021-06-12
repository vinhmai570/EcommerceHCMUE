<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ProductSku;
use App\Models\Product;
use App\Models\SkuValue;
use App\Models\Category;
use App\Models\Attribute;

class ProductService {
    private $model;

    public function __construct()
    {
        $this->model = new Product;
    }

    public function paginate($item_per_page, $order_by = 'created_at')
    {
        return $this->model->withVariantionDefault()->orderBy("product_skus.$order_by")->paginate($item_per_page);
    }

    public function popularProducts($main_categories,$item_per_page)
    {
        $popular_products = array();
        foreach ($main_categories as $id => $name) {
            $popular_products[$name] = Product::where('category_id', '=', $id);
            if (count($popular_products[$name]->get())>0) {
                $popular_products[$name] = $popular_products[$name]->withVariantionDefault()->get();
            } else {
                $popular_products[$name] = [];
            }
        }
        return $popular_products;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function search($request, $item_per_page)
    {
        return $this->buildSearchQuery($request)->withVariantionDefault()->paginate($item_per_page);
    }

    public function withVariantionDefault()
    {
        return $this->model->withVariantionDefault();
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug);
    }

    public function store($request)
    {
        $product_params = $request->only(['name', 'description', 'content', 'category_id', 'variantion_default_id']);
        $product_params['is_published'] = $request->boolean('is_published');
        $product_params['is_featured'] = $request->boolean('is_featured');

        try {
            DB::beginTransaction();
            $product = $this->model->create($product_params);
            $product_sku_params = $request->only(['sku', 'price', 'sale_price', 'quantity']);
            $product_sku_params['is_default'] = true;
            $product_sku_params['image'] = save_image($request->image, $product->slug, 'product_sku');
            $product_sku = $product->product_skus()->save(new ProductSku($product_sku_params));
            $product->variantion_default_id = $product_sku->id;
            $product->save();
            foreach ($request->product_attributes as $attribute_id => $attribute_value_id) {
                $sku_value_params = compact('attribute_id', 'attribute_value_id');
                $product_sku->sku_values()->save(new SkuValue($sku_value_params));
            }
            DB::commit();

            return true;
        } catch(\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function update($request, $id)
    {
        $product = $this->model->find($id);
        $product_params = $request->product;
        if ($product->variantion_default_id != $product_params['variantion_default_id']) {
            $product->product_skus()->where('is_default', 1)->update(['is_default'=> 0]);
            $product->product_skus()->find($product_params['variantion_default_id'])->update(['is_default'=> 1]);
        }
        $product_params['is_published'] = isset($product_params['is_published']) ? true : false;
        $product_params['is_featured']  = isset($product_params['is_featured']) ? true : false;
        return $product->update($product_params);
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
                $product = $this->model->find($id);
                $product_sku_ids = $product->product_skus()->pluck('id');
                SkuValue::where('product_sku_id', $product_sku_ids)->delete();
                $product->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function buildSearchQuery($request)
    {
        $query = $this->model;

        if ($request->has('q')) {
            $query = $query->where('name', 'like', "%$request->q%");
            $query = $query->orWhere('description', 'like', "%$request->q%");
            $query = $query->orWhere('content', 'like', "%$request->q%");
        }

        if ($request->has('category_id')) {
            $query = $query->where('category_id', '=', $request->category_id);
        }

        return $query;
    }

    public function getAllAttributes()
    {
        return Attribute::all();
    }

    public function getAllCategories()
    {
        return Category::all();
    }
}
