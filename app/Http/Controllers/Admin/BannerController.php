<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index(){
        $banners = Banner::sortable()->paginate(self::ITEM_PER_PAGE);
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(BannerRequest $request){
        $banner = new Banner;
        $banner->link = $request->link;
        $banner->title = $request->title;
        $banner->alt = str::slug($request->alt);
        $banner->content = $request->content;
        $banner->status = $request->status;

        if ($request->hasFile('image')) {
            $file_path_with_name= 'uploads/banner/' . $request->alt . '-' . time() . '.' .$request->file('image')->extension();
            $request->file('image')->storeAs('public', $file_path_with_name);
            $banner->image = $file_path_with_name;
        }

        $banner -> save();
        return back()->with('message', 'Create banner successful');
    }

    public function edit($id){
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(BannerRequest $request, $id){
        $banner = Banner::find($id);
        $banner_params = $request->only(['link', 'title', 'content', 'status']);
        $banner_params['alt'] = str::slug($request->alt);
        if ($request->hasFile('image')) {
            $file_path_with_name= 'uploads/banner/' . $request->alt . '-' . time() . '.' .$request->file('image')->extension();
            $request->file('image')->storeAs('public', $file_path_with_name);
            $banner_params['image'] = $file_path_with_name;
        }
        $banner -> update($banner_params);
        return back()->with('message', 'update successful');
    }

    public function destroy($id){
        $banner = Banner::find($id);
        $banner->delete();
        return back()->with('message', 'Delete user successful');
    }
}
