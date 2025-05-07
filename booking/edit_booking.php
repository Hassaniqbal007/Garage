<?php

if(isset($_GET['id'])){
$id=$_GET['id'];
include '../conn.php';
            $sql="SELECT * FROM `booking` WHERE `id`='$id'";
            $run_sql=mysqli_query($conn,$sql);
            $i=0;
            while($rows =mysqli_fetch_array($run_sql)){
                $id=$rows['id'];
                $i++;
                
                            $u_name=$rows['service'];
                            $manager=$rows['manager'];
                            $date=$rows['date']; 
                            $time=$rows['time']; 
                            $g_name=$rows['garage_name']; 
                            $vehicles=$rows['no_of_vehicles']; 
                            $company=$rows['in_charge']; 
                           
                                                                        
            }
} 


 ?>

 <?php 
 $path = "http://".$_SERVER['HTTP_HOST']."/garage_2/garage";
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage_2/garage"; 
require $main_path.'/security.php';
require $main_path.'/fumction.php';


if(isset($_POST['add_data'])){
$ser_name=$_POST['service_name'];
$next_date=$_POST['area'];
$date=$_POST['description'];
$time=$_POST['city'];
$type=$_SESSION['type'];
if($type==""){
    $type=$_GET['status'];
}

$manager_name=$_POST['manager_name'];
$company_name=$_POST['company_name'];
$garage_name=$_POST['garage'];
$number_of_vehicle=$_POST['number_of_vehicle'];
update_company($ser_name,$date,$next_date,$time,$manager_name,$company_name,$garage_name,$number_of_vehicle,$id);




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
    <title>CRM</title>
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
        <?php include($main_path."/navbar.php"); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include($main_path."/sidebar.php"); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
             <div class="row">
                    <div class="col-4">
                        <div class="card border border-info m-5 bg-default">
                            
                            
                            <form class="form-horizontal" method="post">
                                <div class="card-body">
                                    <h2 class="card-title text-center text-white p-2"><strong>BOOKING</strong></h2>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="fname2" class="col-sm-12 text-left control-label col-form-label">Service Name</label>
                                                <div class="col-sm-12">
                                                    <select name="service_name" class="form-control">
                                                    	<option value="0">Select Service</option>
                                                    	   <?php
                                     include("../conn.php");
                                        $get_department=mysqli_query($conn, "SELECT * FROM `services`");
                                        while($department=mysqli_fetch_array($get_department))
                                        {
                                        $department_id=$department['id'];
                                        $department_name=$department['service_name'];
                                        if($u_name==$department_id){
                                        	echo '<option value="'.$department_id.'" selected>'.$department_name.'</option>';

                                        }

                                        else{
                                echo '<option value="'.$department_id.'">'.$department_name.'</option>';
                                        }
                                       
                                        }
                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="lname2" class="col-sm-12 text-left control-label col-form-label">Date</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="description" placeholder="Select Date" name="description" value="<?php echo $date; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12" style="display: none;">
                                            <div class="form-group row">
                                                <label for="uname1" class="col-sm-12 text-left control-label col-form-label">NEXT DATE</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="area" name="area" placeholder="Next Date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="uname1" class="col-sm-12 text-left control-label col-form-label">TIME</label>
                                                <div class="col-sm-12">
                                                    <input type="time" class="form-control" id="city" name="city" placeholder="Time" value="<?php echo $time; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                          <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="uname1" class="col-sm-12 text-left control-label col-form-label">Company Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="city" name="company_name" placeholder="Company Name" value="<?php echo $company; ?>">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="uname1" class="col-sm-12 text-left control-label col-form-label">Manager Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="city" name="manager_name" placeholder="Manager Name" value="<?php echo $manager; ?>">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="uname1" class="col-sm-12 text-left control-label col-form-label">Garage</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="city" name="garage" placeholder="Garage" value="<?php echo $g_name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-lg-12">
                                            <div class="form-group row">
                                                <label for="uname1" class="col-sm-12 text-left control-label col-form-label">No. of Vehicles</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="city" name="number_of_vehicle" placeholder="Number of Vehicles" value="<?php echo $vehicles; ?>">
                                                </div>
                                            </div>
                                        </div>

                                          
                                        

                                    </div>
                                </div>
                                <hr>

                                <div class="card-body">
                                    <div class="form-group mt-0 text-center">
                                        <button type="submit" class="btn btn-info waves-effect waves-light" name="add_data">Edit</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-8">
                    	<br><br>
                    	<div class="row p-1">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                                <!-- BEGIN MODAL -->
                                <div class="modal fade none-border" id="my-event">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white waves-effect"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button"
                                                    class="btn btn-success save-event waves-effect waves-light">Create
                                                    event</button>
                                                <button type="button"
                                                    class="btn btn-danger delete-event waves-effect waves-light"
                                                    data-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Add Category -->
                                <div class="modal fade none-border" id="add-new-event">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Category Name</label>
                                                            <input class="form-control form-white"
                                                                placeholder="Enter name" type="text"
                                                                name="category-name" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label">Choose Category Color</label>
                                                            <select class="form-control form-white"
                                                                data-placeholder="Choose a color..."
                                                                name="category-color">
                                                                <option value="success">Success</option>
                                                                <option value="danger">Danger</option>
                                                                <option value="info">Info</option>
                                                                <option value="primary">Primary</option>
                                                                <option value="warning">Warning</option>
                                                                <option value="inverse">Inverse</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                    class="btn btn-danger waves-effect waves-light save-category"
                                                    data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-white waves-effect"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>




            <footer class="footer">
                
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