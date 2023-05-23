@extends('layouts.appLogin')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Register User </strong></h3>	
</div>

<div class="box-body">
	<div class="container">
        <!-- Display Validation Errors {{-- url('adduser')--}}-->
        @include('common.errors')
<!-- New User Form -->        
		<form action="" method="POST" class="form-horizontal">
			{{ @csrf_field() }}	
		<div>
			<div class="form-group">
				<label for="name" class="col-sm-3 control-label">name:</label>
				
				<div class="col-sm-6">
					<input type="name" name="name" id="name" class="form-control" value="" placeholder="name">
				</div>				
			</div>	
		</div>
		<div>		
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email:</label>
				
				<div class="col-sm-6">
					<input type="email" name="email" id="email" class="form-control" value="" placeholder="email">
				</div>				
			</div>
		</div>	
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">password:</label>
				
				<div class="col-sm-6">
					<input type="password" name="password" id="password" class="form-control" value="" placeholder="password min 6 symbol">
				</div>				
			</div>
			<div class="form-group">
				<label for="password_confirmation" class="col-sm-3 control-label">confirm password:</label>
				
				<div class="col-sm-6">
					<input type="password" name="password_confirmation" id="" class="form-control" value="" placeholder="confirm password">
				</div>				
			</div>
			<div class="form-group" >				
				<div class="col-sm-6">
                <input type="hidden" name="role" id="" class="form-control" value="user" placeholder="">
				
				</div>				
			</div>				
			<div class="col-sm-3 text-center">
				<button type="submit" class="btn btn-primary">Register user</button>
			</div>			
		</form>
	
    </div>
</div>
@endsection