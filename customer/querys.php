<!-- header........................ -->
<?php
include '../includes/header.php';
include '../includes/DataBaseHelper.php';
session_start();
if($_SESSION["username"])
    {
        $user = $_SESSION["username"];
        $output = "SELECT * FROM `customer` WHERE `username` = '$user' ";
		$result2 = mysqli_query($conn, $output);
		$row = $result2->fetch_assoc();
        if(isset($_GET['del']))
        {
            $del = $_GET['del'];
            $delquery = "UPDATE `orders` SET `status`= 'cancel' WHERE `order_id` = '$del'";
            $confirm_status = mysqli_query($conn, $delquery);
			if($confirm_status)
			{
			  header("location: querys.php");
			}
        }
?>
<div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll nav-pills" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact us</a>
        </li>
    </ul>
    <form class="d-flex">
        <div class="dropdown">
            <button type="button" class="btn btn-white dropdown-toggle text-capitalize" data-bs-toggle="dropdown">
                <?php echo $row['first_name']." ".$row['last_name']; ?> &nbsp; 
            </button>
            <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="querys.php">Orders</a></li>
                 <li><a class="dropdown-item" href="feedback.php">Give Feedback</a></li>
                <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                
                <li><a class="dropdown-item" href="logout.php">Signout</a></li>
            </ul>
        </div>
        <img src="<?php echo $row['dp_path']; ?>" style="width:40px; height:40px" class="rounded-pill">
    </form>
</div>
</div>
</nav>
</header>
</body>
<!-- data here -->
<div class="container">
            <div class="justify-content-center">
                <table class="table table-hover">
                    <thead>
                        <th>Order ID</th>
                        <th>Address</th>
                        <th>Charges</th>
                        <th>Payment</th>
                        <th>Status</th>
                    </thead>
                    <tr>
                        <?php
                            $query = "SELECT * FROM orders WHERE `order_from` = '$user'";
                            $result = mysqli_query($conn, $query);
                            if($result)
                            {
                                while($row = $result->fetch_assoc()):
                        ?>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>$<?php echo $row['charges']; ?></td>
                        <td><span class="<?php if($row['payment']=="paid"){ echo "badge bg-success"; }else{ echo "badge bg-danger"; }?> text-white"><?php echo $row['payment']; ?></span></td>
                        <td><span class="<?php if($row['status']=="completed"){ echo "badge bg-success"; }else if($row['status']=="in-progress"){ echo "badge bg-primary"; }else if($row['status']=="in-query"){ echo "badge bg-warning"; }else{ echo "badge bg-danger"; }?> text-white"><?php echo $row['status']; ?></span></td>
                        <?php
                            if($row['status'] == "in-query" || $row['status'] == "in-progress")
                            {
                                ?>
                                <td><a class="btn btn-danger" href="querys.php?del=<?php echo $row['order_id']; ?>">cancel</a></td>
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



<!-- footer........................ -->
<?php
include '../includes/footer.php';
}
else
{
    header("location:signin.php");
}
?>