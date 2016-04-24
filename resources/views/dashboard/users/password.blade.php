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
<form enctype="multipart/form-data" role="form" method="POST" action="/dashboard/users/password/update/{{$useredit->id}}">
<div class="pure-u-1">

<div class="panel">


<div class="panel-header">
  <span>New User</span>

</div>

<div class="panel-body">
<!-- Form Name -->


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="pure-form pure-form-stacked">
          <!-- File Button --> 
            
            
            <div class="pure-control-group">
              <div class="toleft" for="entered_password">Current Password:</div>  
                <input id="entered_password" name="entered_password" value="" class="pure-input pure-u-md-2-3" type="password">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="password">New Password:</div>  
                <input id="password" name="password" value="" class="pure-input pure-u-md-2-3" type="password">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="password_confirmation">New Password(Repeated):</div>  
                <input id="password_confirmation" name="password_confirmation" value="" class="pure-input pure-u-md-2-3" type="password">
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