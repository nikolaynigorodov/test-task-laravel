<?php


namespace App\Services;


use Exception;
use Illuminate\Http\File;

class TinyPngService
{
    const PATH_IMAGES = 'images/users/';
    const API_KEY = "VdLnYjH2M9fxFgQ8fpWcjG09nXVgs0br";

    public function downloadAndResize(string $url): ?array
    {
        try {
            \Tinify\setKey(self::API_KEY);
            $source = \Tinify\fromUrl($url);
            $resized = $source->resize(array(
                "method" => "fit",
                "width" => 70,
                "height" => 70
            ));
            $newName = self::PATH_IMAGES . uniqid() . '.' . 'jpeg';
            $resized->toFile($newName);

            return [
                'file' => new File($newName),
                'name' => "/" . $newName
            ];
        } catch(Exception $e) {
            return null;
        }
    }

    public function formDisk(string $puth)
    {
        try {
            \Tinify\setKey(self::API_KEY);
            $source = \Tinify\fromFile($puth);
            $resized = $source->resize(array(
                "method" => "fit",
                "width" => 70,
                "height" => 70
            ));
            $newName = self::PATH_IMAGES . uniqid() . '.' . 'jpeg';
            $resized->toFile($newName);

            return "/" . $newName;
        } catch(Exception $e) {
            return null;
        }
    }
}
