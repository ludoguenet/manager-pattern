<?php

namespace App\FileReader;

use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class XmlFileReader implements FileReaderInterface
{
    public function read(string $path): array
    {
        if (! file_exists($path)) {
            throw new FileNotFoundException("File at path: $path not found");
        }

        $file = file_get_contents($path);

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($file);

        if ($xml === false) {
            $errors = libxml_get_errors();
            libxml_clear_errors();
            throw new Exception("File at path: $path is not a valid XML. Errors: " . print_r($errors, true));
        }

        $json = json_encode($xml);
        return json_decode($json, true);
    }
}
