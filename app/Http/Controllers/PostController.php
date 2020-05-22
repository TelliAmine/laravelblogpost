<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('create','edit','update','destroy');
    }
 
   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        return view('posts.index' ,[
            'posts'=>Post::all()

        ]
        
        );
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    
        return view('posts.show' ,[
            'post'=> Post::find($id)

        ]
        );
    }
    public function create()
    {
        
    
        return view('posts.create' ,[
           // 'post'=> Post::find($id)

        ]
        );
    }

    public function store( StorePost $request )
    {  /*
       // $request->validate();
        $post=new Post();
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        //la methode input pour obtenir par champs
        $post->slug=Str::slug($post->title,'-');
        $post->active=false;
        $post->save();
        $request->session()->flash('status','post was created');
       // return redirect()->route('posts.show',['post'=>$post->id]);
       return redirect()->route('posts.index');
       */
    
       $data=$request->only(['title','content']);
       $data['slug']=Str::slug($data['title'],'-');
       $data['active']=false;
       $post=Post::create($data);//recuperer post via le modele :laravel connait quand va faire insert
       $request->session()->flash('status','post was created');
       // return redirect()->route('posts.show',['post'=>$post->id]);
       return redirect()->route('posts.index');
      
    }
    

    
    public function edit( $id ){
        $post=Post::findOrfail($id); //recuperer post via le model
        return view('posts.edit',[
            'post'=>$post
        ]);


    }
    
    
    public function update( StorePost $request ,$id ){
        $post=Post::findOrfail($id);
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->slug=Str::slug($post->title,'-');
        //$post->active=false;
        //laravel connait quant va faire update
        $post->save();
        $request->session()->flash('status','post was updated');
        // return redirect()->route('posts.show',['post'=>$post->id]);
        return redirect()->route('posts.index');
   
    


    }


    public function destroy( Request $request,$id){

        $post=Post::findOrFail($id);
        $post->delete();
        //ou on fait Post::destroy($id)
        $request->session()->flash('status','post was deleted');
        return redirect()->route('posts.index');

    }

}
