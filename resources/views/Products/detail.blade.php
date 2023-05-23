@extends('layouts.appMain')

@section('content')

<div>
	<div class="col-md-2 col-md-offset-1">
            @foreach ($categories as $category)
                <h3 class="categoryName"><a href="{{url('productsbycategory/'.$category->id)}}">{{ $category->name }}</a></h3>
            @endforeach    
    </div>	 
	<div class="container" style="min-height:400px;">
			@if(session()->has('error'))
				<div class="alert alert-danger">
					{{ session()->get('error')}}
				</div>
			@endif
		
		
			<div class="col-md-8">
                <h1>{{ $product->title }}</h1>
				<img  class="img-responsive" src='/images/{{ $product->image }}' alt="{{ $product->image }}" width="200" class="zoom">

                <h3>Состав:</h3>
				<p>{{ $product->description }}</p>
                <h6><b>Category</b> - {{$product->category->name}} <b> </h6>
				<h6>Update</b> - {{ ($product->updated_at)->format("Y/m/d") }}</h6>
				<a href="{{url('formorder')}}" class='btn btn-success btn-sm edit btn-flat'><i class="fa fa-edit"></i>Заказать...</a>
				
			</div>
		
		<br>      
	</div>
</div>

@endsection