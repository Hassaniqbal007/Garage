<?php 
$path = "http://".$_SERVER['HTTP_HOST']."/garage";
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage"; 
require $main_path.'/security.php';

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
    <link href="../assets/libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/toastr/dist/build/toastr.min.css" rel="stylesheet">
     <link href="../assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
     <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../assets/libs/c3/c3.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
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
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <div class="row">
                    <div class="col-12">
                        <div class="card border border-info m-5 bg-default">
                            <div class="card-body">
                                <h4 class="card-title bg-info bg-info-2 p-4 text-white" id="number">Invoice  - <?php  ?></h4>
                                
                                <form class="form-material mt-3" method="post" id="item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                        <div class="col-sm-5">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Customer</label>
                                          <select class="select2 text-info" style="width: 100%; height:36px;" id="customer_name" name="customer_name">
                                          <option value="0" >Select Customer</option>
                                           <?php
                                     include("../conn.php");
                                        $get_department=mysqli_query($conn, "SELECT * FROM `users` WHERE `status`='customer'");
                                        while($department=mysqli_fetch_array($get_department))
                                        {
                                        $department_id=$department['id'];
                                        $department_name=$department['email'];
                                       echo '<option value="'.$department_id.'">'.$department_name.'</option>';
                                        }
                                        ?>
                                          
                                        </select>
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                 <div class="col-sm-3" hidden="">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Invoice #</label>
                                        <input type="text" class="form-control" id="invoice_id" name="invoice_id"  >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"  >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Billing Address</label>
                                        <input type="text" class="form-control" id="destination" name="destination"  >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div> <div class="col-sm-1">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" value="Unpost"  >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                     
                                    <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">PO:</label>
                                        <input type="text" class="form-control" id="phone_no" name="phone_no"  >
                                           
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Invoice Date:</label>
                                        <input type="date" class="form-control" id="invoice_date" name="invoice_date" >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Due Date</label>
                                        <input type="date" class="form-control" id="due" name="due_date"  >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Terms</label>
                                        <input type="text" class="form-control" id="terms" name="terms"  >
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>
                                </div>

                                 
                            </div>
                            </div>
                                 

                              <div class="col-sm-12 mb-1">
                                <hr>
                              </div>

                              <div class="col-sm-2">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Product# </label>
                                        <input type="text" class="form-control" id="item_no" name="item_no"  >
                                      
                                        
                                    </div>
                                </div>
                            
                                <div class="col-sm-3">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Name</label>
                                        <input type="text" class="form-control" id="item_description" name="item_description"  >
                                      
                                        
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Qty </label>
                                        <input type="text" class="form-control" id="item_qty" name="item_qty"  >  
                                    </div>
                                </div>
                                 <div class="col-sm-2" hidden="">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">UOM </label>
                                        <input type="text" class="form-control" id="item_unit" name="item_unit"  >  
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Unit ($)</label>
                                        <input type="number" class="form-control" id="unit_price" name="unit_price" min="0" >  
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mb-2 focused">
                                        <label for="input1" class="text-info">Total</label>
                                        <input type="total" class="form-control" id="item_total" name="item_total" >  
                                    </div>
                                </div>
                            
                                 <div class="col-sm-1 mt-2">
                                    <button class="btn btn-info" type="button" id="updateButton" onclick="productUpdate();">Add</button>
                                </div>


                                <input type="number" class="form-control" name="id" id="data-id" hidden="">
                                
                            </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                            <div class="form-group mb-5" align="">
                              <button class="btn btn-info" type="button" id="new">New</button>
                              <button class="btn btn-info" type="button" name="Details" id="add-ajax">Save</button>
                              <button class="btn btn-info" type="button" name="Details" id="add">Save and Send</button>
                              <button class="btn btn-info" type="button" id="edit">Edit</button>
                              <button class="btn btn-info" type="button" id="delete">Delete</button>
                              <button class="btn btn-info" type="button"><a href="admin.php" class="text-white">Cancel</a></button>
                              <button class="btn btn-info" type="button" id="invoice">Invoice List</button>
                            </div>
                        </div>
                        </div>
                         <div class="alert alert-success" role="alert" id="alert" hidden="">
                                    <strong>Success - </strong> A simple success alert—check it out!
                                </div>
                                   <table class="table table-striped table-bordered table-sm " style="margin-top: -33px;" id="table2">
                                    <thead>
                                        <th>#</th>
                                        <th>Product#</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th hidden="">UOM</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                       
                                        <th colspan="2">Action</th>
                                    </thead>>
                                    <tbody id="table2_tbody">
  
                                    </tbody>

                                </table>
                                </form>
                               
                                <div class="row">
                                <div class="col-10">
                                    
                                </div>
                                <div class="col-2" style="align-content: right;">
                                    <input type="number" name="total_net_amount" class="form-control" readonly="" id="total_net_amount">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div style="padding-top: 35px;">
            <footer class="footer" style="text-align: center;">
                D&D BY <a href="">SIALKO SOFT</a>
            </footer>
            </div>
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
     <script src="../assets/extra-libs/toastr/dist/build/toastr.min.js"></script>
    <script src="../assets/extra-libs/toastr/toastr-init.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <script src="../assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/extra-libs/sweetalert2/sweet-alert.init.js"></script>
    <script src="../assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../dist/js/pages/forms/select2/select2.init.js"></script>
     <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script src="js/invoice.js"></script>
</body>

</html>


  <div id="full-width-modal-1" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="fullWidthModalLabel_1" aria-hidden="true">
                                    <div class="modal-dialog modal-full-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="fullWidthModalLabel_1">Invoice List</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                  <div id="records_content" class="col-sm-12" style="overflow-x: auto;">
    <table id="Table-Invoice" class="display nowrap table table-bordered table-striped " >
        <thead>
          <tr>
            <th>Check</th>
            <th>Invoice #</th>
            <th>Email</th>
            <th>POB</th>
            <th>Address</th>
            <th>Inv. Date</th>
            <th>Due Date</th>
             <th>Terms</th>
             <th>Amount</th>
            
           
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Check</th>
            <th>Invoice #</th>
            <th>Email</th>
            <th>POB</th>
            <th>Address</th>
            <th>Inv. Date</th>
            <th>Due Date</th>
             <th>Terms</th>
             <th>Amount</th>
            
          </tr>
        </tfoot>

        <tbody>
        
         <?php
         include("../conn.php");
            $sql="SELECT * FROM `invoice`";
            //$sql="SELECT * FROM attrubutes";
            $run_sql=mysqli_query($conn,$sql);
            while($rows =mysqli_fetch_array($run_sql)){
                      
                ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox"></td>
                            <td><?php echo $rows['invoice_no'];?></td>
                            <td><?php echo $rows['email'];?></td>
                            
                            <td><?php echo $rows['phone_no']; ?></td>
                            <td><?php echo $rows['address']?></td>
                            <td><?php echo $rows['invoice_date']; ?></td>
                            <td><?php echo $rows['due_date']; ?></td>
                            <td><?php echo $rows['terms']; ?></td>
                            <td><?php echo $rows['net_amount']; ?></td>
                            

                        </tr>
                <?php
            }
        ?>

        </tbody>
      </table>
     <br><br>
   
     <div class="col-sm-10">
    <input type="button" id="goto_first" value="First" class="btn btn-success">
    <input type="button" id="goto_prev" value="Prev" class="btn btn-secondary">
    <input type="button" id="goto_next" value="Next" class="btn btn-secondary">
    <input type="button" id="goto_last" value="Last" class="btn btn-secondary">
    <input type="button" id="goto_close" value="Close" class="btn btn-success">
 
  </div>
   
</div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->