<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class MultipleController extends Controller
{
    public function index()
    {
        return view('multiple-files-upload');
    }
 
    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|max:255',
        //     'services' => 'required'
        // ]);
         
        $validatedData = $request->validate([
        'image' => 'required',
        'image.*' => 'mimes:png,jpg,jpeg',
        // 'name' => 'required|max:255',
        'services' => 'required'
        ]); 
 
 
        if($request->hasfile('image'))
         {
            foreach($request->file('image') as $key => $file)
            {
                $image = $file->store('public/image');
                $name = $file->getClientOriginalName();
 
                $insert[$key]['nama'] = $name;
                $insert[$key]['image'] = $image;
                $insert[$key]['image'] = $request->image[$key]; // Memberikan nilai dari input 'image'

 
            }
         }
        Image::insert($insert);

        if (is_array($request->services)) {
            $jawaban = implode(", ", $request->services);
        } else {
            $jawaban = $request->services;
        }

        $dataPengguna = new Image;
        $dataPengguna->nama = $request->nama;
        $dataPengguna->services = $jawaban;
        $dataPengguna->save();

        // Image::create($service);

 
        return redirect('images')->with('status', 'Multiple File has been uploaded Successfully');
 
    }
}
