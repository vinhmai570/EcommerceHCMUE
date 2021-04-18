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

<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.update', $category->id) }}">
  @method('PUT')
  @csrf
  <div class="form-body">
    <div class="form-group @error('name') has-error @enderror">
      <label class="control-label">Name</label>
      @if ($errors->first('name'))
          <p class="text-danger"> {{ $errors->first('name') }} </p>
      @endif
      <div class="input-icon right">
        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label">Parent</label>
      <div>
        <select name="parent_id">
          <option value="0">None</option>
          @foreach ($categories as $parent)
          <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label">Image</label>
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
