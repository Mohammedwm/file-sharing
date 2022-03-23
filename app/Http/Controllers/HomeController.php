<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Visits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Location;

class HomeController extends Controller
{
    public function index()
    {
        $files = File::all();
        $count_visits = Visits::count();
        return view('home',['files' => $files,
            'count_visits' => $count_visits ]);
    }
    public function AllFiles()
    {
        $files = File::all();
        return view('AllFiles',['files' => $files]);
    }

    public function uploadFile()
    {
        return view('addfile');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'file' => 'required',
        ]);
        $data = $request->except('file');
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_name'] = $request->file('file')->getClientOriginalName();
            $data['path'] = Storage::disk('local')->put('file',$file);  
            $data['size'] = number_format($request->file('file')->getSize() / 1024,2);
        }
        $data['link_share'] = uniqid();

        $file = File::create($data);

        return redirect()
            ->route('home');
    }
    public function viewFile($link_share)
    {
        $file = File::where('link_share',$link_share)->first();
        if(!$file){
            return abort(404);
        }
        if($file->visits->count() > 50){
            $file['check'] = -1;
            return view('viewFile',['file' => $file]);
        }
        $data['file_id'] = $file->id;
        $data['ip'] = \Request::ip();
        $data['country'] = \Location::get($data['ip']);
        Visits::create($data);
        return view('viewFile',['file' => $file]);
    }
    public function downloadFile($link_share)
    {
        $file = File::where('link_share',$link_share)->first();
        if (!$file) {
            return abort(404);
        }

        if(Storage::disk('local')->exists($file->path))
        {
            $path = Storage::disk('local')->path($file->path);
            $content = file_get_contents($path);
            ob_end_clean();
            return response($content)->withHeaders(['Content-Type' => mime_content_type($path),
            'Content-Disposition' => 'attachment; filename='.$file->file_name]);

        }
        return abort(404);
    }
}
