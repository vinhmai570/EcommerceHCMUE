@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Order list
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Admin</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Order</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Order list</a>
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
                <th>id</th>
                <th>sku</th>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>sale</th>
                <th>quantity</th>
                <th>subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_items as $order_item)
            <tr>
                <td>{{ $order_item->product_id }}</td>
                <td>{{ $order_item->sku }}</td>
                <td><img src="{{ get_image($order_item->image, App\Models\Product::IMAGE_SIZE['small']) }}" alt=""></td>
                <td>{{ $order_item->name }}</td>
                <td>${{ number_format( $order_item->price) }}</td>
                <td>${{ number_format($order_item->sale_price) }}</td>
                <td>{{ $order_item->quantity }}</td>
                <td>${{ number_format($order_item->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
