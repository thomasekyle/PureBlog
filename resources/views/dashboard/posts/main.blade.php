 @extends('layouts.base-dashboard')
@section('content')





   <div class="pure-u-sm-1 pure-u-md-1-5 centered">
<a  href="/dashboard/posts/new" class="button-xlarge pure-button pure-button-primary pure-u-1" aria-label="Close"><div class="pure-u-1">New Post</div></a>
</div>



        <div class="pure-g">
<div class="pure-u-sm-1 pure-u-md-2-5">
<div class="header">
        <h1><div class="pure-u-1">Posts</div></h1>
        </div>
</div>

 <div class="pure-g">

        <form class="pure-form pure-form-aligned">
        
        <div class="pure-control-group">
    <div class="pure-u-sm-1 pure-u-md-22-24 centered">
    <input type="text" class="pure-input-rounded pure-u-1" placeholder="Search for a post...">
    </div>
    <div class="pure-u-sm-1 pure-u-md-1-24 centered hideme">
    <button type="submit" class="pure-button pure-u-1"><div class="pure-u-1"><i class="fa fa-search"></i></div></button>
    </div>
    </div>
</form>

</div>
        
</div>

                                
        @if ($posts !== 0)
            @forelse ($posts as $post)
            <div class="pure-u-1">
                <div class="panel-list">
                    <div class="panel-header">
                       
                            <div class="pure-u-md-21-24">
                                {{$post->post_name}} - {{$post->post_date}}
                            </div>
                            <div class="pure-u-md-2-24 toright">
                            <div class="toright">
                                <a href="/dashboard/posts/edit/{{$post->id}}" aria-label="Close"><span aria-hidden="true"><i class="fa fa-pencil"></i></span></a>
                                <a href="/dashboard/posts/delete/{{$post->id}}" onclick="return confirm('Are you sure you want to delete this post?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-list-alt"></i></span></a>
                             <a href="/dashboard/posts/delete/{{$post->id}}" onclick="return confirm('Are you sure you want to delete this post?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
                            </div>
                        
                    </div>
                    
                </div>
                </div>
                @endforeach
        @endif
        <div class="pure-g">
            <div class="centered">
       {!! $posts->render() !!}
   </div>
   </div>
@stop