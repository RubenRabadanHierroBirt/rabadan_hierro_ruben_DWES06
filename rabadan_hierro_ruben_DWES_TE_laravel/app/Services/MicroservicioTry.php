<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;

class MicroservicioTry
{
    private $baseUrl = 'http://127.0.0.1:8080/api/stock';

    public function isAvailable(): bool
    {
         try {
        return Http::timeout(2)->get("{$this->baseUrl}/ping")->successful();
    } catch (\Throwable $e) {
        return false;
    }
    }

    public function consultar($id)
    {
        return Http::timeout(3)->get("{$this->baseUrl}/{$id}");
    }

    public function crear(array $data)
    {
        return Http::timeout(3)->post($this->baseUrl, $data);
    }

    public function actualizar($id, array $data)
    {
        return Http::timeout(3)->put("{$this->baseUrl}/{$id}", $data);
    }
}
