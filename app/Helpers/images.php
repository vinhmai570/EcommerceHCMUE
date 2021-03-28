<?php

use Intervention\Image\Facades\Image;

define('CATEGORY_IMAGE_SIZE', [
  "small"  => [60  => 60],
  "medium" => [256 => 360],
  "large"  => [580 => 580]
]);

// edit when upload file to products
define('PRODUCT_IMAGE_SIZE', [
  60  => 60,
  130 => 130,
  252 => 252,
  270 => 270,
  450 => 450,
  525 => 693,
  545 => 524,
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
    $result = $image->storeAs('public', $file_path_with_name);

    foreach (constant($const_size) as $key => $size) {
        foreach ($size as $witdth => $height) {
          $file_name = $name . '_' . $witdth . 'x' . $height . '.jpg';
          $path_to_save = storage_path('app/public/') . $destination . DIRECTORY_SEPARATOR . $file_name;
          Image::make(storage_path('app/'.$result))->resize($witdth, $height)->save($path_to_save);
        }
    }

    return $result;
}
