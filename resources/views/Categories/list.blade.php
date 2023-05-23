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

<!-- Gallery Content  data-ride="carousel"-->
		<div class="col-md-10">
			<div id="carousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<img src="/images/kyiv.jpg" style="width:100%;" alt="...">
						<h1 style="text-align: center">Наша продукция:</h1>
					</div>
				@foreach ($products as $product)
					<div class="item">
						<img src="/images/{{ $product->image }}" style="width:100%;" alt="...">
						<h1 style="text-align: center">{{ $product->title }}</h1>
					</div>
				@endforeach
				
				<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>
				<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>
				</div>
			</div>
				<br>
				<ul class="list-inline text-center">
                    <li><a href="{{url('formorder')}}" class="bottom2"><i class="fa fa-edit"></i>Заказать...</a></li>
				</ul>
		</div>			
	</div>
</div>
@endsection