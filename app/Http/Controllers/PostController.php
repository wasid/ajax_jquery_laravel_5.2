<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

//use DB;

class PostController extends Controller
{
    public function index(){
        
        return view('index');
        
    }

    public function show(){
   //   $collection = DB::table('posts')->get();
      $posts = Post::all();
    //   var_dump($collection);
    //   die();
    //   $m= new Post;
    //   $data= $m->display();
      foreach($posts as $key => $post)
        {
            ?>
                <tr>
      <td><?= $key+1 ?></td>
      <td><?= $post->name ?></td>
      <td><?= $post->description ?></td>
      <td><?= $post->created_at ?></td>
      <td><?= $post->updated_at ?></td>
      <td><a onclick="return false;" class="ajaxedit" data-id="<?= $post->id ?>" href="<?php echo 'ajaxedit/'.$post->id ?>">Edit</a> | <a onclick="return false;" class="ajaxdelete" data-id="<?= $post->id ?>" href="<?php echo 'ajaxdelete/'.$post->id ?>">Delete</a> </td>
                </tr>
           <?php

        }
        exit();
    }
    
    public function store(Request $request){
        
        // $m= new Post;
        // $post= $request->all();	
        // $name= $post['name'];
        // $description= $post['description'];
        // $i= $m->insert($name, $description);
        $post = new Post;

        $post->name = $request->name;
        $post->description = $request->description;

        
      
        	if($post->save())
    		{
    			echo 'Post Successfully Created!';
    		}
    		else
    		{
    		    echo 'Something went wrong!';
            }
                exit();
    }
    
    public function update(Request $request){
        
        // $post= $request->all();
        // $id= $post['id'];
        // $m= new Post;
        // $i= $m->updates($id,$post['name'],$post['description']);
        $post = $request->all();
        $id = $post['id'];
        $post = Post::find($id);
        $post->name = $request->name;
        $post->description = $request->description;
        
       
          
          if($post->save())
    		{
    			echo 'Updated Successfully!';
    		}
    		else
    		{
    		    echo 'Something went wrong!';
            }
               
           exit();
    }
    
    public function edit(Request $request){
        
        $post= $request->all();
        $id= $post['id'];
        // $m= new Post;
        // $row= $m->get_row($id);
        $post = Post::find($id);
        header('Content-type:text/x-json');
           echo json_encode($post);
           exit();
    }
    
    public function delete(Request $request){
        
        $post= $request->all();
        $id= $post['id'];
    // $m= new Post;
    // $i= $m->delete_row($id);
       $post = Post::find($id);
       
       
        	if($post->delete())
    		{
    			echo 'Deleted Successfully!';
    		}
    		else
    		{
    		    echo 'Something went wrong!';
            }
                exit();
    }
    
}
