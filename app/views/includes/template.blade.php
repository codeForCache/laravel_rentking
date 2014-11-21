<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RentKing</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Fira+Sans|Montserrat' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
        {{HTML::style('css/normalize.min.css')}}
        {{HTML::style('css/main.css')}}
        {{HTML::style('css/app.css')}}        
       

       <!--  <link rel="icon" type="image/png" href="favicon.ico" /> -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
            
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- body -->
        <div id="top_nav">
            <div id="logo"><img src="{{URL::to('img/mobile/rk_logo.svg')}}" alt="rentking.co.nz"></div>
            <div id="help"><a href="">Help</a></div>
            <div id="account">

                
               
                @if(Auth::check())
                <div id="user">->{{HTML::link('users/'.Auth::user()->id.'/edit', Auth::user()->user_name)}}</div>
                @else
                <div id="user">{{HTML::link('login','No Login!')}}</div>
                @endif
                <div id="control" class="pointer">
                    <div id="user_icon"><i class="fa fa-user fa-fw fa-lg"></i></div>
                    <div id="selector"><i class="fa fa-sort-desc fa-fw fa-lg"></i></div>                    
                </div>
                <ul id="control_panel">                                        
                    <!-- <li><a href=""><i class="fa fa-suitcase fa-fw fa-lg"></i> <span>Account Control Panel</span></a></li> -->
                    @if(Auth::check())
                    <li><a href="{{URL::to('users/'.Auth::user()->id.'/edit')}}"><i class="fa fa-user fa-fw fa-lg"></i> <span>Manage Account</span></a></li>
                    @else
                    <li><a href="{{URL::to('login')}}"><i class="fa fa-user fa-fw fa-lg"></i> <span>Manage Account</span></a></li>    
                    @endif
                    <li><a href=""><i class="fa fa-cc-visa fa-fw fa-lg"></i> <span>RentKing Billing</span></a></li>
                    @if(Auth::check())
                    <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out fa-fw fa-lg"></i> <span>Log Out</span></a></li>
                    @else
                    <li><a href="{{URL::to('login')}}"><i class="fa fa-sign-out fa-fw fa-lg"></i> <span>Log In</span></a></li>
                    @endif                   
                    <li><a href=""><i class="fa fa-times fa-fw fa-lg"></i> <span>Close This</span></a></li>
                </ul>
            </div>            
        </div>
        <div class="navigation">
            <ul>
                <li><a href="#" id="managers">Managers</a>
                    <ul>
                        <li><a href="{{URL::to('/')}}"><i class="fa fa-home fa-fw fa-lg"></i> <span>Units & Tenants</span></a></li>
                        <li><a href=""><i class="fa fa-cogs fa-fw fa-lg"></i> <span>Work Orders</span></a></li>
                         <li><a href=""><i class="fa fa-comments-o fa-fw fa-lg"></i> <span>Messages</span></a></li>
                        <li><a href=""><i class="fa fa-plus-square fa-fw fa-lg"></i> <span>Add A Unit</span></a></li>
                    </ul>
                </li>
                <li><a href="#">Tenants</a>
                    <ul>
                        <li><a href=""><i class="fa fa-wrench fa-fw fa-lg"></i> <span>Maintenance</span></a></li>
                        <li><a href=""><i class="fa fa-cc-visa fa-fw fa-lg"></i> <span>Billing</span></a></li>
                        <li><a href=""><i class="fa fa-comments-o fa-fw fa-lg"></i> <span>Messages</span></a></li>                         
                    </ul>
                </li>
                <li><a href="#">About</a></li>
                <li><a href="#">Pricing & Signup</a>
                    <ul>
                        <li><a href=""><i class="fa fa-calculator fa-fw fa-lg"></i> <span>RentKing Service Pricing</span></a></li>
                        <li><a href="{{URL::to('users/create')}}"><i class="fa fa-pencil fa-fw fa-lg"></i> <span>Account Registration</span></a></li>                        
                    </ul>
                </li>
                <li><a href="{{URL::to('login')}}">Log in</a></li>
            </ul>            
        </div>
        <!-- main -->

        @yield('content')

        <!-- /main -->

        <!-- footer -->
        <div class="footer">
            <div class="footer_left">
                <ul>                    
                    <li>RentKing, Ltd. All Rights Reserved.</li> 
                    <li><a href="#">© rentking.co.nz 2014</a></li>                   
                </ul>                        
            </div>
            <hr>
            <div class="footer_right">
                <ul>
                    <li><a href="#"><i class="fa fa-comments fa-fw fa-lg"></i>Forums</a></li>
                    <li><a href="#"><i class="fa fa-thumbs-o-up fa-fw fa-lg"></i>Support</a></li>                            
                    <li><a href="#"><i class="fa fa-key fa-fw fa-lg"></i>Privacy</a></li>
                    <li><a href="#"><i class="fa fa-gavel fa-fw fa-lg"></i>Terms & Conditions</a></li>
                </ul>                        
            </div>
        </div>
        <!-- /footer -->



        <!-- /body -->

        







        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        {{HTML::script('js/vendor/modernizr-2.6.2.min.js')}}
        {{HTML::script('js/plugins.js')}}
        {{HTML::script('js/main.js')}}
       

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
