@extends('layouts.admin')

@section('css')
<link href="{{ asset('admin/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

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
              <a href="{{ URL::previous() }}" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</a>
              <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
          <div class="portlet-body">
            <div class="form-body">
              <div class="form-group @error('name') has-error @enderror">
                <label>Name</label>
                @if ($errors->first('name'))
                <p class="text-danger"> {{ $errors->first('name') }} </p>
                @endif
                <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name') }}">
              </div>
              <div class="form-group @error('description') has-error @enderror">
                <label>Description</label>
                @if ($errors->first('description'))
                <p class="text-danger"> {{ $errors->first('description') }} </p>
                @endif
                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
              </div>
              <div class="form-group @error('content') has-error @enderror">
                <label>Content</label>
                @if ($errors->first('content'))
                <p class="text-danger"> {{ $errors->first('content') }} </p>
                @endif
                <textarea class="form-control" name="content">{{ old('content') }}</textarea>
              </div>
              <div class="form-group @error('image') has-error @enderror">
                <label>Image</label>
                @if ($errors->first('image'))
                <p class="text-danger"> {{ $errors->first('image') }} </p>
                @endif
                <input type="file" class="form-control" name="image">
              </div>
              <div class="row">
                @foreach ($attributes as $attribute)
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>{{ $attribute->name }}</label>
                      <select class="table-group-action-input form-control input-medium" name="product_attributes[{{ $attribute->id }}]">
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
                    <div class="form-group @error('sku') has-error @enderror">
                      <label>Sku</label>
                      <input type="text" class="form-control" name="sku" placeholder="" value="{{ old('sku') }}">
                      @if ($errors->first('sku'))
                      <p class="text-danger"> {{ $errors->first('sku') }} </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group @error('price') has-error @enderror">
                      <label>Price</label>
                      <input type="number" class="form-control" name="price" placeholder="" value="{{ old('price') }}">
                      @if ($errors->first('price'))
                      <p class="text-danger"> {{ $errors->first('price') }} </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group @error('sale_price') has-error @enderror">
                      <label>Price sale</label>
                      <input type="number" class="form-control" name="sale_price" placeholder="" value="{{ old('sale_price') }}">
                      @if ($errors->first('sale_price'))
                      <p class="text-danger"> {{ $errors->first('sale_price') }} </p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group @error('quantity') has-error @enderror">
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="quantity" placeholder="" value="{{ old('quantity') }}">
                      @if ($errors->first('quantity'))
                      <p class="text-danger"> {{ $errors->first('quantity') }} </p>
                      @endif
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
          <div class="form-group @error('category_id') has-error @enderror">
            <label>Category</label>
            @if ($errors->first('category_id'))
            <p class="text-danger"> {{ $errors->first('category_id') }} </p>
            @endif
            <select class="table-group-action-input form-control input-medium" name="category_id">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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

@section('script')
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('ckeditor/ckeditor.js')}}"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
      console.error(error);
    });
</script>
@endsection
