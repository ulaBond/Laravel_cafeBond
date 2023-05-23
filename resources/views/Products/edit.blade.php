@extends('layouts.app')

@section('content')
<div class="box-header with-border">
	<h3 class="box-title"><strong> Product manage - Edit product</strong></h3>
	<div class="add">
	<a href="/productlist" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-backward"></i> Back to list</a>
	</div>

</div>

<div class="box-body">
	<div class="container">
        <div class="col-lg-9 margin-tb">
			@if ($errors->any())
				<div class="alert alert-danger">
					<strong>Error!</strong> 
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
		<form action="" method="POST" enctype="multipart/form-data">
			@csrf			
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Title:</strong>
					<input type="text" name="title" class="form-control" value="{{$product->title}}">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Price:</strong>
					<input type="text" name="price" class="form-control" value="{{$product->price}}">
				</div>
			</div>		
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Description:</strong>
					<textarea class="form-control" style="height:50px" name="description"
					value="">{{$product->description}}</textarea>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Category:</strong>
				<select name="category_id" class="form-control" >															
					@foreach ($categories as $category) 						
						<option value="{{$category->id}}"
						@if($category->id==$product->category_id)
						selected
					@endif
					>{{$category->name}}</option>						
					@endforeach
					  
				</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Oldimage:</strong>
				  <!-- <input type="file" name="image"  class="form-control" value=""> -->
					<img src="../images/{{$product->image}}">
					<strong>Name image: {{$product->image}}</strong>
				</div>
			</div>	
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Image:</strong>
				  <input type="file" name="image"  class="form-control" value="">  
				</div>
			</div>						
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Update product</button>
			</div>			
		</form>
		</div>
    </div>
</div>
@endsection