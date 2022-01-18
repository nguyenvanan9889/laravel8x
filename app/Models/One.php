<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\One
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $idsp
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Two|null $two
 * @method static \Illuminate\Database\Eloquent\Builder|One newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|One newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|One query()
 * @method static \Illuminate\Database\Eloquent\Builder|One whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|One whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|One whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|One whereIdsp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|One whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|One whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class One extends Model
{
    use HasFactory;
    public function two()
    {
        return $this->hasOne(Two::class, 'idsp', 'idsp')->where('code', $this->code);
    }
}
