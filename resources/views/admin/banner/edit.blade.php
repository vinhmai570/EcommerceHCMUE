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
            <a href="#">Banner</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">edir</a>
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

<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.banners.update', $banner->id) }}">
  @method('PUT')
  @csrf
    <div class="form-group @error('image') has-error @enderror">
        <div class="form-group">
            <label class="control-label">Image</label>
            @if ($errors->first('image'))
            <p class="text-danger"> {{ $errors->first('image') }} </p>
            @endif
            <div class="input-icon right">
                <input type="file" class="form-control" name="image">
            </div>
        </div>

        <div class="form-group @error('link') has-error @enderror">
            <label class="control-label">Link</label>
            @if ($errors->first('link'))
            <p class="text-danger"> {{ $errors->first('link') }} </p>
            @endif
            <div class="input-icon right">
                <input type="text" class="form-control" name="link" placeholder="url" value="{{$banner->link}}">
            </div>
        </div>

        <div class="form-group @error('title') has-error @enderror">
            <label class="control-label">Title</label>
            @if ($errors->first('title'))
            <p class="text-danger"> {{ $errors->first('title') }} </p>
            @endif
            <div class="input-icon right">
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$banner->title}}">
            </div>
        </div>

        <div class="form-group @error('alt') has-error @enderror">
            <label class="control-label">Alt</label>
            @if ($errors->first('alt'))
            <p class="text-danger"> {{ $errors->first('alt') }} </p>
            @endif
            <div class="input-icon right">
                <input type="text" class="form-control" name="alt" placeholder="Alt" value="{{$banner->alt}}">
            </div>
        </div>

        <div class="form-group @error('content') has-error @enderror">
            <label class="control-label">Content</label>
            @if ($errors->first('content'))
            <p class="text-danger"> {{ $errors->first('content') }} </p>
            @endif
            <div class="input-icon right">
                <input type="text" class="form-control" name="content" placeholder="Content" value="{{$banner->content}}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">status</label>
            <div>
                <select name="status" >
                    <option value=1 {{ $banner->status == 1 ? 'selected': '' }} >Hiện</option>
                    <option value=0 {{  $banner->status == 0 ? 'selected': ''}} > Ẩn</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-actions right">
        <button type="button" class="btn default">Cancel</button>
        <button type="submit" class="btn green">Submit</button>
    </div>
</form>
@endsection