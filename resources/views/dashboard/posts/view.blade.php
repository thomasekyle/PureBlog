 @extends('layouts.base-dashboard')
@section('content')
          

        @if ($posts !== 0)
            @forelse ($posts as $post)
                <div class="panel">
                    <div class="panel-header">
                       
                            <div class="pure-u-md-22-24">
                                {{$post->post_name}} - {{$post->post_date}}
                            </div>
                            <div class="pure-u-md-1-24">
                                <div class="panel-icons">
                                <a href="/dashboard/posts/edit/{{$post->id}}" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-pencil"></i></span></a>
                                <a href="/dashboard/posts/delete/{{$post->id}}" class="close" onclick="return confirm('Are you sure you want to delete this post?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                            </div>
                            </div>
                        
                    </div>
                    <div class="panel-body">
                    {!!html_entity_decode($post->post_content)!!}
                    </div>
                    <div class="panel-footer">
                       Tags:     
                    </div>
                </div>
                @endforeach
        @endif
@stop