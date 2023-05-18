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
            <a class="nav-link active" href="aboutus.php">About us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="contactus.php">Contact us</a>
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

<body>
    <div class="container-fluid mt-4 mb-4" style="background-color: #F9FBFF; color: #1A3066;">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center text-center align-items-center mt-5 mb-5">
                <h1><b>Get in touch with CleanFanatic</b></h1>
                <h2 class="m-4">For Business and and Question you can contact us.</h2>
                <a class="btn btn-lg btn-light" value="Get in Touch" href="contactus.php"
                    style="border-color: #1A3066;">Get in Touch</a>
            </div>
            <div class="col-md-6 mt-5 mb-5">
                <img class=" image-fluid" src="../images/logo1.png" alt="" style="width:100%">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <img src="../images/doctor3.png" alt="" style="width:300px; height: 300px" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2>Name</h2>
                <p>Co-owner</p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <img src="../images/doctor3.png" alt="" style="width:300px; height: 300px" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2>Name</h2>
                <p>Co-owner</p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <img src="../images/doctor3.png" alt="" style="width:300px; height: 300px" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2>Name</h2>
                <p>Co-owner</p>
            </div>
        </div>
    </div>
    <h2 class="text-center">Rates</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>Sanitizing</b></h3>
                    <p style="color: #1A3066;">10$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>Kill Bugs</b></h3>
                    <p style="color: #1A3066;">15$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>roof Cleaning</b></h3>
                    <p style="color: #1A3066;">12$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>floor scrubbing</b></h3>
                    <p style="color: #1A3066;">10$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>Mold and Mildew Removal</b></h3>
                    <p style="color: #1A3066;">15$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>Rust Removal</b></h3>
                    <p style="color: #1A3066;">12$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>lawn mowing</b></h3>
                    <p style="color: #1A3066;">12$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>water jetspray cleaning</b></h3>
                    <p style="color: #1A3066;">12$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
        </div>
    </div>
</body>



<!-- footer........................ -->
<?php
include '../includes/footer.php';
}
else
{
    header("location:signin.php");
}
?>