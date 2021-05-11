<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ProductSku;
use App\Models\SkuValue;
use App\Models\Category;
use App\Models\Attribute;

class ProductService {
    private $product_repostitory;

    public function __construct(ProductRepository $product_repostitory)
    {
        $this->product_repostitory = new ProductRepository;
    }

    public function paginate($item_per_page)
    {
        return $this->product_repostitory->withVariantionDefault()->paginate($item_per_page);
    }

    public function find($id)
    {
        return $this->product_repostitory->find($id);
    }

    public function withVariantionDefault()
    {
        return $this->product_repostitory->withVariantionDefault();
    }

    public function findBySlug($slug)
    {
        return $this->product_repostitory->findBySlug($slug);
    }

    public function store($request)
    {
        $product_params = $request->only(['name', 'description', 'content', 'category_id', 'variantion_default_id']);
        $product_params['is_published'] = $request->boolean('is_published');
        $product_params['is_featured'] = $request->boolean('is_featured');

        try {
            DB::beginTransaction();
            $product = $this->product_repostitory->create($product_params);
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
        $product = $this->product_repostitory->find($id);
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
                $product = $this->product_repostitory->find($id);
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

    public function getAllAttributes()
    {
        return Attribute::all();
    }

    public function getAllCategories()
    {
        return Category::all();
    }
}
