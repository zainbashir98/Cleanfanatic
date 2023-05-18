<!-- header........................ -->
<?php
include 'extras/header.php';
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
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <img src="images/doctor3.png" alt="" style="width:300px; height: 300px" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2>Name</h2>
                <p>Co-owner</p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <img src="images/doctor3.png" alt="" style="width:300px; height: 300px" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2>Name</h2>
                <p>Co-owner</p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-4">
                <img src="images/doctor3.png" alt="" style="width:300px; height: 300px" class="img-fluid">
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
                <h3><b>Regular Cleaning</b></h3>
                    <p style="color: #1A3066;">10$ per hour</p>
                    <a class="btn btn-lg btn-light" value="Get in Touch" href="order.php"
                    style="border-color: #1A3066;"><b>Book Now</b></a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="shadow-sm p-3 mb-5  text-center d-flex flex-column" style="background-color: #F9FBFF; color: #1A3066; border-radius: 1rem;">
                <h3><b>weekends Cleaning</b></h3>
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
        </div>
    </div>
</body>



<!-- footer........................ -->
<?php
include 'includes/footer.php';
?>
