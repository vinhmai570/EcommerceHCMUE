@extends('layouts.admin')

@section('css')
<link href="{{ asset('admin/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal form-row-seperated row" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', [$product->id]) }}">
      @method('PUT')
      @csrf
      <div class="col-md-9 col-sm-12">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-basket font-green-sharp"></i>
              <span class="caption-subject font-green-sharp bold uppercase">
                Edit Product </span>
              <span class="caption-helper">Man Tops</span>
            </div>
            <div class="actions btn-set">
              <a href="{{ URL::previous() }}" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</a>
              <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
          <div class="portlet-body">
            <div class="form-body">
              <div class="form-group @error('product.name') has-error @enderror">
                <label>Name</label>
                @if ($errors->first('product.name'))
                <p class="text-danger"> {{ $errors->first('product.name') }} </p>
                @endif
                <input type="text" class="form-control" name="product[name]" placeholder="" value="{{ $product->name }}">
              </div>
              <div class="form-group @error('product.description') has-error @enderror">
                <label>Description</label>
                @if ($errors->first('product.description'))
                <p class="text-danger"> {{ $errors->first('product.description') }} </p>
                @endif
                <textarea class="form-control" id = "description" name="product[description]">{{ $product->description }}</textarea>
              </div>
              <div class="form-group @error('product.content') has-error @enderror">
                <label>Content</label>
                @if ($errors->first('product.content'))
                <p class="text-danger"> {{ $errors->first('product.content') }} </p>
                @endif
                <textarea class="form-control" name="product[content]">{{ $product->content }}</textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="portlet light">
          <div class="portlet-title row">
            <div class="col-md-8 col-sm-12">
              <h4>
                <span>Product has variants</span>
              </h4>
            </div>
            <div class="col-md-4 col-sm-12">
              <div>
                <a data-toggle="modal" href="#product_sku_modal" style="margin-right: 20px;" id="btn-add-variant">Add new variants</a>
              </div>
            </div>
          </div>
          <div class="portlet-body">
            <!-- MODAL-->
            <div id="product_sku_modal" class="modal fade" tabindex="-1" data-width="760">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Responsive</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="product_id" value="{{ $product->id }}">
                <input type="hidden" id="product_sku_id">
                <div class="row">
                  @foreach ($attributes as $attribute)
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>{{ $attribute->name }}</label>
                      <select class="table-group-action-input form-control input-medium attributes" name="product_attributes[{{ $attribute->id }}]" id="{{ $attribute->id }}">
                        @foreach ($attribute->attribute_values as $value)
                        <option value="{{ $value->id }}">{{ $value->value_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Sku</label>
                      <input type="text" class="form-control" name="sku" id="sku">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="price" id="price">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Sale price</label>
                      <input type="number" class="form-control" name="sale_price" id="sale_price">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="quantity" id="quantity">
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                  </div>
                </div>
                <div class="row">
                  {{-- <div class="col-md-4 col-sm-6">
                    <div class="form-group" style="margin-top:30px;">
                      <label>Is default?</label>
                      <input type="checkbox" class="make-switch" data-size="small" name="is_default" id="is_default">
                    </div>
                  </div> --}}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                <button type="button" id="btn-save-variant" class="btn blue btn-create-variant">Save changes</button>
              </div>
            </div>
            <!-- END MODAL-->
            <div class="form-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>IMAGE</th>
                      @foreach ($attributes as $attribute)
                      <th>{{ strtoupper($attribute->name) }}</th>
                      @endforeach
                      <th>PRICE</th>
                      <th>QUANTITY</th>
                      <th>SKU</th>
                      <th>IS DEFAULT</th>
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody id="list_product_sku">
                    @foreach ($product_skus as $product_sku)
                    <tr id="{{ $product_sku->id }}">
                      <td><img src="{{ get_image($product_sku->image, App\Models\Product::IMAGE_SIZE['small']) }}" alt=""></td>
                      @foreach ($product_sku->sku_values as $sku_value)
                      <td>{{ $sku_value->attribute_value->value_name }}</td>
                      @endforeach
                      <td>{{ $product_sku->sale_price }}</td>
                      <td>{{ $product_sku->quantity }}</td>
                      <td>{{ $product_sku->sku }}</td>
                      <td>
                        <label>
                          <input type="radio" name="product[variantion_default_id]" @if($product_sku->is_default) checked @endif value="{{ $product_sku->id }}">
                        </label>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-info btn-circle btn-edit-variant" data="{{ $product_sku->id }}" data-toggle="modal" href="#product_sku_modal">Edit</a>
                        <a class="btn btn-danger btn-circle btn-delete-variant" data="{{ $product_sku->id }}" onclick="deleteVariant($(this))">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="portlet light">
          <div class="form-group @error('product.category_id') has-error @enderror">
            <label>Category</label>
            @if ($errors->first('product.category_id'))
            <p class="text-danger"> {{ $errors->first('product.category_id') }} </p>
            @endif
            <select class="table-group-action-input form-control input-medium" name="product[category_id]">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="portlet light">
          <div class="form-group">
            <label class="control-label" style="margin:0">Is published?</label>
            <hr>
            <input type="checkbox" @if($product->is_published) checked @endif class="make-switch" data-size="small" name="product[is_published]">
          </div>
        </div>
        <div class="portlet light">
          <div class="form-group">
            <label class="control-label" style="margin:0">Is featured?</label>
            <hr>
            <input type="checkbox" @if($product->is_featured) checked @endif class="make-switch" data-size="small" name="product[is_featured]">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- END PAGE CONTENT-->
@endsection

@section('script')
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
@include('admin.scripts.product')
<script src="{{ asset ('ckeditor/ckeditor.js')}}"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
      console.error(error);
    });
</script>
@endsection
