<?php

namespace App\FileReader;

interface FileReaderInterface
{
    public function read(string $path): array;
}
