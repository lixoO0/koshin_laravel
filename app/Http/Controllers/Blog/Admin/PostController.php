<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogPostUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
 /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository; // властивість через яку будемо звертатись в репозиторій категорій
    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $paginator = $this->blogPostRepository->getAllWithPaginate();

                return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
               if (empty($item)) {                         //помилка, якщо репозиторій не знайде наш ід
                   abort(404);
               }
               $categoryList = $this->blogCategoryRepository->getForComboBox();

               return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostUpdateRequest  $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
