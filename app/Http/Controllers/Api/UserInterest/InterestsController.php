<?php

namespace App\Http\Controllers\Api\UserInterest;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserInterest\UserInterestResource;
use App\Models\UserInterest;
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
}
