<?php 

namespace App\Repositories;

use App\Models\User;

/**
 * UserRepository make processing over user's data
 * 
 * @package App\Repositories
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class UserRepository extends Repository
{
    // model property on class instances
    protected $model;
 
    /**
     * Constructor
     * 
     * @param User $model instance of User model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}