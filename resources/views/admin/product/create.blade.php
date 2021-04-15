@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal form-row-seperated row" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
      @csrf
      <div class="col-md-9 col-sm-12">
        <div class="portlet light">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-basket font-green-sharp"></i>
              <span class="caption-subject font-green-sharp bold uppercase">
              Add Product </span>
              <span class="caption-helper">Man Tops</span>
            </div>
            <div class="actions btn-set">
              <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
              <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
          <div class="portlet-body">
            <div class="form-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
              </div>
              <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content"></textarea>
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="row">
                @foreach ($attributes as $attribute)
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>{{ $attribute->name }}</label>
                      <select class="table-group-action-input form-control input-medium" name="attribute[]">
                        @foreach ($attribute->attribute_values as $value)
                          <option value="{{ $value->id }}">{{ $value->value_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Sku</label>
                      <input type="text" class="form-control" name="sku" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="price" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Price sale</label>
                      <input type="number" class="form-control" name="sale_price" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="quantity" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="portlet light">
          <div class="form-group">
            <label>Category</label>
            <select class="table-group-action-input form-control input-medium" name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="portlet light">
          <div class="form-group">
            <label class="control-label" style="margin:0">Is published?</label>
            <hr>
            <input type="checkbox" checked class="make-switch" data-size="small" name="is_published">
          </div>
        </div>
        <div class="portlet light">
          <div class="form-group">
            <label class="control-label" style="margin:0">Is featured?</label>
            <hr>
            <input type="checkbox" class="make-switch" data-size="small" name="is_featured">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
