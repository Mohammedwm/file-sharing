<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Location;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $files = File::all();
        //echo request()->ip();
        $ip = $request->ip();
        $data = Location::get($ip);
        return view('home',['files' => $files]);
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
        $data = $request->except('file');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_name'] = $request->file('file')->getClientOriginalName();
            $data['path'] = Storage::disk('local')->put('file',$file);
            $data['size'] = number_format($request->file('file')->getSize() / 1048576);
        }
        $data['link_share'] = uniqid();

        $file = File::create($data);

        // PRG: Post Redirect Get
        return redirect()
            ->route('home');
    }
    public function share($link_share)
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
