<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notifications extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'text',
        'expiration',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($notification) {
            $notification->users()->detach();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'notification_user', 'notification_id', 'user_id');

    }

    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
