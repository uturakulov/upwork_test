<?php

namespace App\Http\Controllers\Api\UserInterest;

use App\DTO\Interest\StoreUserInterestDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Interest\StoreUserInterestRequest;
use App\Http\Resources\UserInterest\UserInterestResource;
use App\Models\UserInterest;
use App\UseCases\UserInterest\StoreUserInterestUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InterestsController extends Controller
{
    public function index(Request $request): UserInterestResource|AnonymousResourceCollection
    {
        $query = UserInterest::query()
            ->with(['category', 'user'])
            ->filterRequest($request)
            ->orderBy('id', 'DESC');

        if ($request->query('object'))
        {
            return new UserInterestResource($query->first());
        }

        return UserInterestResource::collection($query->paginate($request->query('per_page', 15)));
    }

    public function store(StoreUserInterestRequest $request, StoreUserInterestUseCase $storeUserInterestUseCase): UserInterestResource
    {
        $response = $storeUserInterestUseCase->execute(StoreUserInterestDTO::fromArray($request->validated()));

        return new UserInterestResource($response);
    }
}
