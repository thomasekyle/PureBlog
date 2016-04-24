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
<form enctype="multipart/form-data" role="form" method="POST" action="/dashboard/users/store">
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
                <input id="author_name" name="author_name" value="{{ old('fname') }}" class="pure-input pure-u-md-2-5" type="text">
            </div>
            <div class="pure-control-group">
              <div class="toleft" for="email">User Email:</div>  
                <input id="email" name="email" value="{{ old('email') }}" class="pure-input pure-u-md-2-3" type="text">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="password">User Password:</div>  
                <input id="password" name="password" value="" class="pure-input pure-u-md-2-5" type="password">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="password_confirmation">User Password(Repeated):</div>  
                <input id="password_confirmation" name="password_confirmation" value="" class="pure-input pure-u-md-2-5" type="password">
            </div>

            <div class="pure-control-group">
              <div class="toleft" for="birthday">User Birthday:</div>  
                <input id="birthday" name="birthday" value="{{ old('birthday') }}" class="pure-input pure-u-md-1-3" placeholder="MM/DD/YYYY" type="text">
            </div>

            @if (count($errors))
            <div class="pure-control-group">
                <input id="create" name="create" {{ old('create') }} class="pure-input" type="checkbox">Can Create Posts?
                <input id="edit" name="edit" {{ old('edit') }} class="pure-input" type="checkbox">Can Edit Posts?
                <input id="delete" name="delete" {{ old('delete') }} class="pure-input" type="checkbox">Can Delete Posts?
                <input id="admin" name="admin" {{ old('admin') }} class="pure-input" type="checkbox">Is an Admin?
            </div>
            @else
            <div class="pure-control-group">
                <input id="create" name="create" checked class="pure-input" type="checkbox">Can Create Posts?
                <input id="edit" name="edit" checked class="pure-input" type="checkbox">Can Edit Posts?
                <input id="delete" name="delete"  checked class="pure-input" type="checkbox">Can Delete Posts?
                <input id="admin" name="admin"  class="pure-input" type="checkbox">Is an Admin?
            </div>
            @endif

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