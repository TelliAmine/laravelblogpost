<?php

namespace Tests\Feature;


use App\Post;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{ use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSavePost()
    {
        $post=new Post();
        $post->title='new Title to test';
        $post->slug=Str::slug($post->title,'-');
        $post->content="new content";
        $post->active=false;
        $post->save();
        $this->assertDatabasehas('posts',[
       'title'=>'new Title to test'
        ]);

        /*
        $response = $this->get('/');

        $response->assertStatus(200);
        */
    }
    public function testPostStoreValid(){
        $data=[
            'title'=>'test our post store',
            'slug' =>Str::slug('test our post store','-'),
            'content'=>'content store',
            'active'=>false
        ];
        $this->post('/posts',$data)//verification des donnes 
             ->assertStatus(302)//verfication de redirection
             ->assertSessionHas('status');//verfification de session

        $this->assertEquals(session('status'),'post was created');
         

    }

    public function testPostStoreFail(){
        $data=[
            'title'=>'',
           // 'slug' =>Str::slug('test our post store','-'),
            'content'=>'',
          //  'active'=>false
        ];
        $this->post('/posts',$data)//verification des donnes 
             ->assertStatus(302)//verfication de redirection
             ->assertSessionHas('errors');//verfification de session
         $messages=session('errors')->getMessages();
         //dd($messages);
         
        $this->assertEquals($messages['title'][1],'The title field is required.');
        $this->assertEquals($messages['title'][0],'The title must be at least 3 characters.');

    }       
    public function testPostUpdate(){
        $post=new Post();
        $post->title='second Title to test';
        $post->slug=Str::slug($post->title,'-');
        $post->content="new content";
        $post->active=true;
        $post->save();
        $this->assertDatabasehas('posts',$post->toArray());
        $data=[
            'title'=>'test our post store',
            'slug' =>Str::slug('test our post store','-'),
            'content'=>'content store',
            'active'=>false
        ];
       $this->put("/posts/{$post->id}",$data)
            ->assertStatus(302)
            ->assertSessionHas('status') ;
            $this->assertDatabaseHas('posts',[ 'title'=>$data['title']]
           
        );
        $this->assertDatabaseMissing('posts',[ 'title'=>$post->title]
           
    );



    }     
    public function testPostDelete(){
     
        $post=new Post();
        $post->title='second Title to test';
        $post->slug=Str::slug($post->title,'-');
        $post->content="new content";
        $post->active=true;
        $post->save();

      //dd($post);
        $this->assertDatabasehas('posts',$post->toArray());
        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');
       $this->assertDatabaseMissing('posts',$post->toArray());

    

    }                                           
                                        



}
