<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Explore Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $base_url ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_url ?>public/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo $base_url ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo $base_url ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo $base_url ?>public/css/style-responsive.css" rel="stylesheet" />
        <!--toastr-->
        <link href="<?php echo $base_url ?>public/assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">

            <form class="form-signin" id="loginForm" method="post" action="<?php  echo site_url('home/login');  ?>">
                <h2 class="form-signin-heading">sign in now</h2>

                <div class="login-wrap">
                    
                    <input type="text" class="form-control" placeholder="User ID" autofocus id="user_name" name="user_name" required>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                    <!--<label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right">
                            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                        </span>
                    </label>-->
                    <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
					<div class="registration">
                       
                        <a class="" href="<?php  echo site_url('resend_password');  ?>">
                           Forget Password ?
                        </a>
                    </div>
                   <!-- <p>or you can sign in via social network</p>
                    <div class="login-social-link">
                        <a href="index.html" class="facebook">
                            <i class="fa fa-facebook"></i>
                            Facebook
                        </a>
                        <a href="index.html" class="twitter">
                            <i class="fa fa-twitter"></i>
                            Twitter
                        </a>
                    </div>
                    <div class="registration">
                        Don't have an account yet?
                        <a class="" href="registration.html">
                            Create an account
                        </a>
                    </div>-->

                </div>

                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-success" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->

            </form>

        </div>
		
		



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo $base_url ?>public/js/jquery.js"></script>
        <script src="<?php echo $base_url ?>public/js/bootstrap.min.js"></script>
        <!--toastr-->
        <script src="<?php echo $base_url ?>public/assets/toastr-master/toastr.js"></script>

        <script type="text/javascript">

            $(function() {
                var title="<?php echo $this->session->userdata('msg_title'); ?>";
             
                if(title !=""){
                    var msg_title="<?php echo $this->session->userdata('msg_title'); ?>";
                    var msg_body="<?php echo $this->session->userdata('msg_body'); ?>";
                    var msg_type='';
                    if(msg_title=='Success'){
                        msg_type='success';
                    }else if(msg_title=='Error'){
                        msg_type='error';
                    }else if(msg_title=='Warning'){
                        msg_type='warning';
                    }
                    else{
                        msg_type='info';
                    }
                    toastr[msg_type](msg_body, msg_title);
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                }
            });
		
			
        </script>
		
		
		<div class="container">

           
			<form class="form-signin" id="loginForm" id="addServiceForm"  role="form" method="post"  action="<?php echo site_url('passport_user_info/byPassport');  ?>">
                <h2 class="form-signin-heading" style="background-color:#33C7FF;">search by passport no.</h2>

                <div class="login-wrap">
                    
                    <input type="text" class="form-control" placeholder="Enter Passport Number" autofocus id="passport_number" name="passport_number" required>
                    
                  
                    <button class="btn btn-lg btn-login btn-block" type="submit" style="background-color:#33C7FF;">Submit</button>
					
                  

                </div>

               

            </form>

        </div>
		
		



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo $base_url ?>public/js/jquery.js"></script>
        <script src="<?php echo $base_url ?>public/js/bootstrap.min.js"></script>
        <!--toastr-->
        <script src="<?php echo $base_url ?>public/assets/toastr-master/toastr.js"></script>

       

    </body>
</html>
