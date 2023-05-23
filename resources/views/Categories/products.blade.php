@extends('layouts.appMain')

@section('content')
    <!-- Post Content -->
    <div class="container"  style="width:95%" style= "padding-left:0pt">
    <!-- <div class="row">             -->
        	                   
<!-- вывод продуктов по выбранной категории -->
        <!-- <div class="col-md-10 col-md-offset-1"> -->
            
            <!-- <div class="row">  -->
                
                    @if(!isset($categoryOne))
                        <h2 style="text-align:center">Все товары @if(isset($sortName)) Variant: {{$sortName}} @endif</h2>
                    @else
                        <h1 style="text-align:center">{{$categoryOne->name}}</h1>
                    @endif 
                <div class="col-md-2 col-sm-offset-1">
                @foreach ($categories as $category)
                    <h3 class="categoryName"><a href="{{url('productsbycategory/'.$category->id)}}">{{ $category->name }}</a></h3>
                @endforeach    
                </div> 
                <div class="col-md-10 col-sm-offset-1">
                    @if(count($products ?? '') > 0) <!--      проверка количества записей в массиве,       -->
                                
                        @foreach ($products as $product)                                       
                            <div class="col-sm-2 col-sm-offset-1">                    
                                <h3 class="heigtH3">{{ $product->title }}</h3>
                                <img class="img-responsive" src='/images/{{ $product->image }}' alt="{{ $product->image }}" width="100%">
                                <p>Цена - <strong>{{ $product->price }}</strong></p>
                                <a href="{{url('../show/'.$product->id)}}" type="button" class="btn-default">Подробнее...</a>
                                <br><hr><br>
                            </div>
                        @endforeach
                            
                    @else
                        <p>Такого товара ещё нет!</p>
                    @endif
                
            <!-- </div> -->
        <!-- </div>                -->
                </div>
</div>

    <hr>
@endsection