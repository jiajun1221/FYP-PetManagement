<?php include '../header.php';

include '../../connect.php';

if (isset($_GET['edit'])) {
    $orderID = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM `order` WHERE orderID='$orderID'");
    $row = $result->fetch_array();
    $orderItem = $row['orderItem'];
    $qty = $row['qty'];
    $orderDate = $row['orderDate'];
    $supplier = $row['supplier'];
}

if (isset($_POST['update'])) {
    $orderID = $_GET['edit'];
    $customerName = $_POST['customerName'];
    $new_status = '1';
    $result = mysqli_query($conn, "SELECT * FROM `order`");

    //Update total
    mysqli_query($conn, "UPDATE `order` SET `status`='$new_status' WHERE orderID=$orderID")
        or die($mysqli->error);

        echo "<script>alert('Record has been updated');</script>";

    header('location:viewOrder.php');
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM inventory WHERE orderItem=$id");
    unset($_GET['delete']);

   echo "<script>alert('Record has been deleted');</script>";
}


$result = mysqli_query($conn, "SELECT * FROM inventory")
    or die($mysqli->error);


//pre_r($result);
//pre_r($result->fetch_assoc());

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Invoice Add - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Main Menu-->

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-add-wrapper">
                    <div class="row invoice-add">
                        <!-- Invoice Add Left starts -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <!-- Header starts -->
                                <div class="card-body invoice-padding pb-0">
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                                <img src="../../../app-assets/img/icon1.png" class="logo-img" height=40>
                                                <h3 class="invoice-logo">Pet Care Management</h3>
                                            </div>
                                            <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                                            <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                                            <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                        </div>
                                        <div class="invoice-number-date mt-md-0 mt-2">
                                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                                <h4 class="invoice-title">Invoice</h4>
                                                <div class="input-group input-group-merge invoice-edit-input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i data-feather="hash"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control invoice-edit-input" placeholder="53634" />
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-1">
                                                <span class="title">Date:</span>
                                                <input type="text" class="form-control invoice-edit-input date-picker" />
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="title">Due Date:</span>
                                                <input type="text" class="form-control invoice-edit-input due-date-picker" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Header ends -->

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row row-bill-to invoice-spacing">
                                        <div class="col-xl-8 mb-lg-1 col-bill-to pl-0">
                                            <h6 class="invoice-to-title">Invoice To:</h6>
                                            <div class="invoice-customer">
                                                <select class="invoiceto form-control">
                                                    <option></option>
                                                    <option value="petfood">PetFood Corp</option>
                                                    <option value="petmed">PetMed Inc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 pr-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Total Due:</td>
                                                        <td><strong>#</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Bank name:</td>
                                                        <td>#</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Country:</td>
                                                        <td>#</td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Product Details starts -->
                                <div class="card-body invoice-padding invoice-product-details">
                                    <form class="source-item">
                                        <div data-repeater-list="group-a">
                                            <div class="repeater-wrapper" data-repeater-item>
                                                <div class="row">
                                                    <div class="col-12 d-flex product-details-border position-relative pr-0">
                                                        <div class="row w-100 pr-lg-0 pr-1 py-2">
                                                            <div class="col-lg-5 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                                                <p class="card-text col-title mb-md-50 mb-0">Item</p>
                                                                <select class="form-control item-details">
                                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                                            <option value="<?php echo $row['itemID'] ?>">
                                                                                <?php echo $row['itemName'] ?></option>
                                                                        <?php endwhile; ?>
                                                                </select>
                                                                   </div>
                                                           <div class="col-lg-2 col-12 my-lg-0 my-2">
                                                                <p class="card-text col-title mb-md-2 mb-0">Qty</p>
                                                                <input type="number" class="form-control" value="1" placeholder="1" />
                                                            </div>
                                                            <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                                                <p class="card-text col-title mb-md-50 mb-0">Price</p>
                                                                <p class="card-text mb-0">$00.00</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25">
                                                            <i data-feather="x" class="cursor-pointer font-medium-3" data-repeater-delete></i>
                                                            <div class="dropdown">
                                                                <i class="cursor-pointer more-options-dropdown mr-0" data-feather="settings" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                </i>
                                                                <div class="dropdown-menu dropdown-menu-right item-options-menu p-50" aria-labelledby="dropdownMenuButton">
                                                                    <div class="form-group">
                                                                        <label for="discount-input" class="form-label">Discount(%)</label>
                                                                        <input type="number" class="form-control" id="discount-input" />
                                                                    </div>
                                                                    <div class="form-row mt-50">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="tax-1-input" class="form-label">Tax 1</label>
                                                                            <select name="tax-1-input" id="tax-1-input" class="form-control tax-select">
                                                                                <option value="0%" selected>0%</option>
                                                                                <option value="1%">1%</option>
                                                                                <option value="10%">10%</option>
                                                                                <option value="18%">18%</option>
                                                                                <option value="40%">40%</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="tax-2-input" class="form-label">Tax 2</label>
                                                                            <select name="tax-2-input" id="tax-2-input" class="form-control tax-select">
                                                                                <option value="0%" selected>0%</option>
                                                                                <option value="1%">1%</option>
                                                                                <option value="10%">10%</option>
                                                                                <option value="18%">18%</option>
                                                                                <option value="40%">40%</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-divider my-1"></div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <button type="button" class="btn btn-outline-primary btn-apply-changes">Apply</button>
                                                                        <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12 px-0">
                                                <button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
                                                    <i data-feather="plus" class="mr-25"></i>
                                                    <span class="align-middle">Add Item</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Product Details ends -->

                                <!-- Invoice Total starts -->
                                <div class="card-body invoice-padding">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            <div class="d-flex align-items-center mb-1">
                                                <label for="salesperson" class="form-label">Salesperson:</label>
                                                <input type="text" class="form-control ml-50" id="salesperson" placeholder="Edward Crowley" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount">$1800</p>
                                                </div>
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Discount:</p>
                                                    <p class="invoice-total-amount">$28</p>
                                                </div>
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Tax:</p>
                                                    <p class="invoice-total-amount">21%</p>
                                                </div>
                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">$1690</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Total ends -->

                                <hr class="invoice-spacing mt-0" />

                                <div class="card-body invoice-padding py-0">
                                    <!-- Invoice Note starts -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <label for="note" class="form-label font-weight-bold">Note:</label>
                                                <textarea class="form-control" rows="2" id="note">
