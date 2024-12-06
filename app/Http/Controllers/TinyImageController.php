<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TinyImageController extends Controller
{
    public function uploadTinyImage(Request $request){
        $imagePath = $request->file('file')->store('images', 'public');

        return response()->json(['location' => "/storage/$imagePath"]);
    }


}
