<?php include '../header.php';

      include 'connect.php';

// if (isset($_POST['submit'])) {

//     $orderDate = $_POST['orderDate'];
//     $supplier = $_POST['supplier'];
//     $status = '0';

//     foreach ($_POST['invoice'] as $invoice) {
//         $orderItem = $_POST['orderItem'];
//         $qty = $_POST['qty'];

//         mysqli_query($connect, "INSERT INTO `order`(orderItem,orderDate,qty,supplier,status) VALUES('$orderItem','$orderDate','$qty','$supplier','$status')");
//         $_SESSION['message'] = "Record has been Saved!";
//         $_SESSION['msg_type'] = "Success";

//         $fp = fopen("testing.txt", "w");
//         $write["orderID"] = $orderID;
//         $write["qty"] = $qty;
//         $write["query"] = "INSERT INTO `order`(orderItem,orderDate,qty,supplier,status) VALUES('$orderItem','$orderDate','$qty','$supplier','$status')";
//         $write["invoice"] = $invoice;
//         fwrite($fp, print_r($write, true));
//         fclose($fp);
//     }

//     header('location:viewOrderDetail.php');
// }

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     mysqli_query($connect, "DELETE FROM inventory WHERE orderItem=$id");
//     unset($_GET['delete']);

//     $_SESSION['message'] = "Record has been Deleted";
//     $_SESSION['msg_type'] = "danger";
// }


$result = mysqli_query($conn, "SELECT * FROM inventory")
    or die($mysqli->error);
$result2 = mysqli_query($conn, "SELECT * FROM supplier")
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
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>  -->

      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="//code.jquery.com/jquery-1.11.1.min.js">
  </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Order</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Inventory</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Order
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">

                    </div>
                </div>
            </div>
            <div class="content-body" id="sad">
                <section class="form-control-repeater">
                    <div class="row">
                        <!-- Invoice repeater -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Make Purchase Order</h4>
                                </div>
                                <div class="card-body " id="test"><br>

                                <form method="POST" action="b.deliveryOrder.php" class="form-inline" name="myDO" onsubmit="return validateForm()">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      <h2>Delivery Order</h2>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-body">


              <div class="row">


                <div class="col-md-4 col-sm-6">
                <select class="form-control" name="supplier">
                        <?php while ($row = $result2->fetch_assoc()) {
                          $name=$row['supplierName'];?>
                          <option class="placeholder"value="<?php echo $name ?>"><?php echo $name;?></option>
                        <?php } ?>
                      </select>
                 </div>

                 <div class="col-md-4 col-sm-6">
                    <!-- <input class="form-control disabled"type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="today" name="do_date" required > -->
                    <input type="text" value="<?php echo date("d/m/Y"); ?>" class="form-control disabled">
                </div>

                <!-- <div class="col-md-3 col-sm-6">
                    <input type="text" name="DO_ID" class="form-control" placeholder="ID">  
              </div> -->

              </div>

         </div>
      </div>
    </div>

    <br>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="card-body">

          <div class="table-responsive">
             
              <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                  <tr>
                    <th class="text-center"> #              </th>
                    <th class="text-center"> Product Name   </th>
                    <th class="text-center"> Quantity       </th>
                  </tr>
                </thead>
                <tbody>
                  <tr id='addr0'>
                    <td>1</td>
                    <td>
                      <select class="form-control" name="orderItem[]">
                        <?php while ($row = $result->fetch_assoc()) {
                          $name=$row['itemName'];?>
                          <option class="placeholder"value="<?php echo $name ?>"><?php echo $name;?></option>
                        <?php } ?>
                      </select>
                      </td>
                    <td><input type="text" name='quantity[]' placeholder='' class="form-control" maxlength="6" data-filter='[0-9|.]*'></td>
                  </tr>
                  <tr id='addr1'></tr>
                </tbody>
              </table>
             </div> 

          <div class="row">
              <a id="add_row" class="btn btn-default pull-left cursor-pointer">Add Row</a>
              <a id='delete_row' class="pull-right btn btn-default cursor-pointer">Delete Row</a> <br><br><br>
          </div>
                <button type="submit" class="btn btn-primary" name="register_btn">Create Delivery Order</button>
              </div>
        </div>  
        </div>      
          </form>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Invoice repeater -->
            </div>
            </section>

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
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/form-repeater.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on(' load', function() { if (feather) { feather.replace({ width: 14, height: 14 }); } }) </script>
</body>
<!-- END: Body-->

</html>

<script>

$(document).ready(function(){

//  let today = new Date().toLocaleDateString().substr(0, 10);
//   document.querySelector("#today").value = today;
 //add row function
var i=1;
$("#add_row").click(function(){b=i-1;
    $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
    $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
    i++; 
});

//delete row function
$("#delete_row").click(function(){
  var x = confirm("delete row ?");
  if(i>1 && x == true){
$("#addr"+(i-1)).html('');
i--;
}
calc();
});

$('#tab_logic tbody').on('keyup change',function(){
    calc();
});
$('#tax').on('keyup change',function(){
    calc_total();
});


});

function calc()
{
$('#tab_logic tbody tr').each(function(i, element) {
    var html = $(this).html();
    if(html!='')
    {
        var qty = $(this).find('.quantity').val();
        var price = $(this).find('.price').val();
        $(this).find('.total').val(qty*price);
        
        calc_total();
    }
});
}

function calc_total()
{
total=0;
$('.total').each(function() {
    total += parseInt($(this).val());
});
$('#sub_total').val(total.toFixed(2));
tax_sum=total/100*$('#tax').val();
$('#tax_amount').val(tax_sum.toFixed(2));
$('#total_amount').val((tax_sum+total).toFixed(2));
}

// Apply filter to all inputs with data-filter:
let inputs = document.querySelectorAll('input[data-filter]');

for (let input of inputs) {
let state = {
value: input.value,
start: input.selectionStart,
end: input.selectionEnd,
pattern: RegExp('^' + input.dataset.filter + '$')
};

input.addEventListener('input', event => {
if (state.pattern.test(input.value)) {
  state.value = input.value;
} else {
  input.value = state.value;
  input.setSelectionRange(state.start, state.end);
}
});

input.addEventListener('keydown', event => {
state.start = input.selectionStart;
state.end = input.selectionEnd;
});
}


</script>