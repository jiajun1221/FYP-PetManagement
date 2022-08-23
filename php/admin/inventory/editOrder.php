<?php

include '../../connect.php';
if (isset($_POST['update'])) {
    $productID= $_POST['productID'];
    $productName = $_POST['productName'];
    $productType = $_POST['productType'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $mediaID = $_POST['mediaID'];
    mysqli_query($connect, "UPDATE product SET productName='$productName', productType='$productType', price = '$price', quantity = '$quantity', mediaID = '$mediaID' WHERE productID = '$productID' ")
        or die($mysqli->error);

    $_SESSION['message']="Record has been Saved!";
    $_SESSION['msg_type']="success";

    header('location:viewProduct.php');
    }

    if(isset($_GET['edit'])){
        $productID = $_GET['edit'];
        $result = mysqli_query($connect,"SELECT * FROM product WHERE productID=$productID");
        unset($_GET['edit']);
         $row = $result ->fetch_array();
            $productName = $row['productName'];
            $productType = $row['productType'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $media = $row['mediaID'];
        
        
        $_SESSION['message']="Record has been Saved";
        $_SESSION['msg_type']="success";
    }
    

//pre_r($result);
//pre_r($result->fetch_assoc());

function pre_r($array)
{
echo '<pre>';
print_r($array);
echo '</pre>';
}


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
                        <h2 class="content-header-title float-left mb-0">Product Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Product</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Product</a>
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
                                <h4 class="card-title">Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST">
                                    <div class="row">    
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="productName">Product Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="hidden" name="productID" value="<?php echo $productID;?>">
                                                    <input type="text" id="productName" class="form-control" name="productName" value="<?php echo $productName;?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="category">Category</label>
                                                </div>
                                                <div class="col-sm-9 col-form-label">
                                                    <select id="productType" name="productType" value="<?php echo $categoryName;?>">
                                                    <?php while ($row = $result->fetch_assoc()) :?>
                                                    <option value="<?php echo $row['categoryID'] ?>">
                                                    <?php echo $row['categoryName']?></option>                                                       
                                                    <?php endwhile;?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="price">Price</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="price" id="price" class="form-control" name="price" value="<?php echo $price;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="quantity">Quantity</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="quantity" id="quantity" class="form-control" name="quantity" value="<?php echo $quantity;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="mediaID">Images</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="mediaID" name="mediaID" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="update" type="update" class="btn btn-primary mr-1"style="float:right">Update</button>
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
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

</html>