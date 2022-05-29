<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stat
 *
 * @property int $id
 * @property int $user_id
 * @property string $url
 * @property string $ip
 * @property string $hash
 * @property string $time_in
 * @property string $time_out
 * @property string $time_summary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereTimeIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereTimeOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereTimeSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereHash($value)
 */
class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'url',
        'ip',
        'hash',
        'time_in',
        'time_out',
        'time_summary',
    ];
}
