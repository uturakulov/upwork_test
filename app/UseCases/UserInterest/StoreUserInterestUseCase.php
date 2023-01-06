<?php

namespace App\UseCases\UserInterest;

use App\DTO\Interest\StoreUserInterestDTO;
use App\Models\UserInterest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StoreUserInterestUseCase
{
    public function execute(StoreUserInterestDTO $request): UserInterest
    {
        $interest = new UserInterest();
        $interest->interest_name = $request->getInterestName();
        if (isset(auth()->user()->id)) {
            $interest->user_id = auth()->user()->id;
        } else {
            throw new ModelNotFoundException('Пользователь не найден', 404);
        }
        $interest->category_id = $request->getCategoryId();
        $interest->save();

        $interest->load(['category', 'user']);

        return $interest;
    }
}
