<?php

namespace App\FileReader;

use Illuminate\Support\Manager;

class FileReaderManager extends Manager
{
    public function createJsonDriver()
    {
        return new JsonFileReader();
    }

    public function createXmlDriver()
    {
        return new XmlFileReader();
    }

    public function getDefaultDriver(): string
    {
        return 'json';
    }
}
