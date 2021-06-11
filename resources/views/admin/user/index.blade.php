@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  User
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="index.html">Admin</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="#">User</a>
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
        <th>id</th>
        <th>Image</th>
        <th>Name</th>
        <th>email</th>
        <th>address</th>
        <th>phone</th>
        <th>created_at</th>
        <th class="text-center" style="width: 130px;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td><img src="{{ asset('storage/' . $user->image) }}" alt="" style="width: 60px; height: 60px;"></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
</div>
@endsection