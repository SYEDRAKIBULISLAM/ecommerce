<?php include_once 'functions/RootURL.php'; ?>
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

    <link rel="stylesheet" href="<?=root()?>/public/css/admin/style.css">

    <script src="<?=root()?>/public/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="row" style="margin-top: 10%">
    <div class="col s12 m6 offset-m3 l4 offset-l4">
        <div class="card <?php echo isset($data['error']) ? ' red  lighten-5' : ' white';?>">
            <div class="card-content">
                <form action="" method="post">
                    <span class="card-title">Welcome E-commerce Admin</span>

                    <?php if(isset($data['error'])): ?>
                    <div>
                        <h5 class="center-align red-text text-darken-2"><?=$data['error'];?></h5>
                    </div>
                    <br>
                    <?php endif; ?>

                    <div class="input-field">
                        <i class="fa fa-user-circle prefix" aria-hidden="true"></i>
                        <input id="username" type="text" name="username" value="<?php echo isset($data['username']) ? $data['username'] : '';?>" class="validate" required>
                        <label for="username">User Name</label>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-key prefix" aria-hidden="true"></i>
                        <input id="password" type="password" name="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <button type="submit" name="login" class="waves-effect waves-light btn right"><i class="fa fa-sign-in right" aria-hidden="true"></i>Login</button>
                    </div>
                </form>
                <br>
                <br>
            </div>
            <div class="card-action">
                <a href="#">Seign Up</a>
                <a href="#" class="right">Forget Password</a>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=root()?>public/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?=root()?>/public/js/plugins.js"></script>

<!--    Materialize  JS-->
<script src="<?=root()?>/public/js/materialize.min.js"></script>

<script src="<?=root()?>/public/js/main.js"></script>

<script src="<?=root()?>/public/js/admin/custom.js"></script>

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