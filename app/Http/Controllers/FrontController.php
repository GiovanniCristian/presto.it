<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function searchAnnouncements(Request $request){

        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang){
      
        session()->put('locale' , $lang);
        return redirect()->back();
    }

}
