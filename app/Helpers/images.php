<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

define('CATEGORY_IMAGE_SIZE', [
    "small"  => [60  => 60],
    "medium" => [265 => 360],
    "large"  => [580 => 580]
]);

define('PRODUCT_SKU_IMAGE_SIZE', [
    "small"    => [60  => 60],
    "medium"   => [256 => 360],
    "large"    => [600 => 600],
    "list"     => [500 => 500],
    "featured" => [400 => 480],
]);

/**
 * @param $image
 * @param $product_name
 * @return string
 */
function save_image($image, $name, $type)
{
    $const_size = strtoupper($type).'_IMAGE_SIZE';
    $destination = 'uploads'. DIRECTORY_SEPARATOR .$type . DIRECTORY_SEPARATOR . date("Y/m/d");
    $file_path_with_name = $destination . DIRECTORY_SEPARATOR . $name . '.jpg';
    $image_path_origin = $image->storeAs('public', $file_path_with_name);

    foreach (constant($const_size) as $key => $size) {
        foreach ($size as $witdth => $height) {
          $file_name = $name . '_' . $witdth . 'x' . $height . '.jpg';
          $path_to_save = storage_path('app/public/') . $destination . DIRECTORY_SEPARATOR . $file_name;
          Image::make(storage_path('app/'.$image_path_origin))->resize($witdth, $height)->save($path_to_save);
        }
    }

    return $file_path_with_name;
}

/**
 * @param $image
 * @param null $size
 * @return string
 */
function get_image($image, $size)
{
    if (strrpos($image, '.')) {
        $name = substr($image, 0, strrpos($image, '.'));
        $image_path = $name . '_' .$size . '.jpg';
        $image_path_origin = storage_path('app/public/') . $image_path;
        return File::exists($image_path_origin) ? asset('storage/' . $image_path) : '';
    }

    return '';
}

/**
 * @param $image_path
 * @param $image_type
 * @return boolean
 */
function delete_image($image_path, $image_type)
{
    if (empty($image_path)) {
        return false;
    }

    $const_size = strtoupper($image_type).'_IMAGE_SIZE';
    $image_path = 'public/' . $image_path;
    Storage::delete($image_path);

    $image_path_without_ext = substr($image_path, 0, strrpos($image_path, '.'));

    foreach (constant($const_size) as $key => $size) {
        foreach ($size as $witdth => $height) {
            $image_path = $image_path_without_ext . '_' . $witdth . 'x' . $height . '.jpg';
            Storage::delete($image_path);
        }
    }

    return true;
}
