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
        if(isset($_POST['btnmsg']))
        {
            $name = $_POST['Txtname'];
            $email = $_POST['Txtemail'];
            $msg = $_POST['Txtmsg'];
            $msgQuery = "INSERT INTO `email`(`name`, `email`, `message`) VALUES ('$name','$email','$msg')";
            
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
            <a class="nav-link active" href="contactus.php">Contact us</a>
        </li>
    </ul>
    <form class="d-flex">
        <div class="dropdown">
            <button type="button" class="btn btn-white dropdown-toggle text-capitalize"  data-bs-toggle="dropdown">
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
                <input class="btn btn-lg btn-light" onClick="document.getElementById('Viewemail').scrollIntoView();"
                    value="Get in Touch" style="border-color: #1A3066;"></input>
            </div>
            <div class="col-md-6 mt-5 mb-5">
                <img class=" image-fluid" src="../images/logo1.png" alt="" style="width:100%">
            </div>
        </div>
    </div>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-4">
                <div class="shadow-sm p-3 mb-5 bg-body text-center d-flex flex-column"
                    style="color: #5FCFE1; border-radius: 1rem;">
                    <i class="fa-solid fa-6x fa-envelope"></i>
                    <h4 style="color: black"><b>Email</b></h4>
                    <a href="mailto: Cleanfanatic@gmail.com" style="color: black">Cleanfanatic@gmail.com</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow-sm p-3 mb-5 bg-body text-center d-flex flex-column"
                    style="color: #5FCFE1; border-radius: 1rem;">
                    <i class="fa-solid fa-6x fa-location-dot"></i>
                    <h4 style="color: black"><b>Location</b></h4>
                    <p class="text-black"> 2-KM, Renala Khurd - Okara Road, G.T. Road <br>Okara<br>N-5، Okara, Punjab
                        56300</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow-sm p-3 mb-5 bg-body text-center d-flex flex-column"
                    style="color: #5FCFE1; border-radius: 1rem;">
                    <i class="fa-solid fa-6x fa-mobile-screen-button"></i>
                    <h4 style="color: black"><b>Phone</b></h4>
                    <a href="tel:123-456-7890" style="color: black">123-456-7890</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12204.094338513101!2d73.57272918248177!3d30.86824435389077!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe8cb8b2de7d006fd!2sUniversity%20of%20Okara!5e0!3m2!1sen!2s!4v1658810569037!5m2!1sen!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <h2 class="text-center" id="Viewemail">Email Us</h2>
    <div class="row d-flex flex-column justify-content-center align-content-center">
        <div class="col-md-6">
            <form class="form container" action="" method="post">
                <label for="name" class=" mt-2 form-label">Name</label>
                <input type="text" class="form-control" id="name" name="Txtname" placeholder="Name" required>
                <label for="email" class=" mt-2 form-label">Email</label>
                <input type="email" class="form-control" id="email" name="Txtemail" placeholder="Email" required>
                <label for="message" class=" mt-2 form-label">Message</label>
                <textarea id="msg" class="form-control" name="Txtmsg" placeholder="Enter Your Massage"></textarea>
                <input type="submit" class="btn btn-primary mt-4" value="Submit" name="btnmsg">
            </form>
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