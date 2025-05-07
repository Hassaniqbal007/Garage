<?php
 
$main_path = "http://".$_SERVER['HTTP_HOST']."/garage";
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
$user=$_SESSION['username'];
$email=$_SESSION['email'];
if($user==""){
    $user=$_GET['user'];
    $status=$_GET['status'];
}
else{
    $user=$_SESSION['username'];
    $status=$_SESSION['status'];
}
// include($main_path.'/conn.php'); 
$sql="SELECT * FROM `users` WHERE `username`='$user'";
            $run_sql=mysqli_query($conn,$sql);
            $i=0;
            while($rows =mysqli_fetch_array($run_sql)){

                $user_type=$rows['type'];
                $status=$rows['status'];
                $email=$rows['email'];
            }



  ?>

 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile position-relative" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" class="w-100" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text pt-1"> 
                        <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $email; ?></a>
                        <div class="dropdown-menu animated flipInY"> 
                            <a href="#" class="dropdown-item"><i class="ti-user"></i>
                                My Profile</a> 
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My
                                Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> 
                            <a href="authentication-login1.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Personal </span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/Administer/admin1.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/Administer/admin1.php";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Dashboard</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-car-wash"></i><span class="hide-menu">Services </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                

                     <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/Service/services.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/Service/services.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Services</span>
                                    </a>
                                </li>
                                  <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/Service/service_list.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/Service/service_list.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Services List</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-chart-areaspline"></i><span class="hide-menu">GARAGE </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                

                                        <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/garage/garage.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/garage/garage.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Garage</span>
                                    </a>
                                </li>


                                           

                                             <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/garage/garage_list.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/garage/garage_list.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Garage Details</span>
                                    </a>
                                </li>

                               
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-car"></i><span class="hide-menu">Vehicle </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                
                                
                                             <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/vehicle/vehicle.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/vehicle/vehicle.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Vehicle</span>
                                    </a>
                                </li>
                                 <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/vehicle/vehicle_list.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/vehicle/vehicle_list.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Vehicle Detials</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-checkbox-multiple-marked"></i><span class="hide-menu">Add Booking </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                 <li class="sidebar-item"><a href="<?php echo $main_path; ?> /booking/add_booking.php<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo "?user=".$user."&status=".$status."";
                                 } ?>"
                                        class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span
                                            class="hide-menu">Booking History</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo $main_path; ?> /booking/booking_list.php<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo "?user=".$user."&status=".$status."";
                                 } ?>"
                                        class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span
                                            class="hide-menu">Booking Details </span></a></li>
                               
                            </ul>
                        </li>
                      
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-account-switch"></i><span class="hide-menu">Supplier </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                

                                             <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/supplier/supplier.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/supplier/supplier.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Supplier</span>
                                    </a>
                                </li>
                                 <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/supplier/supplier_list.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/supplier/supplier_list.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Supplier Details</span>
                                    </a>
                                </li>
                                           
                               
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-table-large"></i><span class="hide-menu">Job Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               
                                             <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/assign_job/assign_job.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/assign_job/assign_job.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Assign Job</span>
                                    </a>
                                </li>
                                 <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/assign_job/job_list.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/assign_job/job_list.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Job History</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-note-multiple-outline"></i><span class="hide-menu">Invoices </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                 <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/invoice/invoice.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/invoice/invoice.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Invoice</span>
                                    </a>
                                </li> 

                                            <li class="sidebar-item"><a href="#"
                                        class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span
                                            class="hide-menu">Invoice History</span></a></li>
                               
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-account-multiple"></i><span class="hide-menu">Customers </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                 <li class="sidebar-item">
                                    <a href="<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo $main_path."/customers/customers.php?user=".$user."&status=".$status."";
                                 }else{
                                    echo $main_path."/customers/customers.php?user=".$user."&status=".$status."";
                                 } ?>" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                      
                        
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Extra</span></li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Documentation/document.html" aria-expanded="false"><i
                                    class="mdi mdi-content-paste"></i><span class="hide-menu">Documentation</span></a>
                        </li>
 -->                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="authentication-login1.html" aria-expanded="false"><i
                                    class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                
                <!-- item-->
                <a href="<?php echo $main_path; ?>/logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>