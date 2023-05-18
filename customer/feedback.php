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
        if(isset($_POST['btnfb']))
        {
            $feedback = $_POST['Txtfb'];
            $fb = "UPDATE `customer` SET `feedback` = '$feedback' WHERE `username` = '$user'";
		    $fbr = mysqli_query($conn, $fb);
            if($fbr)
            {
                header("location:feedback.php");
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
    <h2 class="text-center">Give Feedback</h2>
<?php
    if($row['feedback']=='NULL')
    {
?>
    <form action="" method="post">
        <label class="form-label" for="feedback">Feedback</label>
        <textarea id="msg" class="form-control" name="Txtfb" placeholder="Enter Your Feedback"></textarea>
        <input type="submit" class="btn btn-primary mt-4" value="Submit" name="btnfb">
    </form>
<?php
    }
    else
    {
    ?>
    <h4 class="text-center">You already submitted your Feedback. Thanks for your <b>Review</b></h4>
    <?php
    }
?>
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