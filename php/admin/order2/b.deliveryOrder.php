
<?php
session_start();

//error_reporting(0);


include 'connect.php';

if(isset($_POST['register_btn'])){
	$supplier		=$_POST['supplier'];
	$product_name	=$_POST['orderItem'];
	$quantity   	=$_POST['quantity'];



	
	$do_date = date("Y-m-d");
    $sql1="INSERT INTO `delivery_order`(`supplier`, `do_date`, `status`) VALUES ('$supplier','$do_date','1')";

	

		if (mysqli_query($conn,$sql1)) {
			$last_id = mysqli_insert_id($conn);
			for ($i=0; $i <count($product_name) ; $i++) {
            $sql2="INSERT INTO `delivery_order_detail`(`DO_ID`,`product`, `quantity`,item_status)
                    VALUES ('$last_id','$product_name[$i]','$quantity[$i]','0')";


			mysqli_query($conn,$sql2);
	
			
			
			// echo "<script>alert('DO has been created');</script>";
			echo "<script>window.location.assign('do_list.php');</script>";
		}
		
	}
	 	else{
	 		echo "<script>alert('Failed to upload the product');</script>";
		 }
		
	 }
	mysqli_close($conn);
 ?>
