@extends('layouts.app')

@section('content')
<!-- content orderlist-->
<div class="box-header with-border">
    <h3 class="box-title"><strong>Список заказов </strong></h3>
</div>
    <div class="box-body">
        <div class="container">
        @if(isset($ordersL))
            <table id="example1" class="table table-bordered">
                <thead style="color: green">
                    <th>Номер заказа</th>
                    <th>Дата заказа</th>
                    <th>СУММА - ВСЕГО</th>
                </thead>
            <tbody>
                @foreach ($ordersL as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->total_price}}</td>                                         
                    </tr>
                @endforeach
            </tbody>
            </table>
        @else
        <div class="formButton"><h3>Вы ещё ничего не заказывали!!!</h3></div>

        @endif
        </div>
    </div>

@endsection