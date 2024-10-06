<?php

declare(strict_types=1);

namespace App\FileReader;

use Illuminate\Support\Facades\Facade;

class FileReader extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FileReaderManager::class;
    }
}
