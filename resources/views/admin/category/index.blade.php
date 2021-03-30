@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  Category
  </h3>
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="index.html">Admin</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">Category</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">New</a>
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
    <th>
       #
    </th>
    <th>
       Image
    </th>
    <th>
       Name
    </th>
    <th>
       Parent
    </th>
    <th>
       Published
    </th>
    <th>
       Action
    </th>
  </tr>
  </thead>
  <tbody>
  @foreach ($categories as $category)
    <tr>
      <td>
        {{ $category->id }}
      </td>
      <td>
        <img src="{{ asset('storage/'.get_image($category->image, '60x60')) }}" alt="">
      </td>
      <td>
        {{ $category->name }}
      </td>
      <td>
        {{ $category->parent_id }}
      </td>
      <td>
        {{ $category->id }}
      </td>
      <td>
        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp;Edit&nbsp;</button>
        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp;Delete&nbsp;</button>
      </td>
    </tr>
  @endforeach
  </tbody>
  </table>
  {{ $categories->links() }}
</div>
@endsection
