<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Admin\ArticleRequest;

/**
 * ArticleController Class handle admin articles request.
 * 
 * @package App\Http\Controllers\Admin
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class ArticleController extends Controller
{
    /** ArticleRepository $articleReporsitory instance of article repo */
    private $articleRepository;
    /** CategoryRepository $categoryRepository instance of category repo */
    private $categoryRepository;

    /**
     * Constructor
     * 
     * @param ArticleRepository $articleReporsitory instance of article repo
     * @param CategoryRepository $categoryRepository instance of article repo
     */
    public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = $this->articleRepository->filter($request->all());
        return view('admin.articles.index', compact('articles', $articles));
    }

    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.articles.create', compact('categories', $categories));
    }

    /**
     * Store a newly created article in the DB.
     *
     * @param  \App\Http\Requests\Admin\ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // get all request data
        $data = $request->all();

        // get the uploaded image and save it images folder
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $data['image']    = $imageName;
        $data['admin_id'] = auth()->user()->id;

        // save new article
        $this->articleRepository->create($data);
        return redirect('/dashboard/admin/articles')->with('success','Article successfully created.');
    }
}
