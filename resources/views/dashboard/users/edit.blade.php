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
<form enctype="multipart/form-data" role="form" method="POST" action="/dashboard/users/update/{{$useredit->id}}">
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
              <div class="toleft" for="author_name">Author Name(This will be the name your posts appear under):</div>  
                <input id="author_name" name="author_name" value="{{ $useredit->author_name }}" class="pure-input pure-u-md-2-5" type="text">
            </div>
            <div class="pure-control-group">
              <div class="toleft" for="email">User Email:</div>  
                <input id="email" name="email" value="{{ $useredit->email }}" class="pure-input pure-u-md-2-3" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="password">User Password:</div>  
                <a href="/dashboard/users/password/{{$useredit->id}}" class="pure-button pure-button-primary"><span style="color:#fff;">Change</span></a>
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="birthday">User Birthday:</div>  
                <input id="birthday" name="birthday" value="{{ $useredit->birthday }}" class="pure-input pure-u-md-1-3" placeholder="MM/DD/YYYY" type="text">
            </div>

            <div class="pure-control-group">
              @if ($useredit->create == 'on')
                <input id="create" name="create" checked class="pure-input" type="checkbox">Can Create Posts?
              @else
                <input id="create" name="create" class="pure-input" type="checkbox">Can Create Posts?
              @endif

              @if ($useredit->edit == 'on')
                <input id="edit" name="edit" checked class="pure-input" type="checkbox">Can Edit Posts?
              @else
                <input id="edit" name="edit" class="pure-input" type="checkbox">Can Edit Posts?
              @endif

              @if ($useredit->delete == 'on')
                <input id="delete" name="delete"  checked class="pure-input" type="checkbox">Can Delete Posts?
              @else
                <input id="delete" name="delete" class="pure-input" type="checkbox">Can Delete Posts?
              @endif

              @if ($useredit->admin =='on')
                <input id="admin" name="admin"  checked class="pure-input" type="checkbox">Is an Admin?
              @else
                <input id="admin" name="admin"  class="pure-input" type="checkbox">Is an Admin?
              @endif
            </div>
         

          <!-- File Button --> 
            <div class="pure-control-group">
              <div class="toleft" for="description">User Description:</div>  

                 <textarea type="hidden" class="pure-input pure-u-1" name="description" id='description' rows="7">{{ old('description') }}</textarea>
          
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