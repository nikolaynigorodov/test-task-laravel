<?php


namespace App\Services;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ServicesImageResizeAndSave
{
    const PATH_IMAGES = '/images/users';

    public function resizeSave(UploadedFile $uploadedFile): string
    {
        $imageName = time().'.'.$uploadedFile->extension();

        $filePath = public_path(self::PATH_IMAGES);
        $img = Image::make($uploadedFile->path());
        $img->resize(70, 70, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$imageName);

        return self::PATH_IMAGES.'/'.$imageName;
    }
}
