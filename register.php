<!DOCTYPE html>
<html dir="ltr">
<?php 
if(isset($_POST['submit'])){

require_once('conn.php'); 
  $f_name=$_POST['name'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $password=md5($password);
  $contact=$_POST['contact'];
  $type=$_POST['type'];
  $address=$_POST['address'];
  $sql=mysqli_query($conn,"INSERT INTO `users` (`id`, `username`, `password`, `email`, `contact`, `address`, `type`, `status`) VALUES (NULL, '$username', '$password', '$f_name', '$contact', '$address', '$type', 'customer')");
  if($sql){
        $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' and `password` = '".$password."'";
        $rs = mysqli_query($conn,$sql);
        $getNumRows = mysqli_num_rows($rs);
        
        if($getNumRows == 1)
        { 
            

            $getUserRow = mysqli_fetch_assoc($rs);
            //unset($getUserRow['password']);
            
            //$_SESSION['email'] =$email;
            //$_SESSION = $getUserRow;
            require_once 'fumction.php';
            
                        
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

    ?>      
            <script>
                
                 // window.location.replace("admin1.php?user=<?php echo $username; ?>&status=<?php echo $type; ?>");

             </script>
             <?php
        
  }



}

 ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo1.png">
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
            <div class="auth-box p-4 bg-white m-0 rounded">
                <div>
                    <div class="logo text-center">
                        <span class="db"><img src="assets/images/logo1.png" height="70" width="180" alt="logo" /></span>
                    </div>
                    <h3 class="box-title mt-5 mb-0">Register Now</h3><small>Create your account and enjoy</small> 
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" method="post">
                                <div class="form-group mt-3">
                                      <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" placeholder="Name" name="name">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3 ">
                                      <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" placeholder="Username" name="username">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3 ">
                                      <div class="col-xs-12">
                                        <input class="form-control" type="password" required="" placeholder="Password" name="password">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3">
                                      <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" placeholder="Address" name="address">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3">
                                      <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" placeholder="Contact" name="contact">
                                      </div>
                                    </div>
                                    <div class="form-group mb-3">
                                      <div class="col-xs-12">
                                       <select class="form-control" name="type">
                                         <option>Select Registration Type</option>
                                         <option>Individual</option>
                                         <option>Company</option>
                                       </select>
                                      </div>
                                    </div>

                                    <div class="form-group mb-3">
                                      <div class="">
                                        <div class="checkbox checkbox-primary pt-0">
                                          <input id="checkbox-signup" type="checkbox" class="chk-col-indigo material-inputs">
                                          <label for="checkbox-signup"> I agree to all <a href="#" class="text-dark">Terms</a></label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group text-center mt-3">
                                      <div class="col-xs-12">
                                        <button class="btn btn-dark btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Sign Up</button>
                                      </div>
                                    </div>
                                    <div class="form-group mb-0">
                                      <div class="col-sm-12 text-center">
                                        <p>Already have an account? <a href="login2.html" class="text-dark ml-1">Sign In</a></p>
                                      </div>
                                    </div>
                            </form>
                        </div>
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
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>