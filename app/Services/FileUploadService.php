<?php

namespace App\Services;

// use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileUploadService
{

    public static function upload(object  $data, string $folder_path)
    {
       
        $filename=$data->getClientOriginalName();
        $path = Storage::disk('local')->putFileAs(
          'public/' . $folder_path,
          $data,
          $filename
        );

        return ['path'=>$path,'name'=>$filename];

    }

    public static function get_file(Request $request)
    {
        $path = $request['path'] ?? 'public/null_image.png';
        return response()->file(Storage::path($path));
    }

}