It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Invoice Note ends -->
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Add Left ends -->

                        <!-- Invoice Add Right starts -->
                        <div class="col-xl-3 col-md-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary btn-block mb-75" disabled>Send Invoice</button>
                                    <a href="./previewInvoice.php" class="btn btn-outline-primary btn-block mb-75">Preview</a>
                                    <button type="button" class="btn btn-outline-primary btn-block">Save</button>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Add Right ends -->
                    </div>

                    <!-- Add New Customer Sidebar -->
                    <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title">
                                        <span class="align-middle">Add Supplier</span>
                                    </h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <form>
                                        <div class="form-group">
                                            <label for="customer-name" class="form-label">Supplier Name</label>
                                            <input type="text" class="form-control" id="customer-name" placeholder="John Doe" />
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="customer-email" placeholder="example@domain.com" />
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-address" class="form-label">Supplier Address</label>
                                            <textarea class="form-control" id="customer-address" cols="2" rows="2" placeholder="1307 Lady Bug Drive New York"></textarea>
                                        </div>
                                        <div class="form-group position-relative">
                                            <label for="customer-country" class="form-label">Country</label>
                                            <select class="form-control" id="customer-country" name="customer-country">
                                                <option label="select country"></option>
                                                <option value="Australia">Australia</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-contact" class="form-label">Contact</label>
                                            <input type="number" class="form-control" id="customer-contact" placeholder="763-242-9206" />
                                        </div>
                                        <div class="form-group d-flex flex-wrap mt-2">
                                            <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Add</button>
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Add New Customer Sidebar -->
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>