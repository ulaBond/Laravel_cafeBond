@extends('layouts.appMain')

@section('content')

@if($id_order>0)
    <div class="container-fluid p-5 bg-primary text-white text-center">
        
            @foreach ($orderClient as $orderMain)        
                <h1>Номер вашего заказа: {{$orderMain->id}}</h1><br>
                <h2>Дата заказа: {{$orderMain->order_date}}</h2><br>
                <h1>Стоимость ВСЕГО: {{$orderMain->total_price}}</h1><br>
            
            @endforeach     
        
    </div>

    <div class="container mt-5">
    
        <div class="row">
                <div class="col-sm-4">
                    <h3>Наименование товара</h3>
                </div>
                <div class="col-sm-2">
                    <h3>Количество</h3>
                </div>
                <div class="col-sm-2">
                    <h3>Цена</h3>
                </div>
                <div class="col-sm-2">
                    <h3>Стоимость</h3>
                </div>
        </div>
        <div class="row">       
            @foreach ($productOrder as $order)
                <div class="col-sm-4" style="height: 45px">            
                    <p>{{$order->product_name}}</p><!-- <h3>Наименование товара</h3> -->
                </div>
                <div class="col-sm-2" style="height: 45px">            
                    <p>{{$order->price}}</p><!-- <h3>Цена</h3>         -->
                </div>
                <div class="col-sm-2" style="height: 45px">            
                    <p>{{$order->amount}}</p><!-- <h3>Количество</h3>         -->
                </div>
                <div class="col-sm-2" style="height: 45px">            
                    <p>{{$order->summ_prod}}</p><!-- <h3>Стоимость</h3>         -->
                </div>
            @endforeach
        </div>
    </div>
@else{<div class="formButton"><h3>Вы отправили ПУСТУЮ форму заказа!!!</h3></div>}
@endif       
    
@endsection