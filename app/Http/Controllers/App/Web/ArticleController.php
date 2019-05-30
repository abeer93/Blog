<?php

namespace App\Http\Controllers\App\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Http\Requests\App\Web\CommentRequest;

/**
 * ArticleController Class handle user articles request.
 * 
 * @package App\Http\Controllers\App\Web
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class ArticleController extends Controller
{
    /** ArticleRepository $articleReporsitory instance of article repo */
    private $articleRepository;
    /** CategoryRepository $categoryRepository instance of category repo */
    private $categoryRepository;
    /** CommentRepository $commentRepository instance of comment repo */
    private $commentRepository;

    /**
     * Constructor
     * 
     * @param ArticleRepository $articleReporsitory instance of article repo
     * @param CategoryRepository $categoryRepository instance of category repo
     * @param CommentRepository $commentRepository instance of comment repo
     */
    public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository, CommentRepository $commentRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->commentRepository = $commentRepository;
    }
    
    /**
     * Display a listing of the articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = $this->articleRepository->filter($request->all());
        $categories = $this->categoryRepository->all();
        $data = [
            'articles'   => $articles,
            'categories' => $categories
        ];
        return view('app.web.articles.index')->with($data);
    }
    
    /**
     * Add new comment under specific article
     * 
     * @param CommentRequest $request comment request instance
     * @param int $articleId article id
     */
    public function createComment(CommentRequest $request, $articleId)
    {
        $data               = $request->all();
        $data['article_id'] = $articleId;
        $data['user_id']    = auth()->user()->id;
        $this->commentRepository->create($data);
        return redirect('/web/articles')->with('success','Comment successfully created.');
    }
}
