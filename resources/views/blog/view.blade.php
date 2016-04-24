@extends('layouts.base-blog')
@section('content')

            <div class="posts">
                <a href="javascript:history.back()"><span style='color:black;'> << Back</span></a>


                <section class="post">
                    <header class="post-header">
                        

                        <h2 class="post-title">{{$post->post_name}}</h2>

                        <p class="post-meta">
                        <!--{{$useran= \App\User::find($post->user_id)->author_name}}-->
                            By <a class="post-author" href="#">{{$useran}}</a> on {{$post->post_date}} under <a class="post-category post-category-js" href="#">{{$post->post_category}}</a>
                        </p>
                    </header>

                    <div class="post-description">
                        <p>
                            {!!html_entity_decode($post->post_content)!!}
                        </p>
                    </div>
                </section>
          
                
            </div>


@stop