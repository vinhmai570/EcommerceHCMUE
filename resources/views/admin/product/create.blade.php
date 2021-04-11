@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal form-row-seperated row" action="#">
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
                <input type="text" class="form-control" name="product[name]" placeholder="">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="product[description]"></textarea>
              </div>
              <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="product[short_description]"></textarea>
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Sku</label>
                      <input type="text" class="form-control" name="product[name]" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="product[name]" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Price sale</label>
                      <input type="number" class="form-control" name="product[name]" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div style="margin: 10px">
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="product[name]" placeholder="">
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
            <select class="table-group-action-input form-control input-medium" name="product[tax_class]">
              <option value="">Select...</option>
            </select>
          </div>
        </div>
        <div class="portlet light">
          <div class="form-group">
            <label class="control-label" style="margin:0">Is published?</label>
            <hr>
            <input type="checkbox" checked class="make-switch" data-size="small">
          </div>
        </div>
        <div class="portlet light">
          <div class="form-group">
            <label class="control-label" style="margin:0">Is featured?</label>
            <hr>
            <input type="checkbox" class="make-switch" data-size="small">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
