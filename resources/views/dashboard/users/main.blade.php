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

<div class="pure-u-sm-1 pure-u-md-1-5 centered">
<a  href="/dashboard/users/new" class="button-xlarge pure-button pure-button-primary pure-u-1" aria-label="Close"><div class="pure-u-1">New User</div></a>
</div>


<div class="pure-g">
<div class="pure-u-sm-1 pure-u-md-2-5">
<div class="header">
        <h1><div class="pure-u-1">Users</div></h1>
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

                                
        @if (count($users) != 0)
            @foreach ($users as $user)
            <div class="pure-u-1">
                <div class="panel-list">
                    <div class="panel-header">
                       
                            <div class="pure-u-md-21-24">
                              <a href="mailto:{{$user->email}}">{{$user->email}}</a> > {{$user->author_name}}
                            </div>
                            <div class="pure-u-md-2-24 toright">
                            <div class="toright">
                                <a href="/dashboard/users/edit/{{$user->id}}" aria-label="Close"><span aria-hidden="true"><i class="fa fa-pencil"></i></span></a>
                                <a href="/dashboard/users/delete/{{$user->id}}" onclick="return confirm('Are you sure you want to delete this user?')" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
                            </div>
                        
                    </div>
                    
                </div>
                </div>
                @endforeach
        @else
        <hr>
        There don't seem to be any users here.
        <hr>
        @endif
        <div class="pure-g">
            <div class="centered">
       {!! $users->render() !!}
   </div>
   </div>
@stop