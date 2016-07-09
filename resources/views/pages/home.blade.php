@extends('layouts.default')

@section('title_page')
Home
@stop

@section('home_active')
class="active"
@stop

@section('content')
        <div id="carousel-id" class="carousel slide" data-ride="carousel">
        	<ol class="carousel-indicators">
        		<li data-target="#carousel-id" data-slide-to="0" class=""></li>
        		<li data-target="#carousel-id" data-slide-to="1" class=""></li>
        		<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
        	</ol>
        	<div class="carousel-inner">
        		<div class="item">
        			<img src="{{asset('resources/assets/images/slide1.jpg')}}" alt="">
        			<div class="container">
        				<div class="carousel-caption">
        					<h1>Example headline.</h1>
        				</div>
        			</div>
        		</div>
        		<div class="item">
        			<img src="{{asset('resources/assets/images/slide2.gif')}}" alt="">
        			<div class="container">
        				<div class="carousel-caption">
        					<h1>Another example headline.</h1>
        				</div>
        			</div>
        		</div>
        		<div class="item active">
        			<img src="{{asset('resources/assets/images/slide3.jpg')}}" alt="">
        			<div class="container">
        				<div class="carousel-caption">
        					<h1>One more for good measure.</h1>
        				</div>
        			</div>
        		</div>
        	</div>
        	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>


       <div class="jumbotron">
       	<div class="container text-center">
       		<h1>Home</h1>
       		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       	            
                    <a href="{{url('register')}}" class="btn btn-success btn-lg">Register</a>
        </div>
       </div>


       <div class="container">
	        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
	        	 <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
	        	 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
	        </div>

	        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
	        	<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
	        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
	        </div>

	        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
	        	<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
	        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
	        </div>
        </div>
@stop