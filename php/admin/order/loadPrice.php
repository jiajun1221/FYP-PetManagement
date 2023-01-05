<?php

include '../../connect.php';

if (isset($_POST['orderItem'])) {
    if ($_POST['orderItem']) {
        $result = mysqli_query($conn, "SELECT * FROM inventory WHERE itemName='" . $_POST["orderItem"] . "'");
        $row = $result->fetch_array();
        $price = $row['unitprice'];

        echo json_encode($price);
    } else {
    }
}
