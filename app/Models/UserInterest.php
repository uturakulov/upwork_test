<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * App\Models\UserInterest
 *
 * @property int $id
 * @property int $client_id
 * @property string $interest_name
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|InterestCategory $category
 * @method static Builder|UserInterest filterRequest(Request $request)
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(InterestCategory::class);
    }

    public function scopeFilterRequest(Builder $query, Request $request)
    {
        if ($name = $request->query('name')) {
            $query->where('interest_name', '=', $name);
        }

        if ($date = $request->query('date')) {
            $query->whereDate('created_at', '=', Carbon::parse($date));
        }
    }
}
