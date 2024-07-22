<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class EnvReaderService
{
    public function get(string $path, string|array $key): string|array
    {
        // Get the .env file from the path

        // Check if the path has / in the end.
        if (substr($path, -1) !== '/' && substr($path, -1) !== '\\') {
            $path .= '/';
        }

        // dd($path . '.env');

        if (!File::exists($path . '.env')) {
            throw new \InvalidArgumentException('The .env file does not exist.');
        }

        $envData = File::get($path . '.env');

        $envData = explode("\n", $envData);

        $envValues = [];

        foreach ($envData as $envLine) {
            $env = explode('=', $envLine);

            if ($env[0] != '' && count($env) == 2) {
                $envValues[$env[0]] = $env[1];
            }
        }

        if (is_string($key)) {
            return $envValues[$key] ?? null;
        }

        $selectedEnvValues = [];

        foreach ($key as $k) {
            $selectedEnvValues[$k] = $envValues[$k] ?? null;
        }

        return $selectedEnvValues;
    }
}
