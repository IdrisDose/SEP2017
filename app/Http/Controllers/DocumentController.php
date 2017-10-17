<?php

namespace App\Http\Controllers;
use Storage;
use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //add auth package
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
    	return view('index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:docx,dox,pdf,jpeg,bmp,png,jpg'
        ]);

        $file = $request->file('file');
        $user=  Auth::user();
        $id = $user->id;

        if ($file->isValid()) {
            $ext = $file->extension();
            
            $name = str_replace(' ', '_', Auth::user()->getName()).'.'.$ext;

            $key = 'documents/' . $name;
            Storage::disk('s3')->put($key, file_get_contents($file));

            $document = new Document;

            $document->name = $name;
            $document->file = $key;
            $document->user_id = $id;
            $document->save();
        }

        return redirect()->route('profile',$id);
    }
}
