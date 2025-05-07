<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$path = "http://".$_SERVER['HTTP_HOST']."/garage";
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage"; 
include($main_path.'/security.php');
if(isset($_GET['status'])){
$stat=$_GET['status'];
}
else{
    $stat='';
}
if(isset($_GET['user'])){
    $user=$_GET['user'];
}
else{
    $user='';
}



include '../conn.php';
 $sql = "SELECT * FROM `users` WHERE `username` = '".$user."'";
        $rs = mysqli_query($conn,$sql);
        $getNumRows = mysqli_num_rows($rs);
        
        if($getNumRows == 1)
        {
            // session_start();
            $getUserRow = mysqli_fetch_assoc($rs);
            unset($getUserRow['password']);
            
            //$_SESSION['email'] =$email;
            $_SESSION = $getUserRow;

        }
        else
        {
            $errorMsg = "Wrong CNIC or password";
        }
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>A1 AUTO GURU</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/jvectormap/jquery-jvectormap.css" rel="stylesheet">
    <link href="../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include("../navbar.php"); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include("../sidebar.php"); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                 
                <div class="row page-titles">
                    <div class="col-md-5 col-12 align-self-center">
                        <h3 class="text-themecolor mb-0">Dashboard</h3>
                        <ol class="breadcrumb mb-0 p-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-12 align-self-center d-none d-md-block">
                        <div class="d-flex mt-2 justify-content-end">
                            <div class="d-flex mr-3 ml-2">
                                <div class="chart-text mr-2">
                                    <h6 class="mb-0"><small>THIS MONTH</small></h6>
                                    <h4 class="mt-0 text-info">$58,356</h4>
                                </div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex mr-3 ml-2">
                                <div class="chart-text mr-2">
                                    <h6 class="mb-0"><small>LAST MONTH</small></h6>
                                    <h4 class="mt-0 text-primary">$48,356</h4>
                                </div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                 
                <div class="card-group">
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-center">Booking</h4>
                            <div id="spark8">
                                <canvas width="99" height="70"
                                    style="display: inline-block; width: 99px; height: 70px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <div class="p-2 rounded border-top text-center">
                            <h4 class="font-medium mb-0"><i class="ti-angle-up text-success"></i> <?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `booking`");
                                        echo mysqli_num_rows($getpcs);?></h4>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-center">Invoices</h4>
                            <div id="spark9">
                                <canvas width="99" height="70"
                                    style="display: inline-block; width: 99px; height: 70px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <div class="p-2 rounded border-top text-center">
                            <h4 class="font-medium mb-0"><i class="ti-angle-down text-danger"></i> <?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `invoice`");
                                        echo mysqli_num_rows($getpcs);?></h4>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-center">Services</h4>
                            <div id="spark10">
                                <canvas width="99" height="70"
                                    style="display: inline-block; width: 99px; height: 70px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <div class="p-2 rounded border-top text-center">
                            <h4 class="font-medium mb-0"><i class="ti-angle-up text-success"></i> <?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `services`");
                                        echo mysqli_num_rows($getpcs);?></h4>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-center">Vehicles</h4>
                            <div id="spark11">
                                <canvas width="99" height="70"
                                    style="display: inline-block; width: 99px; height: 70px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <div class="p-2 rounded border-top text-center">
                            <h4 class="font-medium mb-0"><i class="ti-angle-down text-danger"></i> <?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `vehicle`");
                                        echo mysqli_num_rows($getpcs);?></h4>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
                <!-- Row -->
                
                <!-- Row -->
                 
                <!-- Row -->
               <div class="row">
                  
                     <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-success">
                            <!-- Row -->
                           <a href="../booking/add_booking.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `booking`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Book Your Appointment</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-basket text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>
                     
                     <!-- <div class="col-lg-3 col-md-3">
                       <a href="garage.php"> <div class="card bg-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mr-3 align-self-center">
                                        <h1 class="text-white"><i class="icon-basket"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title text-white">Garage</h3>
                                        <h6 class="card-subtitle text-white op-5">ONE CLICK TO Garage</h6>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-weight-light text-white text-nowrap text-truncate"><</h2>
                                    </div>
                                    <div class="col-8 pb-3 pt-2 text-right">
                                        <div class="spark-count" style="height:65px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div> -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-danger">
                            <!-- Row -->
                           <a href="../garage/garage.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `garage`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Garage</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-truck text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-primary">
                            <!-- Row -->
                           <a href=""> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `users`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Customers</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-account-multiple text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>


                
                      <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-primary">
                            <!-- Row -->
                           <a href="../vehicle/vehicle.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `vehicle`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Vehicles</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-truck-delivery text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>

                     
                      <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-success">
                            <!-- Row -->
                           <a href="../supplier/supplier.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `supplier`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Suppliers</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-account-multiple-plus text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>

                     

                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-danger">
                            <!-- Row -->
                           <a href="../assign_job/assign_job.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `job_card`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Jobs</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-table-large text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>

                     

                       <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-danger">
                            <!-- Row -->
                           <a href="../invoice/invoice.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `invoice`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Invoices</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-transit-transfer text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    

                      <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card card-body border border-success shadow shadow-lg bg-primary">
                            <!-- Row -->
                           <a href="../booking/booking_list.php"> <div class="row">
                                <!-- Column -->
                                <div class="col pr-0 align-self-center ">
                                    <h2 class="font-weight-light mb-0 text-white"><?php 
                                        $getpcs=mysqli_query($conn, "SELECT * FROM `job_card`");
                                        echo mysqli_num_rows($getpcs);

 ?></h2>
                                    <h3 class="text-white">Booking History</h3>
                                </div>
                                <!-- Column -->
                                <div class="col text-right align-self-center">
                                    <i class="mdi mdi-widgets text-nowrap text-white" style="font-size: 56px; width: 50px;"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>

                   
               </div>
               
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex no-block align-items-center">
                                    <h4 class="card-title">Total Revenue</h4>
                                    <div class="ml-auto">
                                        <ul class="list-inline">
                                            <li class="list-inline-item px-2">
                                                <h6 class="text-muted"><i class="fa fa-circle mr-1 text-danger"></i>2019
                                                </h6>
                                            </li>
                                            <li class="list-inline-item px-2">
                                                <h6 class="text-muted"><i
                                                        class="fa fa-circle mr-1 text-success"></i>2020</h6>
                                            </li>
                                            <li class="list-inline-item px-2">
                                                <h6 class="text-muted"><i class="fa fa-circle mr-1 text-info"></i>2021
                                                </h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="total-sales" style="height: 365px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Services Prediction</h4>
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <span class="display-6 text-primary">$20</span>
                                                <h6 class="text-muted">10% Increased</h6>
                                                <h5 class="text-nowrap">(150-165 Services)</h5>
                                            </div>
                                            <div class="ml-auto">
                                                <div id="gauge-chart" style=" width:130px; height:130px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Services Difference</h4>
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <span class="display-6 text-success">$4316</span>
                                                <h6 class="text-muted">10% Increased</h6>
                                                <h5  class="text-nowrap">(150-165 Services)</h5>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="ct-chart" style="width:120px; height: 120px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
               
               
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © Hassan Iqbal
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab"
                        aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false"><i
                            class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-3 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium mb-2 mt-2">Layout Settings</h5>
                        <div class="checkbox checkbox-info mt-3">
                            <input type="checkbox" name="theme-view" class="material-inputs" id="theme-view">
                            <label for="theme-view"> <span>Dark Theme</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" class="sidebartoggler material-inputs" name="collapssidebar" id="collapssidebar">
                            <label for="collapssidebar"> <span>Collapse Sidebar</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" name="sidebar-position" class="material-inputs" id="sidebar-position">
                            <label for="sidebar-position"> <span>Fixed Sidebar</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" name="header-position" class="material-inputs" id="header-position">
                            <label for="header-position"> <span>Fixed Header</span> </label>
                        </div>
                        <div class="checkbox checkbox-info mt-2">
                            <input type="checkbox" name="boxed-layout" class="material-inputs" id="boxed-layout">
                            <label for="boxed-layout"> <span>Boxed Layout</span> </label>
                        </div> 
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium mb-2 mt-2">Logo Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin1"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin2"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin3"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin4"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin5"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium mb-2 mt-2">Navbar Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin1"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin2"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin3"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin4"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin5"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-3 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium mb-2 mt-2">Sidebar Backgrounds</h5>
                        <ul class="theme-color m-0 p-0">
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin1"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin2"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin3"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin4"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin5"></a></li>
                            <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block"
                                    data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none mt-3">
                        <li>
                            <div class="message-center chat-scroll position-relative">
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_1' data-user-id='1'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle online"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_2' data-user-id='2'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/2.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle busy"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Sonu Nigam</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">I've sung a song! See you at</span> <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_3' data-user-id='3'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/3.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle away"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Arijit Sinh</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">I am a singer!</span> <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_4' data-user-id='4'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/4.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Nirav Joshi</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_5' data-user-id='5'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/5.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Sunil Joshi</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_6' data-user-id='6'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/6.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Akshay Kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_7' data-user-id='7'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/7.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id='chat_user_8' data-user-id='8'>
                                    <span  class="user-img position-relative d-inline-block"> <img src="../assets/images/users/8.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle offline"></span> </span>
                                    <div class="w-75 d-inline-block v-middle pl-2">
                                        <h5 class="message-title mb-0 mt-1">Varun Dhavan</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h6 class="mt-3 mb-3">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="../assets/images/users/2.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="../assets/images/users/1.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="../assets/images/users/4.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="../assets/images/users/6.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.init.dark.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../dist/js/pages/calendar/cal-init.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/echarts/echarts-all.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/libs/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Chart JS -->
    <script src="../dist/js/pages/dashboards/dashboard4.js"></script>
</body>

</html>