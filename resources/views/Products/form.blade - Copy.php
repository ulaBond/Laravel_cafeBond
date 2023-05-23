@extends('layouts.appMain')

@section('content')
<div>
	<div class="col-md-2 col-md-offset-1">
           
	</div>		

	<div class="content1">
			<div class="titleForm"><span><h2>Оформление заказа </h2></span></div>
		<div class="form">
			<form  action=""  method="POST"><br>
			@csrf
			<label><span class="fio"> Имя:</span><input type="search" class="guest" name="name"/></label>
		
			<label><span class="email"> E-mail:</span><input type="email"class="guest" name="email"/></label>
	
			<label><span class="phone"> Телефон:</span><input type="search"class="guest" name="phone"/></label>

			<label><span class="fio"> Адрес доставки:</span><input type="search"class="guest" name="adress"/></label>
			<br><br>
			<span class="goods"> Наименование товара:</span><hr>
				<!-- <select name="goods"class="guest"> <span class="fio">Количество:</span>-->
					@foreach ($products as $product)
					<input type="text" name="productId[{{ $product->id }}]" value="{{ $product->id }}" hidden>
					<!-- <input type="text" name="productTitle[{{ $product->id  }}]" value="{{$product->title }}" hidden> -->
					<!-- <input type="text" name="productPrice[{{ $product->id }}]" value="{{ $product->price }}" hidden> -->
					<input type="checkbox"  name="product[{{ $product->id }}]" id="{{ $product->id }}">
					
					<label for="amount{{ $product->id }}">{{ $product->title }} по цене {{ $product->price }} за {{ $product->units }}</label>
					<label><input type="number" id="amount" class="amount"  name="amount[{{ $product->id }}]" min="1" max="20"/></label><br>
					@endforeach
				<!-- </select> -->
				<!-- <p></p><label><span class="date"> Дата доставки:</span><br /><input type="date"class="guest"/></label><p></p> -->
			<!--или <label><span class="date"> Дата доставки:</span>
			<input type="date"/></label>-->					
			<div class="formButton">
				<input type="submit" class="bottom1" value="Отправить"/>
				<input type="reset" class="bottom2" value="Очистить"/>
			</div>
			
			</form>
		</div>   
	</div>
</div>

@endsection