<?php

namespace App\FileReader;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use JsonException;

class JsonFileReader implements FileReaderInterface
{
    public function read(string $path): array
    {
        if (! file_exists($path)) {
            throw new FileNotFoundException("File at path: $path not found");
        }

        $file = file_get_contents($path);

        if (! json_validate($file)) {
            throw new JsonException("File at path: $path is not a valid JSON");
        }

        return json_decode($file, true);
    }
}
