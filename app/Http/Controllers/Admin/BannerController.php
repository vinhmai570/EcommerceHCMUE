<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index(){
        $banners = Banner::sortable()->paginate(self::ITEM_PER_PAGE);
        return view('admin.banner.index', compact('banners'));
    }
}
