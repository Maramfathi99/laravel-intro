<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{//شغل البشمهندس
    function uploadFile (){
        return view('upload-file.index');
    }
    function postUploadFile (Request $request){
        $request->validate([
            'file'=>'required|image'
            //'file'=>'required|mimes:jpg,png'
            //'file'=>'required|dimensions:min_width=500,min_height=500|max:10'
        ]);
        //we are like Jazeera no any privacy on image
        //$fileName = $request->file->store("public/images");
        $fileName = $request->file->store("private");
        session()->flash("msg","s: Image Uploaded Successfully");
        return redirect(route("upload-file"));
    }

    function getSecureFile(){
        //our conditions 
        //return Storage::download('private/CfcSeJSl4L4ztQH5Vzjt77o2Hki2aVUXSykvmtbY.jpeg','x.jpeg',["Content-Disposition"=>"inline"]);
        //return Storage::download('private/CfcSeJSl4L4ztQH5Vzjt77o2Hki2aVUXSykvmtbY.jpeg','x.jpeg',["Content-Disposition"=>"attachment"]);
        return Storage::download('private/CfcSeJSl4L4ztQH5Vzjt77o2Hki2aVUXSykvmtbY.jpeg');
    }
}
