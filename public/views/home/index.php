<?php include_once __DIR__ . '/../../../functions/RootURL.php'; ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="index.php">

    <link rel="stylesheet" href="<?=root()?>/public/css/normalize.min.css">
    <link rel="stylesheet" href="<?=root()?>/public/css/main.css">
<!-- FontAwesome -->
    <link rel="stylesheet" href="<?=root()?>/public/css/font-awesome.min.css">

<!--    Materialize  CSS-->
    <link rel="stylesheet" href="<?=root()?>/public/css/materialize.min.css">

    <link rel="stylesheet" href="<?=root()?>/public/css/style.css">

    <script src="<?=root()?>/public/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="grey lighten-3">
    <div class="container">
        <nav class="top-nav">
            <ul id="" class="">
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <ul id="" class="right">
                <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
    </div>
    <nav class="purple darken-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">Javascript</a></li>
                    <li><a href="mobile.html">Mobile</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html">ad</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">Javascript</a></li>
                    <li><a href="mobile.html">Mobile</a></li>
                </ul>
            </div>
        </div>
    </nav>



</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="public/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?=root()?>/public/js/plugins.js"></script>

<!--    Materialize  JS-->
<script src="<?=root()?>/public/js/materialize.min.js"></script>

<script src="<?=root()?>/public/js/main.js"></script>

<script src="<?=root()?>/public/js/custom.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
