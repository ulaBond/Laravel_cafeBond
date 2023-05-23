@extends('layouts.app')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Product manage - Delete product</strong></h3>
	<div class="add">
	<a href="/productlist" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-backward"></i> Back to list</a>
	</div>

</div>

<div class="alert alert-danger">
	<strong>You have deleted the PRODUCT!</strong> 					
</div>

@endsection