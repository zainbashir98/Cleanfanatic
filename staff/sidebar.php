<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"])
    {
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
      <div class="d-flex justify-content-end align-items-end m-3">
        <h3><?php echo $row['first_name']." ".$row['last_name']; ?> &nbsp; </h3>
        <img src="<?php echo $row['dp_path']; ?>" style="width:40px;" class="rounded-pill">
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