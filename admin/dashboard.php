<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"] == 'admin')
    {
        if(isset($_GET['cancel']))
        {
            $pagl=$_GET['cancel'];
            $v="cancel";
            $output2 = "UPDATE orders SET `status`='$v' where `order_id` = '$pagl'";
            $result = mysqli_query($conn, $output2);
            if($result)
            {
                header("location: index.php");
            }
            else
            {
                echo "connection error" . mysqli_connect_error();
            }
        }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="row vh-100">
        <div class="col-md-2" style="background-color:#1b395f;">
            <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px">
            <ul class="nav nav-pills flex-column">"
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="staff.php"><span
                            class="fa fa-people-line mr-3"></span>Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="orders.php"><span
                            class="fa fa-clipboard-list mr-3"></span>Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="customer.php"><span
                            class="fa fa-people-line mr-3"></span>Customer</a>
                </li>
                <li class="nav-item6">
                    <a class="nav-link text-white" href="gallery.php"><span class="fa fa-images mr-3"></span>Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="feedback.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="news.php"><span class="fa fa-square-rss mr-3"></span>News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="messages.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="newsletter.php"><span class="fa fa-envelope mr-3"></span>News
                        Letter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="settings.php"><span class="fa fa-gear mr-3"></span>Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="m-4">Dashboard</h2>
            <div class="container">
                <div class="justify-content-center">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-dark text-white ">
                                <div class="card-body">
                                    <h2 class="card-title">Orders Completed</h2>
                                    <?php 
                                        $query = "SELECT `status` FROM `orders` WHERE `status` = 'completed'";
                                        $result = mysqli_query($conn, $query);
                                        $count=0;
                                        while($row = $result->fetch_assoc()):
                                            $count++;
                                        endwhile;
                                    ?>
                                    <div class="card-text">
                                        <h2 class="fa fa-envelope mr-3">&emsp; &emsp; &emsp; &emsp;
                                            &emsp;<?php echo $count;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white ">
                                <div class="card-body">
                                    <h2 class="card-title">Sales</h2>
                                    <?php 
                                        $query = "SELECT `charges` FROM `orders` WHERE `status` = 'completed'";
                                        $result = mysqli_query($conn, $query);
                                        $sum=0;
                                        while($row = $result->fetch_assoc()):
                                            $sum = $sum + $row['charges'];
                                        endwhile;
                                    ?>
                                    <div class="card-text">
                                        <h2 class="fa fa-envelope mr-3">&emsp; &emsp; &emsp; &emsp; $<?php echo $sum;?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white ">
                                <div class="card-body">
                                    <h2 class="card-title">Running News</h2>
                                    <?php 
                                        $query = "SELECT `post_news` FROM `news`";
                                        $result = mysqli_query($conn, $query);
                                        $count=0;
                                        while($row = $result->fetch_assoc()):
                                            $count++;
                                        endwhile;
                                    ?>
                                    <div class="card-text">
                                        <h2 class="fa fa-envelope mr-3">&emsp; &emsp; &emsp; &emsp;
                                            &emsp;<?php echo $count;?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="m-4">Active Orders</h2>
                    <table class="table table-hover">
                        <thead>
                            <th>Order ID</th>
                            <th>Order Name</th>
                            <th>Address</th>
                            <th>Charges</th>
                            <th>Payment</th>
                            <th>Status</th>

                        </thead>
                        <tr>
                            <?php
                            $query = "SELECT * FROM orders WHERE `status` = 'in-progress'";
                            $result = mysqli_query($conn, $query);
                            if($result)
                            {
                                while($row = $result->fetch_assoc()):
                        ?>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['order_from']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>$<?php echo $row['charges']; ?></td>
                            <td><span
                                    class="<?php if($row['payment']=="paid"){ echo "badge bg-success"; }else{ echo "badge bg-danger"; }?> text-white"><?php echo $row['payment']; ?></span>
                            </td>
                            <td><span
                                    class="<?php if($row['status']=="completed"){ echo "badge bg-success"; }else if($row['status']=="in-progress"){ echo "badge bg-primary"; }else{ echo "badge bg-danger"; }?> text-white"><?php echo $row['status']; ?></span>
                            </td>
                            <td><a href="dashboard.php?cancel=<?php echo $row['id'];?>"
                                    class="btn btn-danger">Cancel</a></td>
                        </tr>
                        <?php
                            endwhile;
                            }
                        ?>

                    </table>
                </div>
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