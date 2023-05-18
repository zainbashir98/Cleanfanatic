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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
<div class="bg-image image-fluid" style="background-image: url('../images/bgimage.jpg'); height: 400px;">
    <div class="mask w-100 h-100 d-flex flex-column justify-content-center align-items-center"
        style="background-color: rgba(0, 0, 0, 0.6)">
        <img src="../images/logo1.png" alt="" class="m-5  img-fluid">
        <p class="text-center text-white ">Clean Fanatic has provided quality services to clients by providing them with
            the professional care they deserve. <br> Get in Service order today to get our Homes cleaned. <br></p>
        <a href="order.php" class="text-white btn btn-lg btn-outline-light mb-4">Book Now!</a>
    </div>
</div>
<h2 class="m-4 text-center">News</h2>
<?php
            $Query2 ="SELECT * FROM `news`";
            $result = mysqli_query($conn ,$Query2);
            if($result)
            {
        ?>
<div class="container">

    <?php
                            while($row = $result->fetch_assoc()):
                        ?>
    <div class="alert" style="background-color: #e5d6fa;">
        <strong>NEWS! </strong><?php echo $row['post_news']; ?>
    </div>
    <?php
                            endwhile;
                        }
                        ?>
    </table>
</div>
<div class="container-fluid mt-4 mb-4" style="background-color: #F9FBFF">
    <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center text-center align-items-center"
            style="color: #1A3066;">
            <h2><b>About Us</b></h2>
            <p class="m-4" style="color: black;">Our mission at Magic Cleaning Group is simple: to provide
                high-quality services
                for our valued clients. Our team goes above and beyond to cater to each project’s specific needs.
                Through open communication and exceptional service, we hope you’ll find what you’re looking for with our
                Home Cleaning Services. For more information or general inquiries, get in touch today.</p>
            <a class="btn btn-lg btn-outline-light" style="border-color: #1A3066;">Learn More</a>
        </div>
        <div class="col-md-6">
            <img class=" image-fluid" src="../images/aboutside.jpg" alt="" style="width:100%">
        </div>
    </div>
</div>
<div class="bg-image image-fluid" style="background-image: url('../images/homeimage.jpg'); height: 400px;">
    <div class="mask w-100 h-100 d-flex flex-column justify-content-center align-items-center"
        style="background-color: rgba(0, 0, 0, 0.6)">
        <h2 class="text-white">Why Choose Us at CleanFanatic</h2>
        <p class="container text-center text-white">There are plenty of reasons to choose, and love, MaidPro House
            Cleaning. Maybe it’s because we work with you to build a cleaning plan, tailored to your needs and budget.
            Or because our cleaning PROs are not only expertly trained to provide the highest quality clean, but they’re
            pretty great people too. No matter the reason, at the end of the day cleaning is our passion and it’s what
            we bring to each and every home we touch. </p>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-content-center">
        <div class="col-md-6">
            <div class="row g-0">
                <div class="col-md-2 me-4">
                    <img src="../images/p1.png" class="border border-primary mx-auto d-block" alt="..."
                        style="border-radius: 1rem; width:90px; height:90px">
                </div>
                <div class="col-md-8">
                    <h5 class="text-primary">PROFESSIONALLY TRAINED</h5>
                    <p class="text-primary">Our PROs gain experience through hands-on training and our MaidPro
                        University advanced online courses</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0">
                <div class="col-md-2 me-4">
                    <img src="../images/p2.png" class="border border-primary mx-auto d-block" alt="..."
                        style="border-radius: 1rem; width:90px; height:90px">
                </div>
                <div class="col-md-8">
                    <h5 class="text-primary">CONSUMER PROTECTION</h5>
                    <p class="text-primary">Our PROs and bonded and insured, guaranteeing protection for homeowners.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-content-center">
        <div class="col-md-6">
            <div class="row g-0">
                <div class="col-md-2 me-4">
                    <img src="../images/p3.png" class="border border-primary mx-auto d-block" alt="..."
                        style="border-radius: 1rem; width:90px; height:90px">
                </div>
                <div class="col-md-8">
                    <h5 class="text-primary">SATISFACTION GUARANTEED</h5>
                    <p class="text-primary">If you are ever unhappy with your cleaning, we will re-clean at no
                        additional charge</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0">
                <div class="col-md-2 me-4">
                    <img src="../images/p4.png" class="border border-primary mx-auto d-block p-4" alt="..."
                        style="border-radius: 1rem;">
                </div>
                <div class="col-md-8">
                    <h5 class="text-primary">49 POINT CHECKLIST</h5>
                    <p class="text-primary">Our 49-Point Checklist™ is our signature service that ensures your entire
                        home will be cleaned, top to bottom.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<p class="text-center text-primary">What we do</p>
