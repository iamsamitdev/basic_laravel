@extends('layouts.default')

@section('title_page')
	Login
@stop

@section('home_active')
	class="active"
@stop

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login via site</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="{{url('admin/process')}}">
                    				@if(Session::has('message'))
						 <div class="panel-body bg-danger color-red">
						 {{Session::get('message')}}
						 </div>
					 @endif
                    			<fieldset>
			    	  	<div class="form-group">
			    		    	<input class="form-control" placeholder="yourmail@example.com" name="email" type="text">
			    		    	{!!$errors->first('email', '<span class="error">*:message</span>')!!}
			    		</div>

			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    			{!!$errors->first('password', '<span class="error">*:message</span>')!!}
			    		</div>

			    		<div class="checkbox">
				    	    	<label>
				    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
				    	    	</label>
			    	    	</div>

			    	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>

@stop