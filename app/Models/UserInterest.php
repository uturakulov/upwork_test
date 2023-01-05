<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserInterest
 *
 * @property int $id
 * @property int $client_id
 * @property string $interest_name
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserInterest newModelQuery()
 * @method static Builder|UserInterest newQuery()
 * @method static Builder|UserInterest query()
 */
class UserInterest extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): HasOne
    {
        return $this->hasOne(InterestCategory::class);
    }
}
