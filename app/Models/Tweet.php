<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Tweet extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'text'
  ];
  public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTimeLines(Int $user_id, Array $follow_ids)
        {
            // 自身とフォローしているユーザIDを結合する
            $follow_ids[] = $user_id;
            return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
        }
}
