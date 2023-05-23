@extends('layouts.app')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Users manage - Edit users</strong></h3>
	<div class="add">
	<a href="/users" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-backward"></i> Back to list</a>
	</div>

</div>

<div class="box-body">
	<div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')
<!-- New User Form -->        
		<form action="{{ url('edituser/'.$user->id) }}" method="POST" class="form-horizontal">
       
			{{ @csrf_field() }}	
		<div>
			<div class="form-group">
				<label for="name" class="col-sm-3 control-label">name:</label>
				
				<div class="col-sm-6">
					<input type="text" name="name" class="form-control" value="{{$user->name}}" >
				</div>				
			</div>	
		</div>
		<div>		
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email:</label>
				
				<div class="col-sm-6">
					<input type="email" name="email" class="form-control" value="{{$user->email}}" readonly>
				</div>				
			</div>
		</div>	
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">password:</label>
				
				<div class="col-sm-6">
					<input type="password" name="password" class="form-control" value="" placeholder="password min 6 symbol">
				</div>				
			</div>
			<div class="form-group">
				<label for="password_confirmation" class="col-sm-3 control-label">confirm password:</label>
				
				<div class="col-sm-6">
					<input type="password" name="password_confirmation" class="form-control" value="" placeholder="confirm password">
				</div>				
			</div>
			<div class="form-group">	
				<label for="email" class="col-sm-3 control-label">Role:</label>
				<div class="col-sm-6">
					<select class="form-control input-sm" name="role"	
						@if(Auth::user()->role!='admin') disabled @endif
					><!-- этот блок скрыт, если пользователь не admin -->					
							@foreach ($roles as $role) 
							<option value="{{$role}}" 
								@if($role==$user->role) 
									selected 
								@endif
							>{{$role}}</option>						
						@endforeach					  
					</select>
				</div>				
			</div>						
					
			<div class="col-sm-3 text-center">
				<button type="submit" class="btn btn-primary">Update user</button>
			</div>			
		</form>
	
    </div>
</div>
@endsection