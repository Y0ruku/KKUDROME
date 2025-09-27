<?php

namespace App\Http\Controllers;
use App\Models\News;


use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(){
        $news = News::all();
        return view("news" , compact("news"));
    }

}
