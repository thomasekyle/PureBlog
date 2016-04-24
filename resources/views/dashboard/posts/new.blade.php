@extends('layouts.base-dashboard')
@section('content')

@if (count($errors))
@foreach($errors->all() as $err)
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  {{$err}}
</div>
@endforeach
<hr>
@endif

@if (!empty($success))
<div class="alert alert-success" role="success">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
  {{$success}}
</div>
<hr>
@endif

<div class="pure-g">
<form enctype="multipart/form-data" role="form" method="POST" action="/dashboard/posts/store">
<div class="pure-u-1">

<div class="panel">


<div class="panel-header">
  <span>New Post</span>

</div>

<div class="panel-body">
<!-- Form Name -->


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="pure-form pure-form-aligned">
          <!-- File Button --> 
            <div class="pure-control-group">
              <div class="toleft" for="post_name">Post Name:</div>  
                <input id="post_name" name="post_name" value="" placeholder="Enter a name for the post..." class="pure-input pure-u-1" type="text">
            </div>

          <!-- File Button --> 
            <div class="pure-control-group">
              <div class="toleft" for="post_name">Post Content:</div>  

                 <textarea type="hidden" class="pure-input pure-u-1" name="post_content" id='post_content' rows="7"></textarea>
          
            </div>


          <!-- File Button --> 
            <div class="pure-control-group">
              <div class="toleft" for="post_name">Post Tags:</div>  
                <input id="post_tags" name="post_tags" value="" class="pure-input pure-u-1" type="text">
            </div>


<div class="pure-control-group">
  <div class="toleft" for="post_name">Post Category:</div>
    <select id="pcat" name="pcat" class="pure-input pure-u-1">


        <option value="Gaming" >Gaming</option>

      <option value="Life">Life</option>

      <option value="Programming">Programming</option>
 
      <option value="Technology">Technology</option>
 
      <option value="Website">Website</option>
 
      <option value="All">All</option>
    </select>
  </div>




</div>


</div>

<div class="panel-footer toright">
        <a href="javascript:history.back()"><span style='color:black;'>Back</span></a>
        <input class="pure-button pure-button-primary pure-sm-2-5 pure-md-4-24" type="submit" value="Submit">
     </div>

</div>


</div>
</form>
</div>
@stop