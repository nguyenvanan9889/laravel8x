<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;

/**
 * App\Models\DatabaseMemberNotification
 *
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection|static[] all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification query()
 * @method static Builder|DatabaseNotification read()
 * @method static Builder|DatabaseNotification unread()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseMemberNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DatabaseMemberNotification extends DatabaseNotification
{
    protected $table = 'member_notifications';
}
