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
<form enctype="multipart/form-data" role="form" method="POST" action="/dashboard/settings/update/{{$settings->id}}">
<div class="pure-u-1">

<div class="panel">


<div class="panel-header">
  <span>Settings</span>

</div>

<div class="panel-body">
<!-- Form Name -->


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="pure-form pure-form-aligned">
          <!-- File Button --> 
            <div class="pure-control-group">
              <div class="toleft" for="blog_name">Blog Name:</div>  
                <input id="blog_name" name="blog_name" value="{{$settings->blog_name}}" class="pure-input pure-u-1" type="text">
            </div>

          <div class="pure-control-group">
              <div class="toleft" for="blog_description">Blog Description:</div>  
                <input id="blog_description" description="blog_description" value="{{$settings->blog_description}}" class="pure-input pure-u-1" type="text">
            </div>

          <div class="pure-control-group">
              <div class="toleft" for="blog_phone_number">Blog Phone Number:</div>  
                <input id="blog_phone_number" name="blog_phone_number" value="{{$settings->blog_phone_number}}" class="pure-input pure-u-1" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="blog_email">Blog Email:</div>  
                <input id="blog_email" name="blog_email" value="{{$settings->blog_email}}" class="pure-input pure-u-1" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="blog_facebook">Blog Facebook Link:</div>  
                <input id="blog_facebook" name="blog_facebook" value="{{$settings->blog_facebook}}" class="pure-input pure-u-1" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="blog_twitter">Blog Twitter Link:</div>  
                <input id="blog_twitter" name="blog_twitter" value="{{$settings->blog_twitter}}" class="pure-input pure-u-1" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="blog_linkedin">Blog LinkedIn Link:</div>  
                <input id="blog_linkedin" name="blog_linkedin" value="{{$settings->blog_linkedin}}" class="pure-input pure-u-1" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="blog_instagram">Blog Instgram Link:</div>  
                <input id="blog_instagram" name="blog_instagram" value="{{$settings->blog_instagram}}" class="pure-input pure-u-1" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="blog_github">Blog GitHub Link:</div>  
                <input id="blog_github" name="blog_github" value="{{$settings->blog_github}}" class="pure-input pure-u-1" type="text">
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