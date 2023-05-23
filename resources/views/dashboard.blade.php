@extends('layouts.app')

@section('content')
	<div class="box-header with-border">
		<h3 class="box-title"><strong>Dashboard Start page</strong></h3>		
	</div>
	<div class="box-body" style="min-height: 150px">
		Welcome Dashboard page
		
		<div><br>
			@can('isAdmin')
				<div class="btn btn-warning btn-lg">
					You have Admin Access
				</div>
			@elsecan('isManager')
				<div class="btn btn-success btn-lg">
					You have Manager Access
				</div>
			@elsecan('isUser')
				<div class="btn btn-primary btn-lg">
					You have User Access
				</div>
			@else
				<div class="btn btn-danger btn-lg">
					You are not logged in
				</div>
			@endcan
		</div>
	</div>
@endsection