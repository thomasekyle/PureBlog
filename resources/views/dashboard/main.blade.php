 @extends('layouts.base-dashboard')
@section('content')



<div class="pure-g">
<div class="pure-u-1">
          <div class="panel">
                            <div class="panel-header">
                            
                                        {{$user->author_name}} 
    
                            </div>
                                <div class="panel-body">
                                <!--{{$pnumber = \App\Posts::all()}}-->
                                    <span>Weclome Back! Your last login was at {{$user->updated_at}}.</span>
                                    <br>
                                    <span>There are a total of {{count($pnumber)}} posts.</span>
                                 
                                </div>
                            
                        </div>
                        </div>
</div>

<div class="pure-g">

        <form class="pure-form pure-form-aligned">
        
        <div class="pure-control-group">
            
    <div class="pure-u-sm-1 pure-u-md-22-24 centered">
    <input type="text" class="pure-input-rounded pure-u-1" placeholder="Search your blarg...">
    </div>
    <div class="pure-u-sm-1 pure-u-md-1-24 centered hideme">
    <button type="submit" class="pure-button pure-u-1"><div class="pure-u-1"><i class="fa fa-search"></i></div></button>
    </div>
    </div>
</form>

</div>


   



        <div class="pure-g">
<div class="pure-u-sm-1 pure-u-md-2-5">
<div class="header">
        <h1><div class="pure-u-1">Last 5 posts</div></h1>
        </div>
</div>

 
        
</div>

                                
        @if ($posts !== 0)
            @forelse ($posts as $post)
            <div class="pure-u-1">
                <div class="panel">
                    <div class="panel-header">
                       
                            <div class="pure-u-md-21-24">
                                {{$post->post_name}} - {{$post->post_date}}
                            </div>
                            <div class="pure-u-md-2-24 toright">
                            <div class="toright">
                                <a href="/dashboard/posts/edit/{{$post->id}}" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-pencil"></i></span></a>
                                <a href="/dashboard/posts/delete/{{$post->id}}" class="close" onclick="return confirm('Are you sure you want to delete this post?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-list-alt"></i></span></a>
                             <a href="/dashboard/posts/delete/{{$post->id}}" class="close" onclick="return confirm('Are you sure you want to delete this post?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
                            </div>
                        
                    </div>
                    <div class="panel-body">
                     {!!html_entity_decode(substr(strip_tags($post->post_content), 0, 500))!!}...
                    </div>
                    <div class="panel-footer">
                       Tags:     
                    </div>
                </div>
                </div>
                @endforeach
        @endif
       
@stop