<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
// リレーション
// フォローされている
    public function followers()
    {
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'following_id');
    }
// フォローしてる
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');
    }
 // フォローする
    public function follow(Int $users)
    {
        return $this->follows()->attach($users);
    }

    // フォロー解除する
    public function unfollow(Int $users)
    {
        return $this->follows()->detach($users);
    }

    // フォローしているか
    public function isFollowing(Int $users)
    {
        return (boolean) $this->follows()->where('followed_id', $users)->exists();

    }

    // フォローされているか
    public function isFollowed(Int $users)
    {
        return (boolean) $this->followers()->where('following_id', $users)->exists();

    }


// public function posts() { //1対多の「多」側なので複数形
// 　　　　return $this -> hasMany('App\Posts');
// 　　}

}
