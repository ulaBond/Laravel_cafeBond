<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="bond">

    <title>CafeBond</title>
    <!-- Bootstrap Core CSS 
    <link rel="stylesheet" href='{{ asset("components/bootstrap/dist/css/bootstrap.css") }}'>-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



    <!-- Custom CSS -->
    <link rel="stylesheet" href='{{ asset("css/small-business.css") }}'>
    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Stalinist+One&display=swap" rel="stylesheet">
    <!-- for visualisation -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::guest())
                    <a class="navbar-brand" href="{{ url('/login') }}">Login</a>
				    <a class="navbar-brand" href="{{ url('/register') }}">Register</a>
                @else
                  <a class="navbar-brand" href="{{ url('/dashboard') }}">Admin panel</a>
                  <a class="navbar-brand" href="#">{{ Auth::user()->name }} - {{ Auth::user()->email }}</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                  </ul>
                @endif
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/..">Home</a></li>
                    <li><a href="{{url('aboutUs')}}">About Us</a></li>
                    <li><a href="{{url('listMany/')}}">Products</a></li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/images/caralog8.jpg'); ">
        <div class="container overlay">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Cafe Bond</h1>
                        <hr class="small">
                        <span class="subheading">A Small Family Cafe and Baker<br>
                        <br><br>
                        <a href="{{url('formorder')}}" class="form">Сделать заказ</a>
                    </div>                    
                </div>
            </div>
        </div>
    </header>
        @yield('content') <!-- код Для изменяющегося контента -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://twitter.com/klopotenko_chef">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/ievgen.klopotenko">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Yuliia.Bondarenko@ivkhk.ee">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>

                    </ul>
                    <p class="copyright text-muted">&copy; 2023 We <i class="fa fa-heart"></i> <a href="https://ilm.alutagusevald.ee/">Bond Design</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- JavaScript-код у кінці сторінки, після підключення бібліотеки jQuery та бутстрапу -->
    <!-- для вывода на экран мод. окна уведомления по условию: если нажата клавиша submit, а поля amount,email или phone - пустые -->
@if (empty($form_data))
  <script>
    $(document).ready(function(){
        $('#submit-btn').click(function(){
            if (!$.trim($('#amount').val())||!$.trim($('#email').val())||!$.trim($('#phone').val())) {
                $('#restartModal').modal('show');
                return false;
            }
        });
    });
  </script>
@endif

</body>
</html>