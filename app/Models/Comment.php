<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Comment Class represnt comment's data.
 * 
 * @package App\Models
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class Comment extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'comments';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'content', 'user_id', 'article_id'
   ];

    /**
     * Get the user which create for the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user which create for the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
