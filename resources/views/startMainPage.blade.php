@extends('layouts.appMain')

@section('content')

<!-- Main Content -->
<div class="container-fluid container-90">
        <div class="row">

            <div class="col-md-4">
                <div class="post-preview">
                    <a href="productsbycategory/1">                     
                        <img class="img-responsive" src="/images/bread.jpg">
                        <h2 class="post-title">
                            Хлеб
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="post-preview">
                    <a href="productsbycategory/2">
                        <img class="img-responsive" src="/images/bulochki.jpg">
                        <h2 class="post-title">
                            Булочки
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="post-preview">
                <a href="productsbycategory/3">
                        <img class="img-responsive" src="/images/pirogi.jpg">
                        <h2 class="post-title">
                            Пироги
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="post-preview">
                    <a href="productsbycategory/5">
                        <img class="img-responsive" src="/images/tort.jpg">
                        <h2 class="post-title">
                            Торты
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="post-preview">
                    <a href="productsbycategory/7">
                        <img class="img-responsive" src="/images/napitki.jpg">
                        <h2 class="post-title">
                            Напитки
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="post-preview">
                    <a href="productsbycategory/8">
                        <img class="img-responsive" src="/images/pavlova.jpg">
                        <h2 class="post-title">
                            Десерты
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                </div>
            </div>
		</div>
    </div>
    @endsection