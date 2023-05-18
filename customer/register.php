<?php
    include("../includes/DatabaseHelper.php");
    if(isset($_POST['btnsignin']))
    {
        $firstname = $_POST['Txtfirstname'];
        $lastname = $_POST['Txtlastname'];
        $email = $_POST['Txtemail'];
        $password = $_POST['Txtpassword'];
        $imgname = $_FILES['upload_image']['name'];
        $imgtmpname = $_FILES['upload_image']['tmp_name'];
        $imgloc = 'images/';
        move_uploaded_file($imgtmpname, $imgloc.$imgname);
        $dp_path = $imgloc.$imgname;
        $gender = $_POST['Txtgender'];
        $address = $_POST['Txtaddress'];
        $phone = $_POST['Txtphone'];
        $query = "INSERT INTO `customer`(`first_name`, `last_name`, `username`,`password`, `gender`, `dp_path`, `email`, `phone`, `address`) VALUES ('$firstname','$lastname','$firstname.$lastname','$password','$gender', '$dp_path', '$email','$phone','$address')";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            header("location: Signin.php");
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#ECEFF7 ;">
    <div class="container mt-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card rounded-3 ">
                    <div class="row">
                        <div class="col-md-6" style="background-color:#862DEC;">
                            <div class="container">
                                <div class="m-5"></div>
                                <div class="text-center mt-4">
                                    <h2 class="text-white"><b>Sign Up</b></h2>
                                </div>
                                <div class="justify-content-center align-center">
                                    <form action="" method="POST" enctype="multipart/form-data" class="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-white" for="firstname">First Name</label>
                                                <input type="text" class="form-control" name="Txtfirstname"
                                                    placeholder="Firstname">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-white" for="lastname">Last Name</label>
                                                <input type="text" class="form-control" name="Txtlastname"
                                                    placeholder="Lastname">
                                            </div>
                                        </div>
                                        <label class="text-white mt-2" for="Email">Email</label>
                                        <input type="text" class="form-control" id="Email" name="Txtemail"
                                            placeholder="email">
                                        <label class="text-white mt-2" for="gender">Gender</label>
                                        <select id="gender" name="Txtgender" class="form-control rounded-3">
                                            <option Value="">Gender</option>
                                            <option Value="Male">Male</option>
                                            <option Value="Female">Female</option>
                                            <option Value="Other">Other</option>
                                        </select>
                                        <label for="image" class="form-label text-white  mt-2">Profile Image</label>
                                        <input class="text-white" type="file" name="upload_image" id="image" required>
                                        <label class="text-white mt-2" for="Password">Password</label>
                                        <input type="Password" class="form-control" name="Txtpassword"
                                            placeholder="Password">
                                        <label class="text-white mt-2" for="address">Address</label>
                                        <input type="text" class="form-control" name="Txtaddress" placeholder="Address">
                                        <label class="text-white mt" for="Phone">Phone</label>
                                        <input type="tel" class="form-control" name="Txtphone" placeholder="Phone">
                                        <input type="submit" style="color: #862DEC;" class="mt-4 btn btn-light" Value="Sign Up"
                                            name="btnsignin">
                                    </form> `
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bg-white">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <img src="../images/logo1.png" alt="" class="m-5 p-3 img-fluid">
                                <h2 class="text-center" style="color: #862DEC;"><b>Registration</b></h2>
                                <p class="m-4" style="color: #862DEC;">
                                    <b>For new User</b> to get cleaning Services pleace register to our site and sign in
                                    and
                                    place your order for your house get new again.
                                </p>
                                <p style="color: #862DEC;"><b>IF you already have an account click sign in</b></p>
                                <div class="row text-center d-flex justify-content-center align-items-center">
                                    <div class="col-md-4">
                                        <a href="Signin.php" class="btn btn-light mb-5" style="color: #862DEC;">Sign in</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>