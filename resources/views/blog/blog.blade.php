@extends('layouts.base-blog')
@section('content')

            
        
            <div class="posts">
                <h1 class="content-subhead">Recent Posts</h1>

            @foreach ($posts as $post)
                <section class="post">
                    <header class="post-header">
                        

                        <a href="/blog/view/{{$post->id}}"><h2 class="post-title">{{$post->post_name}}</h2></a>

                        <p class="post-meta">
                        <!--{{$useran= \App\User::find($post->user_id)->author_name}}-->
                            By <a class="post-author" href="#">{{$useran}}</a> on {{$post->post_date}} under <a class="post-category post-category-js" href="#">{{$post->post_category}}</a>
                        </p>
                    </header>

                    <div class="post-description">
                        <p>
                            {!!html_entity_decode(substr(strip_tags($post->post_content), 0, 250))!!}...
                        </p>
                    </div>
                </section>
            @endforeach
                
            </div>


@stop