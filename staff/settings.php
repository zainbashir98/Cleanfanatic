        <?php
        session_start();
        if($_SESSION["username"])
        {
            include("../includes/DatabaseHelper.php");
            if(isset($_POST['BtnChangePass']))
            {
                $current_password = $_POST['Txtcp'];
                $new_password = $_POST['Txtnp'];
                $new_password2 = $_POST['Txtnp2'];
                $username = $_SESSION["username"];
                $query = $conn->prepare("SELECT * FROM `staff` where username = ?");
                $query->bind_param("s",$username);
                $query->execute();
                $query_result = $query->get_result();
                if($query_result->num_rows > 0)
                {
                $data = $query_result->fetch_assoc();
                if($data['password'] === $current_password)
                {
                    if($new_password === $new_password2)
                    {
                    $query2 =$conn->prepare("UPDATE `staff` SET password = '$new_password' where `username` = '$username'");
                    $query2->execute();
                            ?>
                            <script>
                            alert('Password is changed');
                            Window.location.href = "settings.php";
                            </script>
                            <?php
                    }
                    else
                    {
                    ?>
                    <script>
                    alert('Password Does not match');
                    Window.location.href = "settings.php";
                    </script>
                    <?php
                    }
                }
                else
                {
                    ?>
                    <script>
                    alert('Invalid Current Password');
                    Window.location.href = "settings.php";
                    </script>
                    <?php
                }
                }

            }
            if(isset($_POST['btnchange']) && isset($_FILES['post_image']))
            {
                $user = $_SESSION["username"];
                $imgname = $_FILES['post_image']['name'];
                $imgtmpname = $_FILES['post_image']['tmp_name'];
                $imgloc = '../images/';
                $dp_path = $imgloc.$imgname;
                move_uploaded_file($imgtmpname, $imgloc.$imgname);
                $Query = "UPDATE `staff` SET `dp_path`='$dp_path' WHERE `username`= '$user' ";
                $confirm_status = mysqli_query($conn, $Query);
                if($confirm_status)
                {
                    header("location: settings.php");
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
            <div class="row">
                <div class="col-md-2 vh-100" style="background-color:#1b395f;">
                    <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px">
                    <ul class="nav nav-pills flex-column">"
                        <li class="nav-item">
                            <a class="nav-link text-white" href="dashboard.php"><span
                                    class="fa fa-home mr-3"></span>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="orders.php"><span
                                    class="fa fa-home mr-3"></span>Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="settings.php"><span
                                    class="fa fa-home mr-3"></span>Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="logout.php"><span
                                    class="fa fa-right-from-bracket mr-3"></span>Logout</a>
                        </li>
                    </ul>
                </div>


                <div class="col-md-10 ">
                <div class="text-capitalize d-flex justify-content-end align-items-end m-3">
                    <h3><?php echo $row['first_name']." ".$row['last_name']; ?> &nbsp; </h3>
                    <img src="<?php echo $row['dp_path']; ?>" style="width:40px;" class="rounded-pill">
                </div>
                    <div id="content" class="p-4 p-md-5 pt-5">
                        <div class="container mt-4 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card p-4">
                                        <h4 class="text-center">Change Profile Photo</h4>
                                        <form action="" enctype="multipart/form-data" method="POST">
                                            <div class="row gy-3 justify-content-center">
                                                <label for="pi" class="form-label mb-3 text-center">choose a squire image to use it as a profile image.</label>
                                                <input class="mb-3" type="file" name="post_image" id="pi" placeholder="Post Image"
                                                    required>
                                                <button type="submit" name="btnchange"
                                                    class="btn btn btn-outline-dark rounded-3 mb-5">Change</button>
                                            </div>
                                        </form>
                                        <div class="card-footer bg-light text-center">
                                            <p>this panel is just for admin to control the website data. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card p-4">
                                        <h4 class="text-center">Change Password</h4>
                                        <form action="" method="POST">
                                            <label for="cp" class=" mt-2 form-label">Current Password</label>
                                            <input type="password" class="form-control" id="cp" name="Txtcp"
                                                placeholder="Current Password" required>
                                            <label for="np" class=" mt-2 form-label">New Password</label>
                                            <input type="password" class="form-control" id="np" name="Txtnp"
                                                placeholder="New Password" required>
                                            <label for="np2" class=" mt-2 form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="np2" name="Txtnp2"
                                                placeholder="Confirm Password" required>
                                            <input class=" mt-2 mb-2 btn btn-outline-dark rounded-3"
                                                name="BtnChangePass" type="submit" value="Change Password">
                                        </form>
                                        <div class="card-footer bg-light text-center">
                                            <p>this panel is just for admin to control the website data. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card p-4">
                                        <h4 class="text-center">Profile</h4>
                                        <?php
                                            $user = $_SESSION["username"];
                                            $output = "SELECT * FROM `staff` WHERE `username` = '$user' ";
                                            $result2 = mysqli_query($conn, $output);
                                            if($result2)
                                            {
                                                while($row = $result2->fetch_assoc()):
                                        ?>
                                                <img src="<?php echo $row['dp_path']; ?>" class="img-fluid img-thumbnail mx-auto d-block" alt="">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title"><?php echo $row['first_name']. " " . $row['last_name']; ?></h5>
                                                    <span class="<?php if($row['status'] == "Active") {echo "badge bg-success";}else{echo "badge bg-danger";}?>">
                                                        <?php echo $row['status']?></span>
                                                </div>
                                        <?php endwhile; 
                                            }		
                                        ?>
                                        <div class="card-footer bg-light text-center">
                                            <p>this panel is just for admin to control the website data. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="../js/jquery.min.js"></script>
                        <script src="../js/popper.js"></script>
                        <script src="../js/bootstrap.min.js"></script>
                        <script src="../js/main.js"></script>
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