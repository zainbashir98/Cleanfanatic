<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"] == 'admin')
    {
            $detail = $_GET['detail'];
            $output2 = "SELECT * FROM `customer` WHERE id = '$detail';";
            $result = mysqli_query($conn, $output2);
            if($result)
            {
                $data = $result->fetch_assoc();
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
                    <a class="nav-link text-white" href="dashboard.php"><span
                            class="fa fa-home mr-3"></span>Dashboard</a>
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
                    <a class="nav-link active" href="customer.php"><span
                            class="fa fa-people-line mr-3"></span>Customer</a>
                </li>
                <li class="nav-item">
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
            <div id="content" class="p-4 p-md-5 pt-5">
                <a class="btn btn-dark mb-5" href="customer.php">BACK</a>
                <h2 class="mb-4">Customer Detail</h2>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo $data['dp_path']; ?>" class="img-thumbnail" alt="" height="300px"
                            width="300px">
                    </div>
                    <div class="col-md-3">
                        <h2 class="mt-4"><b>Name</b></h2>
                        <h2><?php echo $data['first_name']." ". $data['last_name']; ?></h2>
                        <h2><b>@Username</b></h2>
                        <h2><?php echo $data['username']; ?></h2>
                        <h2><b>Gender</b></h2>
                        <h2><?php echo $data['gender']; ?></h2>



                    </div>
                    <div class="col-md-3">
                        <h2 class="mt-4"><b>Email Address</b></h2>
                        <h2><?php echo $data['email']; ?></h2>
                        <h2><b>Phone</b></h2>
                        <h2><?php echo $data['phone']; ?></h2>
                        <h2><b>Address</b></h2>
                        <h2><?php echo $data['address']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php  
                        }
                    }
                else
                {
                    header("location:index.php");
                }
                ?>