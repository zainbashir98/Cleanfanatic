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
        if(isset($_POST['BtnChangePass']))
            {
                $current_password = $_POST['Txtcp'];
                $new_password = $_POST['Txtnp'];
                $new_password2 = $_POST['Txtnp2'];
                $query = $conn->prepare("SELECT * FROM customer where username = ?");
                $query->bind_param("s",$user);
                $query->execute();
                $query_result = $query->get_result();
                if($query_result->num_rows > 0)
                {
                $data = $query_result->fetch_assoc();
                if($data['password'] === $current_password)
                {
                    if($new_password === $new_password2)
                    {
                    $query2 =$conn->prepare("UPDATE customer SET password = '$new_password' where username = '$user'");
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
<div class="container mt-4 mb-4">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="card p-4 border-0">
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
                                    <input class=" mt-3 mb-2 btn btn-primary rounded-3" name="BtnChangePass"
                                        type="submit" value="Change Password">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
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