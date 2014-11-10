<!DOCTYPE html>
<html class='no-js' lang='en'>
<head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Sign Up</title>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="view/assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" /><link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="view/assets/images/favicon.ico" rel="icon" type="image/ico" />

</head>
<body class='login'>
<div class='wrapper'>
    <div class='row'>
        <?php

            if(isset($success))
            {
                echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
            }

            if(isset($error))
            {
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }

            if(isset($info))
            {
                echo '<div class="alert alert-info" role="alert">'.$info.'</div>';
            }


        ?>
        <div class='col-lg-12'>
            <div class='brand text-center'>
                <h1>
                    <img src="view/images/logo.png" />
                </h1>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-12'>
            <form method="post" action="signup">
                <fieldset class='text-center'>
                    <legend>Sign Up</legend>
                    <div class='form-group'>
                        <input class='form-control' name="name" placeholder='Fullname' type='text'>
                    </div>
                    <div class='form-group'>
                        <input class='form-control' name="email" placeholder='Email address' type='text'>
                    </div>
                    <div class='form-group'>
                        <input class='form-control' name="password" placeholder='Password' type='password'>
                    </div>
                    <div class='text-center'>

                        <input type="submit" class="btn btn-default" value="Sign up" >
                        <br>
                        <a href="index">Already signed up?</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- Javascripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
<!-- Google Analytics -->
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>
