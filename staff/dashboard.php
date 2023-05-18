<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"])
    {
        if(isset($_GET['active']))
        {
            $value = $_GET['active'];
            $output = "UPDATE `staff` SET `status` = 'Inactive' WHERE `id` = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: dashboard.php");
            }
        }
        if(isset($_GET['unactive']))
        {
            $value = $_GET['unactive'];
            $output = "UPDATE `staff` SET `status` = 'Active' WHERE `id` = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: dashboard.php");
            }
        }
        if(isset($_GET['resign']))
        {
            $value = $_GET['resign'];
            $output = "DELETE FROM staff WHERE id = '$value'";
			$result = mysqli_query($conn, $output);
			if($result)
            {
                header("location: logout.php");
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
<div class="row vh-100">
    <div class="col-md-2" style="background-color:#1b395f;">
      <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px" >
      <ul class="nav nav-pills flex-column">"
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="orders.php"><span class="fa fa-home mr-3"></span>Orders</a>
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
        <img src="<?php echo $row['dp_path']; ?>" style="width:30px; height: 30px" class="rounded-pill">
      </div>
            <div class="container">
                <div class="justify-content-center">
                    <table class="table table-hover text-center">
                        <thead>
                            <th>Day</th>
                            <th>Shift</th>
                            <th>Lunch</th>
                            <th>Working Hours</th>
                        </thead>
                            <tr>
                            <td>Monday</td>
                            <td>8am - 5pm</td>
                            <td>1pm - 2pm</td>
                            <td>8 Hours</td>
                        </tr>
                    
                        <tr>
                            <td>Tuesday</td>
                            <td>8am - 5pm</td>
                            <td>1pm - 2pm</td>
                            <td>8 Hours</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>8am - 5pm</td>
                            <td>1pm - 2pm</td>
                            <td>8 Hours</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>8am - 5pm</td>
                            <td>1pm - 2pm</td>
                            <td>8 Hours</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>8am - 1pm</td>
                            <td><b>-</b></td>
                            <td>5 Hours</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>8am - 5pm</td>
                            <td>1pm - 2pm</td>
                            <td>8 Hours</td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td><b>-</b></td>
                            <td><b>-</b></td>
                            <td><b>-</b></td>
                        </tr>   
                        
                    </table>
                </div>
                    <h2>Status</h2>
                    <p>If any member of staff is  on leave then he must mark his status Inactive. press the <?php echo $row['status']; ?> button to make your self <?php echo $row['status']; ?>.</p>
                    <?php
                    $user = $_SESSION['username'];
                    $output = "SELECT * FROM `staff` WHERE `username` = '$user' ";
                    $result = mysqli_query($conn, $output);
                    $row =  $result->fetch_assoc();
                    if($row['status'] == "Active")
                    {
                        ?><a class="btn btn-danger mb-1" href="dashboard.php?active=<?php echo $row['id']; ?>">Inactive</a>
                        <p>Your current status is : <span class="badge-success rounded-3"> <?php echo $row['status']; ?></span> </p>
                        <?php
                    }
                    else
                    {
                        ?><a class="btn btn-success mb-1" href="dashboard.php?unactive=<?php echo $row['id'];?>" >Active</a>
                        <p>Your current status is : <span class="badge-danger rounded-3"> <?php echo $row['status']; ?></span> </p>
                        <?php
                    }
                    ?>
                    <p class="mt-3">if you press the resign button your account will be deleted and you are no longer accessable to the controls.</p>
                    <a class="btn btn-dark" href="dashboard.php?resign=<?php echo $row['id']; ?>">Resign</a>

                    
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