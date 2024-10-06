<?php

use App\FileReader\FileReader;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    FileReader::driver('xml')->read(storage_path('demo.xml'));
});
