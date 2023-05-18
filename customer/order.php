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
        if(isset($_POST['btnbook']))
        {
            $loc = $_POST['Txtloc'];
            $date = $_POST['Txtdate'];
            $services = $_POST['services'];
            foreach($services as $items)
            {
                $ser = $ser.$items."<br>";
            }
            echo $s;
            $id = $row['id'];
            $status = "in-query";
            $order_from =  $user;
            $payment = "pending";
            $q = "INSERT INTO `orders`(`id`, `order_from`, `address`, `payment`, `status`, `services`, `date`) VALUES ('$id','$order_from','$loc','$payment','$status','$ser','$date')";
            $qresult = mysqli_query($conn, $q);
            if($qresult)
            {
                header("location:order.php");
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

<body>
    <h2 class="text-center">Books Us Now</h2>
    <div class="row d-flex justify-content-center align-content-center">
        <div class="col-md-6">
        <form action="" method="post" class="form">
        <label for="loc" class="form-label mt-2">Location</label>
        <input type="text" class="form-control" id="loc" name="Txtloc" value="<?php echo $row['address'] ?>"
            placeholder="Address" required></input>
        <label for="date" class="form-label mt-2">Date</label>
        <input type="date" class="form-control" id="date" name="Txtdate" required></input>
        <label for="payment" class="form-label mt-2">Payment</label>
                                <select id="payment" name="Txtpayment" class="form-control rounded-3">
                                    <option Value="">Select</option>
                                    <option Value="">On Sight</option>
                                    <option>Credit Card (Coming Soon)</option>
                                </select>
        <label for="services" class="form-label mt-2">Services</label><br>
        <div class="form-group">
            <input type="checkbox" class="" id="services" name="services[]" value="Kill Bugs"> Kill Bugs</input>
            <input type="checkbox" class="" id="services" name="services[]" value="Sanitizing"> Sanitizing</input>
            <input type="checkbox" class="" id="services" name="services[]" value="roof Cleaning"> roof Cleaning</input>
            <input type="checkbox" class="" id="services" name="services[]" value="Mold and Mildew Removal"> Mold and
            Mildew Removal</input>
            <input type="checkbox" class="" id="services" name="services[]" value="Rust Removal"> Rust Removal</input>
            <input type="checkbox" class="" id="services" name="services[]" value="water jetspray cleaning"> water
            jetspray cleaning</input>
            <input type="checkbox" class="" id="services" name="services[]" value="lawn mowing"> lawn mowing</input>
        </div>
        <button class="btn btn-primary mt-2" type="submit" name="btnbook">Book</button>
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