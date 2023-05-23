@extends('layouts.appMain')

@section('content')
    <!-- Post Content -->
    <div class="container"  style="width:95%" style= "padding-left:0pt">

        <h2 style="text-align:center">Как с нами связаться? Наш телефон: +37253760000</h2>

        <div class="col-md-2 col-sm-offset-1">
            @foreach ($categories as $category)
                <h3 class="categoryName"><a href="{{url('productsbycategory/'.$category->id)}}">{{ $category->name }}</a></h3>
            @endforeach    
        </div> 

        <div class="col-sm-10 col-sm-offset-1">                               
            <!-- <h2 style="text-align:center">Как нас найти?</h2> -->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2033.3669637352486!2d27.395862115210324!3d59.360214215589046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469465160e5e67bd%3A0xb8ed670e5bf3cb7c!2sIda-Virumaa%20Kutsehariduskeskus%20J%C3%B5hvi%20%C3%B5ppekoht!5e0!3m2!1suk!2see!4v1674151845681!5m2!1suk!2see" width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection