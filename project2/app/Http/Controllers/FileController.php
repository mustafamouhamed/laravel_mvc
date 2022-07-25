<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
$files = File::all();
return view("files.index")->with("files",$files);
    }


    public function create()
    {
      return view("files.create");
    }

    public function store(Request $request)
    {
      $fildes =$request->validate([
"title" =>"required|min:3",
"description"=> "required|min:5",
"fileInput"=> "required|max:3070|mimes:png,jpg,pdf"
      ]);
       $file = new File;
       $file->title =$request->title;
       $file-> description = $request->description;
       // code File

       $allFileData = $request->file("fileInput");
       $file_name = $allFileData->getclientOriginalName();
       $allFileData ->move(public_path()."/files/",$file_name);
       $file->file = $file_name;
$file->save();
return  redirect()->back()->with("done","uploaded File done");

    }


    public function show($id)
    {
        $file = File::find($id);
        return view("files.show")->with("file",$file);
    }


    public function edit($id)
    {
        $file = File::find($id);
return view("files.edit")->with("file",$file);
    }

    public function update(Request $request, $id)
    {
        $fildes =$request->validate([
            "title" =>"required|min:3",
            "description"=> "required|min:5",
            "fileInput"=> "required|max:3070|mimes:png,jpg,pdf"
                  ]);
                  $file = File::find($id);
                   $file->title =$request->title;
                   $file-> description = $request->description;
                   // code File

                   $allFileData = $request->file("fileInput");
                   $file_name = $allFileData->getclientOriginalName();
                   $allFileData ->move(public_path()."/files/",$file_name);
                   $file->file = $file_name;
            $file->save();
            return  redirect("/allFiles")->with("done","update File done");
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return  redirect("/allFiles")->with("done","delete File done");

    }

    public function Download($id)
    {
        $file = File::where("id", "=",$id)->firstOrFail();
        $filepath = public_path(). "/files/". $file->file ;
     return  response()->download($filepath);


    }
}
