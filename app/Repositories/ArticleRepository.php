<?php 

namespace App\Repositories;

use App\Models\Article;

/**
 * ArticleRepository make processing over articles's data
 * 
 * @package App\Repositories
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class ArticleRepository extends Repository
{
    // model property on class instances
    protected $model;

    /**
     * Constructor
     * 
     * @param Article $model instance of article model
     */
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    /**
     * Filter article different criteria ex. [id, category_id, admin_id, name]
     * 
     * @param array $data array of filters
     */
    public function filter($data)
    {
        $articles = $this->model->with(['comments', 'category', 'admin'])->withCount('comments');

        if(isset($data['category_id'])) {
            $articles->whereHas('category', function($categoryQuery) use($data) {
                $categoryQuery->where('id' , $data['category_id']);
            });
        }

        return $articles->get();
    }
}