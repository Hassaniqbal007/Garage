<?php 
include 'security.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	include 'connection.php';
	$sales_count=0;
          
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>SHIPMESOLTIONS LLC</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="assets/libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/extra-libs/toastr/dist/build/toastr.min.css" rel="stylesheet">
     <link href="assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
     <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="assets/libs/c3/c3.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <style type="text/css">
         .highlight { 
      background-color:  #5bc0de; 
      color: blue; }
      .light_1 { 
      background-color: #cfc7f2; 
      color: blue; 
  }
    </style>
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
        <?php include 'navbar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
           <?php include "sidebar2.php" ?>
            <!-- End Bottom points-->
        </aside>
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
           <div class="row">
                    

                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title bg-info bg-info-2 p-4 text-white">Invoice Product Details</h4>
                               
                               
                                 <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered display nowrap table-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">#</th>
                                                <th class="text-nowrap">Product #</th>
                                                <th class="text-nowrap">Description</th>
                                                <th class="text-nowrap">Unit</th>
                                                <th class="text-nowrap">Price</th>
                                                <th class="text-nowrap">Quantity</th>
                                                <th class="text-nowrap">Amount</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                      <?php 
            include 'connection.php';
            $sql="SELECT * FROM `invoice_list` WHERE `invoice_no`='$id'";
            $run_sql=mysqli_query($conn,$sql);
            $i=0;
            while($rows =mysqli_fetch_array($run_sql)){
                $id=$rows['id'];
     
                $i++;
                echo '
                        <tr>
                            <td class="text-nowrap">'.$i.'</td>
                            <td class="text-nowrap">'.$rows['product_no'].'</td>
                            <td class="text-nowrap">'.$rows['description'].'</td> 
                            <td class="text-nowrap">'.$rows['unit'].'</td> 
                            <td class="text-nowrap">'.$rows['unit_price'].'</td> 
                            <td class="text-nowrap">'.$rows['qty'].'</td> 
                            <td class="text-nowrap">'.$rows['total'].'</td> 
                                                      
                                                      
                        </tr>
                ';
            
        }
        ?>
                                    
                              
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                                 <th class="text-nowrap">#</th>
                                                <th class="text-nowrap">Product #</th>
                                                <th class="text-nowrap">Description</th>
                                                <th class="text-nowrap">Unit</th>
                                                <th class="text-nowrap">Price</th>
                                                <th class="text-nowrap">Quantity</th>
                                                <th class="text-nowrap">Amount</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                          
                            
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
             <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
            
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
    
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.overlay.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/libs/d3/dist/d3.min.js"></script>
    <script src="assets/libs/c3/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="assets/extra-libs/toastr/dist/build/toastr.min.js"></script>
    <script src="assets/extra-libs/toastr/toastr-init.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/extra-libs/sweetalert2/sweet-alert.init.js"></script>
    <script src="assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>
</body>

</html>

<script type="text/javascript">
	 $('#myTable thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#myTable').DataTable({
        "bPaginate": false,
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
</script>
