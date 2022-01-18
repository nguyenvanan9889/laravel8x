<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Two
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $idsp
 * @property string|null $code
 * @property-read \App\Models\Three|null $three
 * @method static \Illuminate\Database\Eloquent\Builder|Two newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Two newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Two query()
 * @method static \Illuminate\Database\Eloquent\Builder|Two whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Two whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Two whereIdsp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Two whereName($value)
 * @mixin \Eloquent
 */
class Two extends Model
{
    use HasFactory;
    public function three()
    {
        return $this->hasOne(Three::class, 'idsp', 'idsp');
    }
}
