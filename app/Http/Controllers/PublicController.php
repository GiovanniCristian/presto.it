<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){

        $announcements=Announcement::where('is_accepted', true)->take(4)->orderBy('created_at','DESC')->get();
        return view('welcome',compact('announcements'));
    }

    public function categoryShow(Category $category){

        return view('categoryShow',compact('category'));
    }

    public function about(){

        return view('aboutPresto');
    }
}
