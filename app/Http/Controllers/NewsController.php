<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(){
        $news = News::all();
        return view("news" , compact("news"));
    }
    use SoftDeletes;
    public function index()
    {
        $an = News::orderBy('created_at', 'desc')->get();
        return view('newscon', compact('an'));
    }

    // เพิ่มประกาศใหม่
    public function store(Request $request)
    {
        $request->validate([
            'news' => 'required|string|max:255',
        ]);

        News::create([
            'news' => $request->news,
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement added.');
    }

    // อัปเดตประกาศ
    public function update(Request $request, $id)
    {
        $request->validate([
            'news' => 'required|string|max:255',
        ]);

        $announcement = News::findOrFail($id);
        $announcement->update([
            'news' => $request->news,
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement updated.');
    }

    // ลบประกาศ
    public function destroy($id)
    {
        $announcement = News::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcements.index')->with('success', 'Announcement deleted.');
    }

}
