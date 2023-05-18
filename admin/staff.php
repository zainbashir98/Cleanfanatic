<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"] == 'admin')
    {
		if(isset($_POST['btnsub']))
		{       
            $username = $_POST['Txtusername'];
            $first_name = $_POST['Txtfirstname'];
            $last_name = $_POST['Txtlastname'];
            $password = $_POST['Txtpassword'];
            $gender = $_POST['Txtgender'];
            $imgname = $_FILES['upload_image']['name'];
            $imgtmpname = $_FILES['upload_image']['tmp_name'];
            $imgloc = '../images/';
            move_uploaded_file($imgtmpname, $imgloc.$imgname);
            $dp_path = $imgloc.$imgname;
            $email = $_POST['Txtemail'];
            $status = $_POST['Txtstatus'];
            $dob = $_POST['Txtdob'];
            $phone = $_POST['Txtphone'];
            $query = "INSERT INTO `staff`(`first_name`, `last_name`, `username`, `password`, `gender`, `dp_path`, `email`, `status`, `dob`, `phone`) VALUES ('$first_name','$last_name','$username','$password','$gender','$dp_path','$email','$status','$dob','$phone')";
            $result = mysqli_query($conn, $query);
           if($result)
            {
                    header("location: staff.php");
            }
        }
		if(isset($_GET['delete']))
		{
        $del = $_GET['delete'];
        $delquery = "DELETE FROM staff WHERE id = '$del' ";
        $confirm_status = mysqli_query($conn, $delquery);
			if($confirm_status)
			{
			  header("location: staff.php");
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
                    <a class="nav-link  text-white" href="dashboard.php"><span
                            class="fa fa-home mr-3"></span>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="staff.php"><span class="fa fa-people-line mr-3"></span>Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="orders.php"><span
                            class="fa fa-clipboard-list mr-3"></span>Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="customer.php"><span
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
                <h2 class="mb-4">Add Staff</h2>
                <div class="justify-content-center">
                    <form action="#" enctype="multipart/form-data" method="post">
                        <div class="row gy-3 justify-content-center">
                            <div class="col-md-3">
                                <label for="firstname" class="form-label mt-2">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="Txtfirstname" value=""
                                    placeholder="First Name" required></input>
                            </div>
                            <div class="col-md-3">
                                <label for="lastname" class="form-label mt-2">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="Txtlastname" value=""
                                    placeholder="Last Name" required></input>
                            </div>
                        </div>
                        <div class="row gy-3 justify-content-center">
                            <div class="col-md-3">
                                <label for="username" class="form-label mt-2">Username</label>
                                <input type="text" class="form-control" id="username" name="Txtusername" value=""
                                    placeholder="@Username" required></input>
                            </div>
                            <div class="col-md-3">
                                <label for="gender" class="form-label mt-2">Gender</label>
                                <select id="gender" name="Txtgender" class="form-control rounded-3">
                                    <option Value="">Select</option>
                                    <option Value="Male">Male</option>
                                    <option Value="Female">Female</option>
                                    <option Value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gy-3 justify-content-center">
                            <div class="col-md-3">
                                <label for="password" class="form-label mt-2">Password</label>
                                <input type="text" class="form-control" id="password" name="Txtpassword"
                                    required></input>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label mt-4">Be carefull With Password</label>
                                <label class="form-label">Use a Stronge Password</label>
                            </div>
                        </div>
                        <div class="row gy-3 justify-content-center">
                            <div class="col-md-3">
                                <label for="image" class="form-label mt-2">Profile Photo</label>
                                <input type="file" name="upload_image" id="image" required>
                            </div>
                            <div class="col-md-3">
                                <label for="email" class="form-label mt-2">Email Address</label>
                                <input type="email" class="form-control" id="email" name="Txtemail" value=""
                                    placeholder="Email" required></input>
                            </div>
                        </div>
                        <div class="row gy-3 justify-content-center">
                            <div class="col-md-3">
                                <label for="status" class="form-label mt-2">Status</label>
                                <select id="status" name="Txtstatus" class="form-control rounded-3">
                                    <option Value="">Select</option>
                                    <option Value="Active">Active</option>
                                    <option Value="Not Active">Not Active</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dob" class="form-label mt-2">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="Txtdob" required></input>
                            </div>
                        </div>
                        <div class="row gy-3 justify-content-center">
                            <div class="col-md-3">
                                <label for="phone" class="form-label mt-2">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="Txtphone" required></input>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label mt-2"><b>Check all info before pressing Submit</b></label>
                                <input type="submit" class="form-control btn btn-dark rounded-3" name="btnsub">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h2 class="mb-4">Staff Members</h2>
            <div class="container">
                <div class="row">
                    <?php
			$output = "SELECT * FROM `staff`";
			$result2 = mysqli_query($conn, $output);
			if($result2)
			{
				while($row = $result2->fetch_assoc()):
				?>
                    <div class="col-md-4 col-sm-6 ">
                        <div class="card">
                            <img src="<?php echo $row['dp_path']; ?>" class="card-img-top" alt="" height="300px"
                                width="300px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['first_name']. " " . $row['last_name']; ?></h5>
                                <span
                                    class="<?php if($row['status'] == "Active") {echo "badge bg-success";}else{echo "badge bg-danger";}?>">
                                    <?php echo $row['status']?></span><br>
                                <a class="btn btn-danger mt-2"
                                    href="staff.php?delete=<?php echo $row['id']; ?>">Fire</a>
                                <a class="btn btn-primary mt-2"
                                    href="detail.php?detail=<?php echo $row['id']; ?>">Details</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; 
				}		
			  ?>
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