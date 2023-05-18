<!-- header........................ -->
<?php
include 'extras/header.php';
include("includes/DatabaseHelper.php");
if(isset($_POST['btnmsg']))
{
    $name =  $_POST['Txtname'];
    $email =  $_POST['Txtemail'];
    $msg =  $_POST['Txtmsg'];
    $query = "INSERT INTO `email`(`name`, `email`, `message`) VALUES ('$name','$email','$msg')";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header("location: contactus.php");
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
            <a class="nav-link active" href="contactus.php">Contact us</a>
        </li>
    </ul>
    <form class="d-flex">
        <a class="text-primary btn btn-outline-primary" href="customer/signin.php">SignIn/SignUp</a>
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
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center m-5">
                <h1><b>Get in touch with CleanFanatic</b></h1>
                <h2 class="m-4">For Business and and Question you can contact us.</h2>
                <input class="btn btn-lg btn-light" onClick="document.getElementById('Viewemail').scrollIntoView();"
                    value="Get in Touch" style="border-color: #1A3066;"></input>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="container text-center m-5">
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
include 'includes/footer.php';
?>