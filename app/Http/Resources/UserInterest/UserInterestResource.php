<?php

namespace App\Http\Resources\UserInterest;

use App\Models\UserInterest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property UserInterest $resource
 */
class UserInterestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'user_id' => $this->resource->user_id,
            'interest_name' => $this->resource->interest_name,
            'user' => $this->whenLoaded('user'),
            'category' => $this->whenLoaded('category'),
        ];
    }
}
