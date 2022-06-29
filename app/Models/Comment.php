<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
    * The name of the "created at" column.
    *
    * @var string
    */
    const CREATED_AT = 'creation_date';

    /**
    * The name of the "updated at" column.
    *
    * @var string
    */
    const UPDATED_AT = 'updated_date';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    /* protected $fillable = [
        'comment',
        'post_id',
        'user_id',
    ]; */

    protected $guarded = [];

    /**
    * Post has many user
    *
    * @return void
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
