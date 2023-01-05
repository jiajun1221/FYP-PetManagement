

<?php

include '../../connect.php';

if (isset($_GET['ID']) && isset($_POST['received_btn']) && isset($_POST['received_qty'])) {


    $today           =   date("Y-m-d");
    $received        =   $_POST['received_qty'];
    $item_status     =   $_POST['item_status'];
    $DO_ID           =   $_GET['ID'];

    $update_status = True;

    if (is_array($_POST['received_qty'])) {

        for ($i = 0; $i < count($received); $i++) {

            $quantity = $_POST['quantity'][$i];
            $received_qty = $_POST['received_qty'][$i];
            $item_status = $_POST['item_status'][$i];
            $product = $_POST['product'][$i];

            if ($quantity == $received_qty) {

                mysqli_query($conn, "UPDATE delivery_order_detail SET item_status = '1',  quantity = '0' WHERE product = '$product' and DO_ID = '$DO_ID'") or die($mysqli->error);

                mysqli_query($conn, "UPDATE `inventory` SET `quantity`= `quantity` + '$quantity' WHERE `itemName` = '$product'");
                echo "<script>alert('Inventory has been updated');</script>";
                mysqli_query($conn, $sql3);

                $item_status = '1';
            } else  if ($quantity > $received_qty) {

                $new_quantity = $quantity - $received_qty;

                mysqli_query($conn, "UPDATE delivery_order_detail SET quantity = '$new_quantity' WHERE product = '$product' and DO_ID = '$DO_ID'") or die($mysqli->error);

                mysqli_query($conn, "UPDATE `inventory` SET `quantity`= `quantity` + '$quantity' WHERE `itemName` = '$product'");
                echo "<script>alert('Inventory has been updated');</script>";
            }

            if ($item_status == "0") {
                $update_status = False;
            }
        }

        if ($update_status) {
            mysqli_query($conn, "UPDATE delivery_order SET status = '2' WHERE ID = '$DO_ID'") or die($mysqli->error);
            echo "<script>alert('Delivery Order Status has been updated');</script>";
        }

        header('Location: do_list.php');
    }
}

?>
