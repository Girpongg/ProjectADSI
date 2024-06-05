<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;



class FileController extends Controller
{
    public function GetPreview(Request $request)
    {
        $storage = $request->has('storage') ? $request->storage : 'lms';

        if ($storage == 'public_path') {
            $path = public_path($request->path);
        } else {
            // dd($request->path);
            $path = Storage::disk($storage)->path($request->path);
        }

        $filename = basename($request->path);

        if (!\File::exists($path)) {
            abort(404);
        }

        $file = \File::get($path);
        $type = \File::mimeType($path);
        //    dd($type);
        if($type=='application/x-empty'){
            $type = "text/plain";
        }
        $response = \Response::make($file, 200);
        $response->header('Accept-Ranges', 'bytes');
        $response->header("Content-Type", $type);
        $response->header('Content-Disposition', 'inline; filename="' . $filename . '"');

        return $response;
    }


}
