<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Article Class represnt article's data.
 * 
 * @package App\Models
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class Article extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'admin_id'
    ];

    /**
     * Get the admin which create for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    /**
     * Get the category for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the comments for the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }
}
