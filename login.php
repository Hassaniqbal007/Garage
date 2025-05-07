<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['login']))
{
  
  require_once('conn.php'); 
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username       = trim($_POST['username']);
        $password   = trim($_POST['password']);
        // $role    = trim($_POST['role']);
         $md5Password = md5($password);

        $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' and `password` = '".$md5Password."'";
        $rs = mysqli_query($conn,$sql);
        $getNumRows = mysqli_num_rows($rs);
        
        if($getNumRows == 1)
        { 
            

            $getUserRow = mysqli_fetch_assoc($rs);
            //unset($getUserRow['password']);
            
            //$_SESSION['email'] =$email;
            //$_SESSION = $getUserRow;
            require_once 'fumction.php';
           // session($getUserRow);
                        
              //header('location:admin.php');
?>
          
            <script>
                
                 window.location.replace("Administer/admin1.php?user=<?php echo $getUserRow['username']; ?>&status=<?php echo $getUserRow['type']; ?>");

                
                 

             </script>
     <?php       

            exit;
        }
        else
        {
            $errorMsg = "Wrong CNIC or password";
        }
    }
}

if(isset($_GET['logout']) && $_GET['logout'] == true)
{
    session_destroy();
    header("location:index.php");
    exit;
}


if(isset($_GET['lmsg']) && $_GET['lmsg'] == true)
{
    $errorMsg = "Login required to access dashboard";
}



?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>THE GARAGE</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/garge.jpg) no-repeat center center; background-size: cover;">
            <div class="auth-box  p-4 bg-white m-0">
                <div id="loginform">
                    <div class="logo text-center">
                        <span class="db"><img src="assets/images/logo1.png" alt="logo" height="80" width="250" /><br/>
                            </span>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material " id="loginform" method="post">
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" placeholder="Username" name="username"> </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" required="" placeholder="Password" name="password"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <div class="checkbox checkbox-info float-left pt-0">
                                            <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div> 
                                        <div class="ml-auto">
                                            <a href="javascript:void(0)" id="to-recover" class="text-muted float-right"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-block text-uppercase waves-effect waves-light text-white" type="submit" style="background:#535057;" name="login">Log In</button>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <div class="social mb-3">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group mb-0">
                                    <div class="col-sm-12 justify-content-center d-flex">
                                        <p>Don't have an account? <a href="register.php" class="text-dark font-weight-normal ml-1">Sign Up</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <h3 class="font-weight-medium mb-3">Recover Password</h3>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row mt-3">
                        <!-- Form -->
                        <form class="col-12 form-material" action="index.html">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" required="" placeholder="Username">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-primary text-uppercase" type="submit" name="action">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>

</html>