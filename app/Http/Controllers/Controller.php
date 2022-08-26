<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveDataIntoFile(string $filename, array $data)
    {
        $path = storage_path($filename . '.txt');
        (bool)file_put_contents($path, implode('; ', $data) . PHP_EOL, FILE_APPEND);
    }

}
