<?php
    session_start();
    include("../includes/DatabaseHelper.php");
    if(isset($_POST['btnsignin']))
    {
        $username = $_POST['Txtusername'];
        $password = $_POST['Txtpassword'];
        $query = $conn->prepare("SELECT * FROM customer where username = ?");
        $query->bind_param("s",$username);
        $query->execute();
        $query_result = $query->get_result();
        if($query_result->num_rows > 0)
        {
            $data = $query_result->fetch_assoc();
            if($data['password'] === $password)
            {
                $_SESSION['username'] = $username;
                header('location: index.php');
                die;
            }
            else
            {
                ?>
<script>
alert('Invalid Email or Password');
Window.location.href = "signin.php";
</script>
<?php
            }
        }
        else
        {
            ?>
<script>
alert('Invalid Email or Password');
Window.location.href = "signin.php";
</script>
<?php
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
                                <h2 class="text-center mt-4 text-white"><b>Sign in</b></h2>
                                <div class="text-center justify-content-center align-center">
                                    <p class="text-white">have a clean day. Sign in and order us now.</p>
                                    <form action="" class="form" method="POST">
                                        <label class="text-white" for="username"></label>
                                        <input type="text" class="form-control" name="Txtusername"
                                            placeholder="Email, Phone, Username" required>
                                        <label class="text-white" for="Password"></label>
                                        <input type="Password" class="form-control" name="Txtpassword"
                                            placeholder="Password" required>
                                        <input type="submit" class="mt-4 btn btn-light" name="btnsignin" style="color: #862DEC;" value="Sign in">
                                    </form>
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
                                <div class="row text-center d-flex justify-content-center align-items-center">
                                    <div class="col-md-4">
                                        <a href="register.php" class="btn btn-light mb-5" style="color: #862DEC;">Sign Up</a>
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