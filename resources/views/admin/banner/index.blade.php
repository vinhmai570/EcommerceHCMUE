@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  Banner
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="index.html">Admin</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="#">banner</a>
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
        <th>@sortablelink('id','Id')</th>
        <th>Image</th>
        <th>Link</th>
        <th>@sortablelink('title','Title')</th>
        <th>@sortablelink('alt','Alt')</th>
        <th>@sortablelink('create_at','Created')</th>
        <th>@sortablelink('status','Status')</th>
        <th class="text-center" style="width: 130px;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($banners as $banner)
      <tr>
        <td>{{ $banner->id }}</td>
        <td><img src="{{asset('storage/'.$banner->image)}}" alt="{{ $banner->alt }} " style="width: 60px; height: 60px;"></td>
        <td>{{ $banner->link }}</td>
        <td>{{ $banner->title }}</td>
        <td>{{ $banner->alt }}</td>
        <td>{{ $banner->created_at }}</td>
        <td>{{ $banner->status == 0 ? "hide" : "show"  }}</td>
        <td class="text-center">
          <div class="row">
            <div class="col-md-4">
              <a href="{{route('admin.banners.edit', $banner->id )}}" class="todo-username-btn btn btn-circle btn-info btn-xs">&nbsp;Edit&nbsp;</a>
            </div>
            <form action="{{route('admin.banners.destroy', $banner->id )}}" method="POST" class="col-md-6">
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
  {{ $banners->links() }}
</div>
@endsection
