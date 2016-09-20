<!DOCTYPE html>
<html>
    <head>
        <title>Create Post</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script><script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container">
            <div class="content">
                 <h1>Posts</h1>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                <tbody class ="detail">

                </tbody>
   
              </table>
                <h1>Create Posts</h1>
                
                <input type="hidden" id="id"/>
                
                <div class="form-group">
                    
                    {!! Form::label('name', 'Name:'); !!}
                    
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']); !!}
                    
                </div>
                
                <div class="form-group">
                    
                    {!! Form::label('description', 'Description:'); !!}
                    
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 5]); !!}
                    
                </div>
                
               
                

                 <div class="form-goup">
                    
                    {!! Form::submit('Create Post', ['class' => 'btn btn-primary click']); !!}
                    
                </div>
                <div class="form-goup">
                    
                    {!! Form::submit('Update Post', ['class' => 'btn btn-info update']); !!}
                    
                </div>
                
                    
             </div>
        </div>
 <script type="text/javascript">
 
        function getdata(){
                    
                    $.ajax({
                            
                            url  : "{{action('PostController@show')}}",
                            type : "POST",
                            async: false,
                            data : {

                            },
                            success:function(data){
                                
                               $('.detail').html(data);

                                }
                            
                            });
        }
           $(document).ready(function(){
                    $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });
                        
                    getdata();
                    
                    $('body').delegate('.ajaxedit','click',function(){
                        var id = $(this).data('id');
                                                
                            $.ajax({
                                
                                url  : "{{action('PostController@edit')}}",
                                type : "POST",
                                async: false,
                                data : {
                                    'id' : id
                                },
                                success:function(data){
                                    
                                       $('#id').val(data.id);
                                       $('#name').val(data.name);
                                       $('#description').val(data.description);
                                    
                                    }
                                    
                                });
    
                    });
                    
                    $('body').delegate('.ajaxdelete','click',function(){
                        var id = $(this).data('id');
                        var i = confirm('Are you sure you want to delete this ?');
                        
                        if(i){
                            
                                                                            
                            $.ajax({
                                
                                url  : "{{action('PostController@delete')}}",
                                type : "POST",
                                async: false,
                                data : {
                                    'id' : id
                                },
                                success:function(data){
                                    
                                   alert(data);
    
                                   getdata();
                                    
                                    }
                                
                                });
                        
                        }

                    });
          
                    $('.click').click(function(){
                        var name = $('#name').val();
                        var description = $('#description').val();
                        
                        $.ajax({
                            
                            url  : "{{action('PostController@store')}}",
                            type : "POST",
                            async: false,
                            data : {
                                'name' : name,
                                'description' : description
                            },
                            success:function(data){
                                
                               alert(data);
                               $('#name').val('');
                               $('#description').val('');
                               
                               getdata();
                                
                                }
                            
                            });
                        });
                        
                    $('.update').click(function(){
                        
                        var id = $('#id').val();
                        var name = $('#name').val();
                        var description = $('#description').val();
                        
                        $.ajax({
                            
                            url  : "{{action('PostController@update')}}",
                            type : "POST",
                            async: false,
                            data : {
                                'id' : id,
                                'name' : name,
                                'description' : description
                            },
                            success:function(data){
                                
                               alert(data);
                               $('#name').val('');
                               $('#description').val('');
                               
                               getdata();
                                
                                }
                            
                            });
                        });
                    
                    });
                
            </script>                   
    </body>
</html>
