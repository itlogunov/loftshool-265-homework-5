<?php

require_once 'init.php';

use Intervention\Image\ImageManagerStatic as Image;

$original = 'mario.jpg';
$output = 'mario_new.jpg';
$watermark = 'watermark.png';

$image = Image::make($original)->rotate(45)->save($output);
$image = Image::make($output)->resize(200, null, function ($constraint) {
    $constraint->aspectRatio();
    $constraint->upsize();
})->save($output);

$image = Image::make($output)->insert($watermark, 'bottom')->save($output);

echo $image->response('jpg');
