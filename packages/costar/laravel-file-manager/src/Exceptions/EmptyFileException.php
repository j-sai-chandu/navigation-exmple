<?php

namespace Costar\LaravelFilemanager\Exceptions;

class EmptyFileException extends \Exception
{
    public function __construct()
    {
        $this->message = trans('laravel-file-manager::lfm.error-file-empty');
    }
}
