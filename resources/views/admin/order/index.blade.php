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
        <th>receiver</th>
        <th>phone</th>
        <th>address</th>
        <th>booking date</th>
        <th>total</th>
        <th>note</th>
        <th class="text-center">status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->fullname}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->created_at}}</td>
        <td>${{ number_format( $order->total ) }}</td>
        <td>{{$order->note}}</td>
        <td class="text-center">
          <form action="" method="POST">
            @method('UPDATE')
            @csrf
            @if( $order->status == 0 )
            <button type="submit" class="btn btn-circle btn-success btn-xs" onclick="return confirm('Has the order been completed?');"> &nbsp;slacking&nbsp;</button>
            @else
            <button type="submit" class="btn btn-circle btn-danger btn-xs" onclick="return confirm('Orders awaiting delivery?');"> &nbsp;completed&nbsp;</button>
            @endif
          </form>
        </td>
        <td><a class="btn btn-circle btn-primary btn-xs" href="{{ route('admin.order.detail', $order->id) }}" role="button">detail</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
