<?php

namespace App\DTO\Interest;

final class StoreUserInterestDTO
{
    public function __construct(
        private string $interest_name,
        private int $category_id,
    ) {
    }

    /**
     * @return string
     */
    public function getInterestName(): string
    {
        return $this->interest_name;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            interest_name: (string) $data['interest_name'],
            category_id: (int) $data['category_id'],
        );
    }
}
