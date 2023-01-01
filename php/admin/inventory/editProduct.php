<?php

include '../../connect.php';
if (isset($_POST['update'])) {
    $itemID = $_GET['edit'];
    $itemName = $_POST['itemName'];
    $itemType = $_POST['itemType'];
    $quantity = $_POST['quantity'];
    $expiryDate = $_POST['expiryDate'];
    $label = $_POST['label'];
    $cost = $_POST['cost'];
    $unitprice = $_POST['unitprice'];
    $image =  $_FILES["image"]["name"];
    mysqli_query($connect, "UPDATE inventory SET itemName='$itemName', itemType='$itemType', quantity = '$quantity', expiryDate = '$expiryDate', label = '$label', cost = '$cost', unitprice = '$unitprice', image = '$image' WHERE itemID = '$itemID' ")
        or die($connect->error);

    $target_dir = "../../../app-assets/img/product/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["image"]["tmp_name"]);



    // Check if file already exists
    if (file_exists($target_file)) {
        $error = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    $fp = fopen("testing.txt", "w");
    $write["target_file"] = $target_file;
    $write["move_uploaded_file"] =  $_FILES["image"]["tmp_name"];
    fwrite($fp, print_r($write, true));
    fclose($fp);

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $_SESSION['message'] = "Record has been Saved!";
    $_SESSION['msg_type'] = "success";

    header('location:inventory.php');
}

if (isset($_GET['edit'])) {
    $itemID = $_GET['edit'];
    $result = mysqli_query($connect, "SELECT * FROM inventory WHERE itemID=$itemID");
    unset($_GET['edit']);
    $row = $result->fetch_array();
    $itemName = $row['itemName'];
    $itemType = $row['itemType'];
    $quantity = $row['quantity'];
    $expiryDate = $row['expiryDate'];
    $label = $row['label'];
    $cost = $row['cost'];
    $unitprice = $row['unitprice'];

    $_SESSION['message'] = "Record has been Saved";
    $_SESSION['msg_type'] = "success";
}

$result = mysqli_query($connect, "SELECT * FROM  category")
    or die($mysqli->error);

include '../header.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Inventory Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Stock</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Item</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Item</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Item</h4>
                            </div>

                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12"><br>
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="itemName">Item Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="itemName" class="form-control" name="itemName" value="<?php echo $itemName ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="category">Item Type</label>
                                                </div>
                                                <div class="col-sm-9 col-form-label">
                                                    <select id="itemType" name="itemType">
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <option value="<?php echo $row['categoryID'] ?>">
                                                                <?php echo $row['categoryName'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="unitprice">Unit Price</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="unitprice" id="unitprice" class="form-control" name="unitprice" value="<?php echo $unitprice ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="quantity">Quantity</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="quantity" id="quantity" class="form-control" name="quantity" value="<?php echo $quantity ?>" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="expiryDate">Expiry Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input name="expiryDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="<?php echo $expiryDate ?>"></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="label">Label</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="label" id="label" class="form-control" name="label" value="<?php echo $label ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="cost">Cost</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="cost" id="cost" class="form-control" name="cost" value="<?php echo $cost ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="image">Images</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="image" name="image" accept="image/jpg, image/png, image/gif, image/jpeg">
                                                </div>
                                            </div>
                                        </div> -->


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="update" type="submit" class="btn btn-primary mr-1">Update</button>
                                            <a href="viewProduct.php"><button name="back" type="button" class="btn btn-primary mr-1">Back</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

</html>