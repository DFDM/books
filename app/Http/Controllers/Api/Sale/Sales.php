<?php

namespace App\Http\Controllers\Api\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\ApiStoreRequest;


use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Services\Sales\Service;

class Sales extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function store(ApiStoreRequest $request)
    {
        $data = $request->validated();
        $sale = $this->service->store($data);

        return $sale instanceof Sale ? new SaleResource($sale) : $sale;
    }
}