<h2 class="text-center">Our Services</h2>
<div style="background-color: #A9EBFF">
    <div class="container">
        <div class="row">

            <div class="col-md-3 mt-4 text-center text-dark">
                <h3>Power Washing</h3>
                <p class="text-dark">
                    Cleaning around your home’s exterior is an important step in general maintenance. It greatly
                    increases
                    the lifespan of all of the exterior materials of your home and property. Your home’s building
                    materials
                    are less likely to need replacement if kept clean and free of mold, mildew and all of the dirt and
                    contaminants that build up on your home’s exterior over time. Our service offering and our quality
                    are
                    second to none.
                </p>
            </div>
            <div class="col-md-3 mt-4 text-center text-dark">
                <h3>Gutter Cleaning</h3>
                <p class="text-dark">
                    Rain gutter cleaning is a dirty job, but it needs to be done by someone, and that is where McMahon’s
                    Jersey Shore Powerwash comes in. Many people attempt to save money by doing the job themselves, but
                    if you have actually ever cleaned up rain gutters you will soon realize it’s not worth it.
                </p>
            </div>
            <div class="col-md-3 mt-4 text-center text-dark">
                <h3>Dryer Vent Cleaning</h3>
                <p class="text-dark">
                    Clogged dryer vents are the cause of thousands of house fires annually. Because so many people don’t
                    know the signs of an obstruction in the vent, what seems like a small issue can have disastrous
                    results, including the loss of your home or even your life. You don’t want to take chances with your
                    home and family’s well being, so it’s important to call or use our form to get your free dryer vent
                    cleaning estimate today. Same day service, when available.
                </p>
            </div>
            <div class="col-md-3 mt-4 mb-4 text-center text-dark">
                <h3>Full Service</h3>
                <p class="text-dark">
                    We provide a wide array of powerwashing services to both residential and commercial entities.
                </p>
                <ul class="text-start">
                    <li>Roof Cleaning</li>
                    <li>Mold and Mildew Removal</li>
                    <li>Stucco, Masonry,Brick</li>
                    <li>Siding(Vinyl & Wood)</li>
                    <li>Concrete Driveways and Sidewalks</li>
                    <li>Fences and Desks</li>
                    <li>Rust Removal</li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid mt-4 mb-4" style="background-color: #F9FBFF">
    <div class="row">
        <div class="col-md-6">
            <img class=" image-fluid" src="../images/homeimage2.jpg" alt="" style="width:100%">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center text-center align-items-center">
            <h2>All home cleaning services include</h2>
            <ul class="text-start">
                <li>Sanitizing the bathroom – sink, tub, shower, toilet, and floor</li>
                <li>Vacuuming all rugs and carpets</li>
                <li>Sweeping and mopping floors</li>
                <li>Dealing with the trash including sorting your recycling for you</li>
                <li>Cleaning all surfaces</li>
            </ul>
        </div>

    </div>
</div>
<div class="bg-primary">
    <div class="container">
        <div class="row">
            <p class="text-center text-white mt-5 fs-4">How to get Started</p>
            <h2 class="text-center text-white"><b>SignIn and Book us in 60 Sec!</b></h2>
            <div class="col-md-4 mt-5">
                <i class="d-flex justify-content-center align-content-center fa-3x fa-solid fa-broom"
                    style="color: orange"></i>
                <h4 class="text-center text-white mt-2">Pick a cleaning type</h4>
                <p class="text-center text-white">Choose the service type that best fits your needs.</p>
            </div>
            <div class="col-md-4 mt-5">
                <i class="d-flex justify-content-center align-content-center fa-regular fa-3x fa-calendar"
                    style="color: orange"></i>
                <h4 class="text-center text-white mt-2">Pick a cleaning type</h4>
                <p class="text-center text-white">Choose the service type that best fits your needs.</p>
            </div>
            <div class="col-md-4 mt-5">
                <i class="d-flex justify-content-center align-content-center fa-3x fa-regular fa-heart"
                    style="color: orange"></i>
                <h4 class="text-center text-white mt-2">Pick a cleaning type</h4>
                <p class="text-center text-white">Choose the service type that best fits your needs.</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4 mb-4">
    <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center text-center align-items-center">
            <h1><b>CleanFanatic Best Cleaning Service arround</b></h1>
            <p class="text-black m-4">For Business and and Question you can massege us.</p>
            <a class="btn btn-lg btn-outline-dark">Get in Touch</a>
        </div>
        <div class="col-md-6">
            <img class=" image-fluid" src="../images/homeimage3.jpg" alt="" style="width:100%">
        </div>
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