<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Bookmark;
use App\Repositories\BookmarkRepository;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Click;
use App\Hasher;

class BookmarksController extends Controller
{
    protected $bookmark;

	public function __construct(BookmarkRepository $bookmark)
	{
		$this->bookmark = $bookmark;
	}

    public function index()
    {
        $current = Bookmark::find(1);
        return view('admin.bookmarks.index', ['bookmarks' => $this->bookmark->index(), 'current' => $current]);
    }

    public function add()
    {
        $data['method'] = __FUNCTION__;
        $data['categories'] = Category::orderBy('title', 'asc')->get();

        return view('admin.bookmarks.form', $data);
    }

    public function edit(Request $request, Bookmark $bookmark)
    {
        //dd($request->get('bookmark_id'));
        $data['method'] = __FUNCTION__;
        $data['bookmark'] = $this->bookmark->edit($bookmark->id);
        $data['categories'] = Category::orderBy('title', 'asc')->get();

        return view('admin.bookmarks.form', $data);
    }

    public function search(Request $request)
    {
        if($request->has('query')) {
            $bookmarks = Bookmark::with(['tags', 'category:id,title'])->where('title', 'like', '%'.$request->get('query').'%')->get();
            return $bookmarks;
        }
        return [];
    }

    public function latest(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $latest_bookmarks = $this->bookmark->latest($limit);

        return $latest_bookmarks;
    }

    public function goTo($bookmark_id)
    {
        $bookmark = Bookmark::find($bookmark_id, ['id','url']);

        if (!empty($bookmark)){
            $click = new Click();
            $click->bookmark_id = $bookmark_id;
            $click->save();
            return redirect($bookmark->url);
        }

        return redirect()->route('pages_bookmarks');
    }

    public function apiIndex()
    {
        return $this->bookmark->index();
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $result = $request->validate([
                'title'       => 'required|max:255',
                'url'         => 'required|url'
            ]);

            if ($request->has('id')){
                $bookmark = Bookmark::find($request->get('id'));
            }else{
                $bookmark = new Bookmark();
            }
            $bookmark->title = $request->get('title');
            $bookmark->url = $request->get('url');
            $bookmark->description = $request->get('description');
            $bookmark->category_id = $request->get('category_id');
            $bookmark->public = intval($request->get('public'));

            $bookmark->save();

            if ($request->has('tags')){
                $tags = explode(',', $request->get('tags'));
                foreach ($tags as $tag_title){
                    $data = DB::table('tags')->where('title', trim($tag_title))->first();
                    if (sizeof($data)==0){
                        $tag = new Tag();
                        $tag->title = trim($tag_title);
                        $tag->save();
                    }else{
                        $tag = Tag::find($data->id);
                    }
                    $bookmark->tags()->attach($tag);
                }
            }

            $return_route = $request->has('save_and_edit') ? 'admin.bookmarks_edit' : 'admin.bookmarks_index';
            return redirect()->route($return_route, ['id' => $bookmark->id])->with('success', 'Segnalibro (ID '.$bookmark->id.') salvata con successo');
        }

        return redirect()->route('admin.bookmarks_index');
    }

}
