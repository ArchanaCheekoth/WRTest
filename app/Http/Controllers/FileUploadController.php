<?php

namespace App\Http\Controllers;
use App\FileUpload;
use DataTables;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index(){
        return view ('welcome');
    }

    public function saveFile(Request $request){

        $this->validate($request,['file' => 'required|size:2000']);

        $files =  str_random(). '.' . $request['file']->getClientOriginalExtension(); // random string for name and getting original extension


        $uploadifile = new FileUpload(); // model name FileUpload
        $uploadifile->file = $files;
        $uploadifile->save();
        $request['file']->move(base_path() . '/storage/app/public', $files);
        return redirect('/')->with('success', 'File has been stored successfully!');

    }


    public function Home()
    {
       $data = FileUpload::all();
       // dd($data);
        return view('home',compact('data'));

     

    }

    public function deleteFile($id)
    {
       $file = FileUpload::findorfail($id);
       $file->delete();
      
       return redirect('/')->with('error', 'File has been deleted successfully!');

    }

}
