<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3FileUpload extends Controller
{
    public function __invoke(Request $request)
    {
        $file = $request->file('file');

        $path = $file->storePublicly('uploads', 's3');

        $url = Storage::disk('s3')->url($path);

        return response()->json([
            'location' => $url
        ]);
    }
}
