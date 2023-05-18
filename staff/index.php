<?php
session_start();
include("../includes/DatabaseHelper.php");
if(isset($_POST['Btnlogin']))
{
    $username = $_POST['Txtusername'];
    $password = $_POST['Txtpassword'];
    $query = $conn->prepare("SELECT * FROM staff where username = ?");
    $query->bind_param("s",$username);
    $query->execute();
    $query_result = $query->get_result();
    if($query_result->num_rows > 0)
    {
        $data = $query_result->fetch_assoc();
        if($data['password'] === $password)
        {
            $_SESSION['username'] = $username;
            header('location: dashboard.php');
            die;
        }
        else
        {
            ?>
            <script>
            alert('Invalid Email or Password');
            Window.location.href="index.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
        alert('Invalid Email or Password');
        Window.location.href="index.php";
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/bootstrap.bundle.js"></script>
</head>
<body style="background-color:#1b395f ;">
<div class="container mt-4 mb-4" >
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
           <a href="index.php"><img class="justify-content-center img-fluid" src="../images/logo1.png" alt="logo"></a>
            <div class="card p-4" style="border-radius: 1rem; background-color: #e5d6fa;" >
                <h4 class="text-center">LOGIN</h4>
                <p class="text-center" style="color: black;">Enter your Username and Password to enter Staff Panel</p>
                <form action="" method="POST">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="Txtusername" placeholder="Username" required>
                        <label for="password" class=" mt-2 form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="Txtpassword" placeholder="Password" required>
                        <input class=" mt-2 btn btn-outline-dark rounded-3" name="Btnlogin" type="submit" value="Login">
                </form>
                <div class="card-footer text-center mt-4">
                    <p style="color: black;">this panel is just for Staff to control the website data. </p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
</html>