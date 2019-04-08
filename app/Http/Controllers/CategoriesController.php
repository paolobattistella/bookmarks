<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\CategoryRepository;
//use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoriesController extends Controller
{
    protected $category;

	public function __construct(CategoryRepository $category)
	{
		$this->category = $category;
	}

    public function index()
    {
        $categories = $this->category->all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function add()
    {
        return view('admin.categories.form', ['method' => __FUNCTION__]);
    }

    public function edit($category_id)
    {
        $category = $this->category->find($category_id);

        return view('admin.categories.form', ['method' => __FUNCTION__, 'category' => $category]);
    }

    public function apiIndex()
    {
        return $this->category->all();
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = $request->validate([
                'title'       => 'required|max:255'
            ]);

            if ($request->has('id')){
                $category = Category::find($request->get('id'));
            }else{
                $category = new Category();
            }
            $category->title = $request->get('title');
            $category->save();

            $return_route = $request->has('save_and_edit') ? 'admin.categories_edit' : 'admin.categories_index';
            return redirect()->route($return_route, ['id' => $category->id])->with('success', 'Categoria (ID '.$category->id.') salvata con successo');
        }

        return redirect()->route('admin.categories_index');
    }
}
