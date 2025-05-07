<?php 
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$path = "http://".$_SERVER['HTTP_HOST']."/garage";
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage"; 
if($user==""){
    $user=$_GET['user'];
    $status=$_GET['status'];
}
require_once($main_path.'/conn.php'); 
$sql="SELECT * FROM `users` WHERE `username`='$user'";
            $run_sql=mysqli_query($conn,$sql);
            $i=0;
            while($rows =mysqli_fetch_array($run_sql)){

                $user_type=$rows['type'];
                $status=$rows['status'];
                $email=$rows['email'];
            }
 ?>

<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo $main_path; ?>/Administer/admin.php<?php $user1=$_SESSION['username']; if($user1==""){
                                    echo "?user=".$user."&status=".$status."";
                                 } ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <!-- <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                            <h2 class="text-white"><b>CMS</b></h2>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto float-left">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- Mega Menu -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Mega Menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                       
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/users/1.jpg" alt="user" width="30" class="profile-pic rounded-circle" />
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">
                                    <li>
                                        <div class="dw-user-box p-3 d-flex">
                                            <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user" class="rounded" width="80"></div>
                                            <div class="u-text ml-2">
                                                <h4 class="mb-0"><?php echo $user; ?></h4>
                                                <p class="text-muted mb-1 font-14"><?php echo $email; ?></p> <p class="text-muted mb-1 font-14"><?php echo $status; ?></p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li class="user-list"><a class="px-3 py-2" href="<?php echo $main_path; ?>/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        
                    </ul>
                </div>
            </nav>
        </header>