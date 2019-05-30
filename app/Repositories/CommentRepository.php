<?php 

namespace App\Repositories;

use App\Models\Comment;

/**
 * CommentRepository make processing over comment's data
 * 
 * @package App\Repositories
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class CommentRepository extends Repository
{
    // model property on class instances
    protected $model;

    /**
     * Constructor
     * 
     * @param Comment $model instance of comment model
     */
    public function __construct(Comment $model)
    {
        $this->model = $model;
    }
}