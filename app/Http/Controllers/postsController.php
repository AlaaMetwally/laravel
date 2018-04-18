<?php
namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreBlogPost;

class postsController extends Controller
{
   
    public function index(){

        $posts = Post::paginate(4);
        $page=$posts->currentPage()-1;

       return view('posts.index',[
           'posts'=>$posts,
           'page'=>$page,
       ]);
    }
    public function create(){
        $users=User::all();
        return view('posts.create',[
            'users'=>$users,
        ]);
    }
    public function store(StoreBlogPost $request)
    {
        // $this->validate($request, [
        //     'title' => 'required|unique:posts|min:3',
        //     'description' => 'required|min:10',
        //     'user_id' => 'exists:users,id'
        // ]);
        $users=User::all();
        $user=User::find($request->user_id);
        if($user == null){
            return view('posts.create',[
                'msg'=>"Post Creator Not Found",
                'users'=>$users,
            ]);
        }
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
       return redirect(route('posts.store')); 
    }
    public function show($id){
        return view('posts.show', ['post' => Post::findOrFail($id)]); 
    }
    public function edit($id){
        $users=User::all();
        return view('posts.edit',['post'=> Post::findOrFail($id),'users' => $users]);
    }
    public function update(StoreBlogPost $request,$id)
    {
        // $this->validate($request, [
        //     'title' => 'required|unique:posts|min:3',
        //     'description' => 'required|min:10',
        //     'user_id' => 'exists:users,id'
        // ]);
        Post::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id
        ]);
        return redirect(route('posts'));
    }
    public function destroy(Post $post)
    {
       $post->delete();
        return redirect(route('posts'));
    }

}
