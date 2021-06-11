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
        <a href="#">user</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">edit</a>
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

<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update', $user->id) }}">
  @method('PUT')
  @csrf
  <div class="form-body">
    <div class="form-group @error('name') has-error @enderror">
      <label class="control-label">Name</label>
      @if ($errors->first('name'))
          <p class="text-danger"> {{ $errors->first('name') }} </p>
      @endif
      <div class="input-icon right">
        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
      </div>
    </div>

    <div class="form-group @error('email') has-error @enderror">
      <label class="control-label">email</label>
      @if ($errors->first('email'))
          <p class="text-danger"> {{ $errors->first('email') }} </p>
      @endif
      <div class="input-icon right">
        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
      </div>
    </div>

    <div class="form-group @error('address') has-error @enderror">
      <label class="control-label">address</label>
      @if ($errors->first('address'))
          <p class="text-danger"> {{ $errors->first('address') }} </p>
      @endif
      <div class="input-icon right">
        <input type="text" class="form-control" name="address" value="{{ $user->address }}">
      </div>
    </div>

    <div class="form-group @error('phone') has-error @enderror">
      <label class="control-label">phone</label>
      @if ($errors->first('phone'))
          <p class="text-danger"> {{ $errors->first('phone') }} </p>
      @endif
      <div class="input-icon right">
        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
      </div>
    </div>

    <div class="form-group @error('birthday') has-error @enderror">
      <label class="control-label">birthday</label>
      @if ($errors->first('birthday'))
          <p class="text-danger"> {{ $errors->first('birthday') }} </p>
      @endif
      <div class="input-icon right">
        <input type="text" class="form-control" name="birthday" value="{{ $user->birthday }}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label">Image</label> <br>
      <td><img src="{{ asset('storage/' . $user->image) }}" alt="" style="width: 100px; height: 100px;"></td>
      <div class="input-icon right">
        <input type="file" class="form-control" name="image">
      </div>
    </div>
  </div>

  <div class="form-actions right">
    <button type="button" class="btn default">Cancel</button>
    <button type="submit" class="btn green">Submit</button>
  </div>
</form>
@endsection
