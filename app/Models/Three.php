<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Three
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $idsp
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder|Three newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Three newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Three query()
 * @method static \Illuminate\Database\Eloquent\Builder|Three whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Three whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Three whereIdsp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Three whereName($value)
 * @mixin \Eloquent
 */
class Three extends Model
{
    use HasFactory;
}
