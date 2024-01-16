<?php

namespace Costar\LaravelFileManager\Controllers;

use Intervention\Image\Facades\Image;
use Costar\LaravelFileManager\Events\ImageIsResizing;
use Costar\LaravelFileManager\Events\ImageWasResized;

class ResizeController extends FileManagerController
{
    /**
     * Dipsplay image for resizing.
     *
     * @return mixed
     */
    public function getResize()
    {
        $ratio = 1.0;
        $image = request('img');

        $original_image = Image::make($this->fileManager->setName($image)->path('absolute'));
        $original_width = $original_image->width();
        $original_height = $original_image->height();

        $scaled = false;

        // FIXME size should be configurable
        if ($original_width > 600) {
            $ratio = 600 / $original_width;
            $width = $original_width * $ratio;
            $height = $original_height * $ratio;
            $scaled = true;
        } else {
            $width = $original_width;
            $height = $original_height;
        }

        if ($height > 400) {
            $ratio = 400 / $original_height;
            $width = $original_width * $ratio;
            $height = $original_height * $ratio;
            $scaled = true;
        }

        return view('laravel-file-manager::resize')
            ->with('img', $this->fileManager->pretty($image))
            ->with('height', number_format($height, 0))
            ->with('width', $width)
            ->with('original_height', $original_height)
            ->with('original_width', $original_width)
            ->with('scaled', $scaled)
            ->with('ratio', $ratio);
    }

    public function performResize()
    {
        $image_path = $this->fileManager->setName(request('img'))->path('absolute');

        event(new ImageIsResizing($image_path));
        Image::make($image_path)->resize(request('dataWidth'), request('dataHeight'))->save();
        event(new ImageWasResized($image_path));

        return parent::$success_response;
    }
}
