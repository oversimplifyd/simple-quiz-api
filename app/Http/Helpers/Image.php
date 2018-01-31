<?php

namespace QUIZ\Http\Helpers;

class Image
{

    public static function processImage($image, $imageDirectory)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $localStorage = \Storage::disk('local');
        $filePath = '/'.$imageDirectory.'/' . $imageName;
        $localStorage->put($filePath, file_get_contents($image), 'public');
        return $imageName;
    }
}
