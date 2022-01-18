<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestedRequest;
use App\Http\Resources\InterestedResource;
use App\Models\Interested;
use App\Services\InterestedService;

class InterestedController extends Controller
{
    private $service;

    public function __construct(InterestedService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return InterestedResource::collection(Interested::all());
    }

    public function store(InterestedRequest $request)
    {
        return new InterestedResource($this->service->create($request->all()));
    }

    public function show(Interested $interested)
    {
        return new InterestedResource($interested);
    }

    public function update(InterestedRequest $request, Interested $interested)
    {
        $interested = $this->service->update($request->all(), $interested);
        return new InterestedResource($interested);
    }

    public function destroy(Interested $interested)
    {
        $interested->delete();
    }
}
