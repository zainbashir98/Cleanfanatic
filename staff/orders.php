<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"])
    {
        if(isset($_GET['active']))
        {
            $value = $_GET['active'];
            $output = "UPDATE `orders` SET `status` = 'in-progress' WHERE `order_id` = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: orders.php");
            }
        }
        if(isset($_GET['mark']))
        {
            $value = $_GET['mark'];
            $output = "UPDATE `orders` SET `status` = 'completed' WHERE `order_id` = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: orders.php");
            }
        }
        if(isset($_GET['del']))
        {
            $value = $_GET['del'];
            $output = "UPDATE `orders` SET `status` = 'cancel' WHERE `order_id` = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: orders.php");
            }
        }
        if(isset($_GET['pay']))
        {
            $value = $_GET['pay'];
            $output = "UPDATE `orders` SET `payment` = 'paid' WHERE `order_id` = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: orders.php");
            }
        }
        $user = $_SESSION["username"];
        $output = "SELECT * FROM `staff` WHERE `username` = '$user' ";
		$result2 = mysqli_query($conn, $output);
		$row = $result2->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clean Fanatic</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Author">
    <meta name="description" content="Clean Fanatic Pakistan Leading Brand for Cleaning Services.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/x-icon" href="../images/icon.png">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/bootstrap.bundle.js"></script>
</head>
<body>
<div class="row ">
    <div class="col-md-2 vh-100" style="background-color:#1b395f;">
      <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px" >
        <ul class="nav nav-pills flex-column">"
            <li class="nav-item">
              <a class="nav-link text-white" href="dashboard.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="orders.php"><span class="fa fa-home mr-3"></span>Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="settings.php"><span class="fa fa-home mr-3"></span>Settings</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Logout</a>
                </li>
          </ul>
    </div>
    <div class="col-md-10">
        <div class="text-capitalize d-flex justify-content-end align-items-end m-3">
            <h3><?php echo $row['first_name']." ".$row['last_name']; ?> &nbsp; </h3>
            <img src="<?php echo $row['dp_path']; ?>" style="width:40px;" class="rounded-pill">
        </div>
    <h2 class="m-4">Orders</h2>
    <div class="container">
            <div class="justify-content-center">
                <table class="table table-hover">
                    <thead>
                        <th>Order ID</th>
                        <th>Order From</th>
                        <th>Address</th>
                        <th>Charges</th>
                        <th>Payment</th>
                        <th>Status</th>
    
                    </thead>
                    <tr>
                        <?php
                            $query = "SELECT * FROM orders";
                            $result = mysqli_query($conn, $query);
                            if($result)
                            {
                                while($row = $result->fetch_assoc()):
                        ?>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_from']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>$<?php echo $row['charges']; ?></td>
                        <td><span class="<?php if($row['payment']=="paid"){ echo "badge bg-success"; }else{ echo "badge bg-danger"; }?> text-white"><?php echo $row['payment']; ?></span></td>
                        <td><span class="<?php if($row['status']=="completed"){ echo "badge bg-success"; }else if($row['status']=="in-progress"){ echo "badge bg-primary"; }else if($row['status']=="in-query"){ echo "badge bg-warning"; }else{ echo "badge bg-danger"; }?> text-white"><?php echo $row['status']; ?></span></td>
                        <td><a class="btn btn-primary" href="orders.php?active=<?php echo $row['order_id']; ?>">Take order</a></td>
                        <td><a class="btn btn-info" href="orders.php?mark=<?php echo $row['order_id']; ?>">Mark as compeleted</a></td>
                        <td><a class="btn btn-danger" href="orders.php?del=<?php echo $row['order_id']; ?>">cancel</a></td>
                    </tr>
                        <?php
                            endwhile;
                            }
                        ?>
                </table>
            </div>
    </div>
    <h2 class="m-4">Payment</h2>
    <div class="container">
            <div class="justify-content-center">
                <table class="table table-hover">
                    <thead>
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Payment</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tr>
                        <?php
                            $query = "SELECT * FROM orders";
                            $result = mysqli_query($conn, $query);
                            if($result)
                            {
                                while($row = $result->fetch_assoc()):
                        ?>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_from']; ?></td>
                        <td><span class="<?php if($row['payment']=="paid"){ echo "badge bg-success"; }else{ echo "badge bg-warning"; }?> text-white"><?php echo $row['payment']; ?></span></td>
                        <?php
                        if($row['payment']=="pending")
                        {
                            ?>
                            <td><a class="btn btn-primary" href="orders.php?pay=<?php echo $row['order_id']; ?>">Paid</a></td>
                            <td><a class="btn btn-info" href="bill.php?pay=<?php echo $row['order_id']; ?>">Generate Bill</a></td>
                            <?php 
                        }
                        else
                        {
                            ?>
                            <td><a class="btn btn-info" href="bill_details.php?pay=<?php echo $row['order_id'];?>">Bill Details</a></td>
                            <?php
                        }
                        ?>
                    </tr>
                        <?php
                            endwhile;
                            }
                        ?>
                </table>
            </div>
    </div>
</div>

</body>
</html>
<?php
}
else
{
    header("location:index.php");
}
?>