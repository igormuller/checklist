<?php

namespace App\Http\Controllers;

use App\Http\Requests\CakeRequest;
use App\Http\Resources\CakeResource;
use App\Models\Cake;
use App\Services\CakeService;

class CakeController extends Controller
{
    private $service;

    public function __construct(CakeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return CakeResource::collection($this->service->all());
    }

    public function store(CakeRequest $request)
    {
        return new CakeResource($this->service->create($request->all()));
    }

    public function show(Cake $cake)
    {
        return new CakeResource($cake);
    }

    public function update(CakeRequest $request, Cake $cake)
    {
        $cakeUpdate = $this->service->update($request->all(), $cake);
        return new CakeResource($cakeUpdate);
    }

    public function destroy(Cake $cake)
    {
        $cake->delete();
    }
}
