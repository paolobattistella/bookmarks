<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;

class TagsController extends Controller
{

    public function index()
    {
        $tags = DB::table('tags')->simplePaginate(10);

        return view('tags.index', ['tags' => $tags]);
    }

    public function add()
    {
        return view('tags.form', ['method' => __FUNCTION__]);
    }

    public function edit($tag_id)
    {
        $tag = DB::table('tags')->find($tag_id);

        return view('tags.form', ['method' => __FUNCTION__, 'tag' => $tag]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = $request->validate([
                'title'       => 'required|unique|max:255'
            ]);

            if ($request->has('id')){
                $tag = Tag::find($request->get('id'));
            }else{
                $tag = new Tag();
            }
            $tag->title = $request->get('title');
            $tag->save();

            $return_route = $request->has('save_and_edit') ? 'admin.tags_edit' : 'admin.tags_index';
            return redirect()->route($return_route, ['id' => $tag->id])->with('success', 'Tag (ID '.$tag->id.') salvata con successo');
        }

        return redirect()->route('admin.tags_index');
    }
}
