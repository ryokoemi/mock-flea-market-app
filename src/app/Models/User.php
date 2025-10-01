<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ユーザー登録やプロフィール編集で一括代入できるカラム
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'postal_code',
        'address',
        'building',
    ];

    // 配列やJSON出力時に非公開にするカラム
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 型変換（タイムスタンプ系）
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ----- リレーション定義 -----

    // 出品商品一覧（マイページ/商品一覧画面等）
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    // 購入履歴（マイページ/購入商品タブ等）
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // いいね（お気に入り）
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}