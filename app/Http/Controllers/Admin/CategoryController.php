<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Admin\CategoryRequest;

/**
 * CategoryController Class handle admin categories request.
 * 
 * @package App\Http\Controllers\Admin
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class CategoryController extends Controller
{
    /** CategoryRepository $categoryRepository instance of category repo */
    private $categoryRepository;

    /**
     * Constructor
     * 
     * @param CategoryRepository $categoryReporsitory instance of category repo
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->with('admin')->get();
        return view('admin.categories.index', compact('categories', $categories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['admin_id'] = auth()->user()->id;
        $this->categoryRepository->create($data);
        return redirect('/dashboard/admin/categories')->with('success','Category successfully created.');
    }
}
