<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use DB;

class Post extends Model
{
      protected $fillable = [
        'name', 'description',
    ];
    
    // function insert($name, $description){
      
    //   $data = array(
        
    //   'name' => $name,
    //   'description' => $description
        
    //   );
      
    //   $i = DB::table('posts')->insertGetId($data);
      
    //   return $i;
      
    // }
    
    // function get_row($id){
      
    //   $g = DB::table('posts')->where('id', $id)->first();
      
    //   return $g;
    // }
    
    // function updates($id, $name, $description){
      
    //   $data = array(
        
    //   'name' => $name,
    //   'description' => $description
        
    //   );
      
    //   $r = DB::table('posts')->where('id', $id)->update($data);
      
    //   return $r;
    // }
    
    // function delete_row($id){
      
    //   $q = DB::table('posts')->where('id', $id)->delete();
      
    //   return $q;
    // }
    
}

