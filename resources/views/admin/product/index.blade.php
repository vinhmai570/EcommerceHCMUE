@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  Product
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="index.html">Admin</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="#">Product</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="#">List</a>
    </li>
  </ul>
  <div class="page-toolbar">
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
        Actions <i class="fa fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu pull-right" role="menu">
        <li>
          <a href="#">Action</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- END PAGE HEADER-->

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sku</th>
        <th>Status</th>
        <th class="text-center" style="width: 130px;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td>{{ $product->product_id }}</td>
        <td><img src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['small']) }}" alt=""></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->sku }}</td>
        <td>{{ $product->is_published ? 'Published' : 'Pending'}}</td>
        <td class="text-center">
          <div class="row">
            <div class="col-md-4">
              <a href="{{ route('admin.products.edit', $product->product_id) }}" class="todo-username-btn btn btn-circle btn-info btn-xs">&nbsp;Edit&nbsp;</a>
            </div>
            <form action="{{ route('admin.products.destroy', [$product->product_id]) }}" method="POST" class="col-md-8">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-circle btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">&nbsp;Delete&nbsp;</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products->appends(request()->input())->links() }}
</div>
@endsection
