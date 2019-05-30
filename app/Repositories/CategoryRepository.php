<?php

namespace App\Repositories;

use App\Models\Category;

/**
 * CategoryRepository make processing over categories's data
 * 
 * @package App\Repositories
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class CategoryRepository extends Repository
{
    // model property on class instances
    protected $model;
    
    /**
     * Constructor
     * 
     * @param Category $model instance of category model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}