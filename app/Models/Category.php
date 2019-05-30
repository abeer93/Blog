<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Category Class represnt category's data.
 * 
 * @package App\Models
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class Category extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
        'name',
        'description',
        'admin_id'
    ];

    /**
     * Get the admin which create for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
    
    /**
     * Get the articles for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::Class);
    }
}
