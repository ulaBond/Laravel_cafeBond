@extends('layouts.appMain')

@section('content')
 <!-- ----------------------------------------------- -->
 <form class="form-horizontal" action=""  method="POST">
 	@csrf
	<div class="container-fluid p-5 bg-primary text-white text-center">				
		<div class="titleForm"><span><h2>Оформление заказа </h2></span></div>				
		<label><span class="fio"> Имя:</span><input type="search" class="guest" name="name"/></label><br>	
		<label><span class="email"> E-mail:</span><input type="email"class="guest" name="email" id="email"/></label><br>	
		<label><span class="phone"> Телефон:</span><input type="search"class="guest" name="phone" id="phone"/></label><br>	
		<label><span class="fio"> Адрес доставки:</span><input type="search"class="guest" name="adress"/></label><br>		
		<p>* - обязательные поля</p>
	</div>
	<div class="container-fluid mt-5">
		@foreach ($products as $product)
		<div class="form-group row">
			<div class="col-sm-1">
				<input type="text" name="productId[{{ $product->id }}]" value="{{ $product->id }}" hidden>
			</div>
			<div class="col-sm-8">
				<input type="checkbox"  name="product[{{ $product->id }}]" id="{{ $product->id }}">
				<label class="form-check-label" for="{{ $product->id }}">{{ $product->title }} по цене {{ $product->price }} за {{ $product->units }}</label>
			</div>
			<div class="col-sm-2">
				<label class="col-form-label"><input type="number" id="amount" class="form-control"  name="amount[{{ $product->id }}]" min="1" max="20"/></label>
			</div>
		</div>
		@endforeach	
		<div class="form-group row">
			<div class="col-sm-12 text-center">
				<input type="submit" class="btn btn-primary" value="Отправить" id="submit-btn"/>
				<input type="reset" class="btn btn-secondary" value="Очистить"/>
			</div>
		</div>
	</div>
</form>
<!-- код модального окна -->
<div class="modal" id="restartModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <h4 class="modal-title">Некоторые обязательные поля формы не заполнены!!!</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Тело модального окна -->
      <div class="modal-body">
        <p>{{ $modal_message }}</p>
      </div>
      <!-- Футер модального oкна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Понятно</button>
      </div>
    </div>
  </div>
</div>

@endsection