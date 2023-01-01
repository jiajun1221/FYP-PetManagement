<?php
// include connection for DB 
include 'connect.php';

// if button is clicked value will go the this $_POST thingy
if (isset($_POST['register_btn'])) {
    
    // get all the value and put it into a variable
    $supplier		=$_POST['supplier'];
	$orderItem		=$_POST['orderItem'];
	$quantity   	=$_POST['quantity'];
    $price          =$_POST['price'];
    $total          =$_POST['total'];
    $sub_total      =$_POST['sub_total'];
    $tax            =$_POST['tax'];
    $tax_amount     =$_POST['tax_amount'];
    $grand_total    =$_POST['total_ammount'];

    // convert the date to DB format
    $do_date = date("Y-m-d");

    // intiate insert code for the 1st SQL that is purchase order only
    $sql1="INSERT INTO `purchase_order`(`po_date`, `supplier`, `sub_total`, `tax`, `tax_total`, `total` , `status`) 
           VALUES ('$do_date','$supplier','$sub_total','$tax','$tax_amount','$grand_total', '1')";

// if the sql1 is excuted it will run the following code
if (mysqli_query($conn,$sql1)) {
    $last_id = mysqli_insert_id($conn);
    // last_ID == the ID that get from executing sql1
    for ($i=0; $i <count($orderItem) ; $i++) {
    //    loop all the data cause there's high chance multiple data will be inserted in the table
    $sql2="INSERT INTO `purchase_order_detail`(`po_ID`,`product`, `quantity`,`price`,`total`)
            VALUES ('$last_id','$orderItem[$i]','$quantity[$i]', '$price[$i]', '$total[$i]')";
    // data's are stored in array cause it might carry 1 or multiple data with it 

    
    // $sql3 = "UPDATE `inventory` SET `quantity`= `quantity` - '$quantity[$i]' WHERE `barcode` = '$code'";
    
    // $sql4 = "INSERT INTO `item_record`(`product`, `barcode`, `delivered_ammount`, `delivered_date`, `po_ID`)
    //          VALUES ('$product_name[$i]','$code','$quantity[$i]','$do_date','$last_id')";
             
    mysqli_query($conn,$sql2);
    // mysqli_query($conn,$sql3);
    // mysqli_query($conn,$sql4);

    // echo "<script>alert('Purchase Order has been created');</script>";
    echo "<script>window.location.assign('po_list.php');</script>";
}

}
}

?>