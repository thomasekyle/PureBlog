@extends('layouts.base-login')
@section('content')
<br>

    <form role="form" method="POST" action="/auth/login">
        {!! csrf_field() !!}
    <div class="col-md-12">
    @if (count($errors))
@foreach($errors->all() as $err)
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  {{$err}}
</div>
@endforeach
<br><br>
@endif
            
    <div class="pure-u-md-1-3"></div>

    
    
        <div class="pure-u-md-1-3">
        <p></p>
        <div class="panel ">
        <div class="panel-header">Log In</div>
        
            
    <div class="panel-body">
        
                    <div class="pure-form pure-form-aligned">
                    <fieldset>
                    <div class="pure-control-group">
                        <label for="email">Email:</label>
                            <input type="email" class="pure-input-3-6" name="email" placeholder="Enter Email Address" value="{{ old('email') }}" required>
                         </div>
               <div class="pure-control-group">
                        <label for="password">Password:</label>
                            <input type="password" class="pure-input-3-6"  name="password" id="password" placeholder="Enter Password" required>
                       </div>

                      <div class="centered">
                           <p><a href="/password/email">Forgot Password</a></p>
                     
                     
                           <input type="checkbox" name="remember"> Remember Me
                       
                        
                    </div>
                    

                        
                   </fieldset> 
                    </div>
            
                
                            
                    
                </div>

                <div class="panel-footer toright">
            
                   
                    <a href="/" class="pure-button pure-button-primary">Back</a>
                    <button class="pure-button pure-button-primary" type="submit">Login</button>
                    

                </div>
            </div>
           
        

            
            
        </div>
        <div class="pure-u-md-1-3"></div>
</form>
   
@stop