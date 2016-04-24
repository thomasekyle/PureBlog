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
<div class="row">


@if (!empty($success))
<div class="alert alert-success" role="success" id="success-alert">
<span class="close" data-dimiss="alert" aria-label="close">&times;</span>
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  
  <span class="sr-only">Success:</span>
  {{$success}}
</div>
<hr>
@endif


<div class="pure-g">
<div class="pure-u-1">
<div class="panel">

 <form enctype="multipart/form-data" role="form" method="POST" action="/dashboard/files/upload">

<div class="panel-header">
  <span>Upload File(s)</span>

</div>

<div class="panel-body">
<!-- Form Name -->


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="pure-form pure-form-aligned">
          <!-- File Button --> 
            <div class="pure-control-group">
              <div class="toleft" for="file_tags">File Tags:</div>
                <input id="file_tags" name="file_tags" value="" placeholder="" class="pure-input pure-u-1" type="text">
          </div>
          <div class="pure-control-group">
                 <div class="toleft" for="post_name">File:</div>  
                <input type="file" name="file[]" class="input-file" id="file[]" multiple="true">
            </div>
</div>
</div>

<div class="panel-footer toright">
        
        <input class="pure-button pure-button-primary pure-sm-2-5 pure-md-4-24" type="submit" value="Upload">
     </div>

</form>
</div>
</div>
</div>

<div class="pure-g">
<div class="pure-u-sm-1 pure-u-md-2-5">
<div class="header">
        <h1><div class="pure-u-1">Files</div></h1>
        </div>
</div>


 <div class="pure-g">

        <form class="pure-form pure-form-aligned">
        
        <div class="pure-control-group">
    <div class="pure-u-sm-1 pure-u-md-22-24 centered">
    <input type="text" class="pure-input-rounded pure-u-1" placeholder="Search for a file...">
    </div>
    <div class="pure-u-sm-1 pure-u-md-1-24 centered hideme">
    <button type="submit" class="pure-button pure-u-1"><div class="pure-u-1"><i class="fa fa-search"></i></div></button>
    </div>
    </div>
</form>

</div>
        
</div>

                                
        @if (count($files) != 0)
            @foreach ($files as $file)
            <div class="pure-u-1">
                <div class="panel-list">
                    <div class="panel-header">
                       
                            <div class="pure-u-md-21-24">
                                <a href="/files/{{$file->file_true_name}}" target="_blank">{{substr($file->file_name, 0, 60)}}</a> - {{$file->file_date}}
                            </div>
                            <div class="pure-u-md-2-24 toright">
                            <div class="toright">
                                <a href="/dashboard/files/edit/{{$file->id}}" aria-label="Close"><span aria-hidden="true"><i class="fa fa-pencil"></i></span></a>
                                <a href="/dashboard/files/delete/{{$file->id}}" onclick="return confirm('Are you sure you want to delete this file?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
                            </div>
                        
                    </div>
                    
                </div>
                </div>
                @endforeach
        @else
        <hr>
        There don't seem to be any files here.
        <hr>
        @endif
        <div class="pure-g">
            <div class="centered">
       {!! $files->render() !!}
   </div>
   </div>
@stop