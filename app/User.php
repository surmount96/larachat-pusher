<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string'
    ];

    protected $appends = ['isOnline'];

    public function chats()
    {
//        return Message::whereIn('sender_id',$this->id)->whereIn('receiver_id',$this->id)->orderBy('created_at','asc')->get();
//        return $this->hasMany('App\Message','receiver_id');
    }

    public function getIsOnlineAttribute()
    {
        return Cache::has('user-is-online'.$this->id);
    }
}
