<?php

namespace App\Http\Controllers;

use App\Models\Deteksi;
use Illuminate\Http\Request;

class Api extends Controller
{
    public function store(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); 
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/image';
            $file->move($path, $fileName);
            Deteksi::create([
                'file' => $fileName,
                'tinggi' => $request->difference
            ]);
        }
    }
}
