<?php include '../header.php';

include '../../connect.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `appointment` WHERE appointmentID=$id");
    unset($_GET['delete']);

    echo "<script>alert('Record has been deleted');</script>";
}

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">


<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Appointment Page</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Appointment</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="card-header border-bottom p-1" bis_skin_checked="1">
                                            <div class="head-label" bis_skin_checked="1">
                                                <h4 class="mb-0">Appointment Table</h4>
                                            </div>

                                        </div><br>
                                        <!-- table  starts-->
                                        <div class="content-header-center col-12">
                                             <div class="d-flex justify-content-between align-items-center mx-0 row" bis_skin_checked="1">

                                               
                                            </div>
                                           
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="do_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Pet</th>
                                                        <th scope="col">Service Type</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Time</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    // include '../../connect.php';
                                                    $i = 1;
                                                    $sql    = "SELECT * FROM appointment INNER JOIN pet  
                                                    ON pet.petID = appointment.petID" ;
                                                 $result = $conn->query($sql);

                                                    while ($row = $result->fetch_assoc()) {

                                                        $petID     = $row['petName'];
                                                        $serviceType = $row['serviceType'];
                                                        $appointmentDate = $row['appointmentDate'];
                                                        $appointmentTime = $row['appointmentTime'];
                                                        
                                                        // $appointmentDate     = appointmentDate("d/m/Y", strtoappointmentTime($row["expiryDate"]));
                                                        
                                                        

                                                        # code...


                                                        echo "
        <tr>
        <td>  " . $i++ . "</td>
        <td>  " . $petID . "</td>
        <td>  " . $serviceType . "</td>
        <td>  " . $appointmentDate . "</td>
        <td>  " . $appointmentTime . "</td>
        <td> </td>
                                                        </tr>";
                                                    }
                                                    echo "</table>"

                                                    ?>



                                        </div>
</div>
                                        <!-- table ends -->
                                        <div class="d-flex justify-content-between mx-0 row">

                                            <div class="col-sm-12 col-md-6">


                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">

</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

</html>

<script>
    $(document).ready(function() {
        $('#do_table').DataTable({

            "bInfo": false,
            "order": [],
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5],
                "orderable": true,
            }, ],
        });

    });
</script>