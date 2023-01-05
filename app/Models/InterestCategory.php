<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\InterestCategory
 *
 * @property int $id
 * @property string $category_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|InterestCategory newModelQuery()
 * @method static Builder|InterestCategory newQuery()
 * @method static Builder|InterestCategory query()
 */
class InterestCategory extends Model
{
    use HasFactory;
}
