@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal form-row-seperated" action="#">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-basket font-green-sharp"></i>
            <span class="caption-subject font-green-sharp bold uppercase">
            Edit Product </span>
            <span class="caption-helper">Man Tops</span>
          </div>
          <div class="actions btn-set">
            <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
            <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset</button>
            <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
            <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
            <div class="btn-group">
              <a class="btn yellow btn-circle" href="#" data-toggle="dropdown">
              <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="#">
                  Duplicate </a>
                </li>
                <li>
                  <a href="#">
                  Delete </a>
                </li>
                <li class="divider">
                </li>
                <li>
                  <a href="#">
                  Print </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="portlet-body">
          <div class="tabbable">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_general" data-toggle="tab">
                General </a>
              </li>
              <li>
                <a href="#tab_meta" data-toggle="tab">
                Meta </a>
              </li>
              <li>
                <a href="#tab_images" data-toggle="tab">
                Images </a>
              </li>
              <li>
                <a href="#tab_reviews" data-toggle="tab">
                Reviews <span class="badge badge-success">
                3 </span>
                </a>
              </li>
            </ul>
            <div class="tab-content no-space">
              <div class="tab-pane active" id="tab_general">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Name: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="product[name]" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Description: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <textarea class="form-control" name="product[description]"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Short Description: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <textarea class="form-control" name="product[short_description]"></textarea>
                      <span class="help-block">
                      shown in product listing </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Categories: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <div class="form-control height-auto">
                        <div class="scroller" style="height:275px;" data-always-visible="1">
                          <ul class="list-unstyled">
                            <li>
                              <label><input type="checkbox" name="product[categories][]" value="1">Mens</label>
                              <ul class="list-unstyled">
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Footwear</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Clothing</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Accessories</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Fashion Outlet</label>
                                </li>
                              </ul>
                            </li>
                            <li>
                              <label><input type="checkbox" name="product[categories][]" value="1">Football Shirts</label>
                              <ul class="list-unstyled">
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Premier League</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Football League</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Serie A</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Bundesliga</label>
                                </li>
                              </ul>
                            </li>
                            <li>
                              <label><input type="checkbox" name="product[categories][]" value="1">Brands</label>
                              <ul class="list-unstyled">
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Adidas</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Nike</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Airwalk</label>
                                </li>
                                <li>
                                  <label><input type="checkbox" name="product[categories][]" value="1">Kangol</label>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <span class="help-block">
                      select one or more categories </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Available Date: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control" name="product[available_from]">
                        <span class="input-group-addon">
                        to </span>
                        <input type="text" class="form-control" name="product[available_to]">
                      </div>
                      <span class="help-block">
                      availability daterange. </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">SKU: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="product[sku]" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Price: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="product[price]" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Tax Class: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <select class="table-group-action-input form-control input-medium" name="product[tax_class]">
                        <option value="">Select...</option>
                        <option value="1">None</option>
                        <option value="0">Taxable Goods</option>
                        <option value="0">Shipping</option>
                        <option value="0">USA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Status: <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-10">
                      <select class="table-group-action-input form-control input-medium" name="product[status]">
                        <option value="">Select...</option>
                        <option value="1">Published</option>
                        <option value="0">Not Published</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab_meta">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Meta Title:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control maxlength-handler" name="product[meta_title]" maxlength="100" placeholder="">
                      <span class="help-block">
                      max 100 chars </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Meta Keywords:</label>
                    <div class="col-md-10">
                      <textarea class="form-control maxlength-handler" rows="8" name="product[meta_keywords]" maxlength="1000"></textarea>
                      <span class="help-block">
                      max 1000 chars </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Meta Description:</label>
                    <div class="col-md-10">
                      <textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>
                      <span class="help-block">
                      max 255 chars </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab_images">
                <div class="alert alert-success margin-bottom-10">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <i class="fa fa-warning fa-lg"></i> Image type and information need to be specified.
                </div>
                <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                  <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn yellow">
                  <i class="fa fa-plus"></i> Select Files </a>
                  <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green">
                  <i class="fa fa-share"></i> Upload Files </a>
                </div>
                <div class="row">
                  <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12">
                  </div>
                </div>
                <table class="table table-bordered table-hover">
                <thead>
                <tr role="row" class="heading">
                  <th width="8%">
                     Image
                  </th>
                  <th width="25%">
                     Label
                  </th>
                  <th width="8%">
                     Sort Order
                  </th>
                  <th width="10%">
                     Base Image
                  </th>
                  <th width="10%">
                     Small Image
                  </th>
                  <th width="10%">
                     Thumbnail
                  </th>
                  <th width="10%">
                  </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                    <a href="../../assets/admin/pages/media/works/img1.jpg" class="fancybox-button" data-rel="fancybox-button">
                    <img class="img-responsive" src="../../assets/admin/pages/media/works/img1.jpg" alt="">
                    </a>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="product[images][1][label]" value="Thumbnail image">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="product[images][1][sort_order]" value="1">
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][1][image_type]" value="1">
                    </label>
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][1][image_type]" value="2">
                    </label>
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][1][image_type]" value="3" checked>
                    </label>
                  </td>
                  <td>
                    <a href="javascript:;" class="btn default btn-sm">
                    <i class="fa fa-times"></i> Remove </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="../../assets/admin/pages/media/works/img2.jpg" class="fancybox-button" data-rel="fancybox-button">
                    <img class="img-responsive" src="../../assets/admin/pages/media/works/img2.jpg" alt="">
                    </a>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="product[images][2][label]" value="Product image #1">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="product[images][2][sort_order]" value="1">
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][2][image_type]" value="1">
                    </label>
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][2][image_type]" value="2" checked>
                    </label>
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][2][image_type]" value="3">
                    </label>
                  </td>
                  <td>
                    <a href="javascript:;" class="btn default btn-sm">
                    <i class="fa fa-times"></i> Remove </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="../../assets/admin/pages/media/works/img3.jpg" class="fancybox-button" data-rel="fancybox-button">
                    <img class="img-responsive" src="../../assets/admin/pages/media/works/img3.jpg" alt="">
                    </a>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="product[images][3][label]" value="Product image #2">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="product[images][3][sort_order]" value="1">
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][3][image_type]" value="1" checked>
                    </label>
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][3][image_type]" value="2">
                    </label>
                  </td>
                  <td>
                    <label>
                    <input type="radio" name="product[images][3][image_type]" value="3">
                    </label>
                  </td>
                  <td>
                    <a href="javascript:;" class="btn default btn-sm">
                    <i class="fa fa-times"></i> Remove </a>
                  </td>
                </tr>
                </tbody>
                </table>
              </div>
              <div class="tab-pane" id="tab_reviews">
                <div class="table-container">
                  <table class="table table-striped table-bordered table-hover" id="datatable_reviews">
                  <thead>
                  <tr role="row" class="heading">
                    <th width="5%">
                       Review&nbsp;#
                    </th>
                    <th width="10%">
                       Review&nbsp;Date
                    </th>
                    <th width="10%">
                       Customer
                    </th>
                    <th width="20%">
                       Review&nbsp;Content
                    </th>
                    <th width="10%">
                       Status
                    </th>
                    <th width="10%">
                       Actions
                    </th>
                  </tr>
                  <tr role="row" class="filter">
                    <td>
                      <input type="text" class="form-control form-filter input-sm" name="product_review_no">
                    </td>
                    <td>
                      <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_from" placeholder="From">
                        <span class="input-group-btn">
                        <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                      <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_to" placeholder="To">
                        <span class="input-group-btn">
                        <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input type="text" class="form-control form-filter input-sm" name="product_review_customer">
                    </td>
                    <td>
                      <input type="text" class="form-control form-filter input-sm" name="product_review_content">
                    </td>
                    <td>
                      <select name="product_review_status" class="form-control form-filter input-sm">
                        <option value="">Select...</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                      </select>
                    </td>
                    <td>
                      <div class="margin-bottom-5">
                        <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                      </div>
                      <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                    </td>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
