<?php
session_start();
if($_SESSION["username"] == 'admin')
{
    include("../includes/DatabaseHelper.php");
    if(isset($_POST['BtnChangePass']))
    {
        $current_password = $_POST['Txtcp'];
        $new_password = $_POST['Txtnp'];
        $new_password2 = $_POST['Txtnp2'];
        $username = "admin";
        $query = $conn->prepare("SELECT * FROM admin_login where username = ?");
        $query->bind_param("s",$username);
        $query->execute();
        $query_result = $query->get_result();
        if($query_result->num_rows > 0)
        {
          $data = $query_result->fetch_assoc();
          if($data['password'] === $current_password)
          {
            if($new_password === $new_password2)
            {
              $query2 =$conn->prepare("UPDATE admin_login SET password = '$new_password' where username = 'admin'");
              $query2->execute();
                    ?>
<script>
alert('Password is changed');
Window.location.href = "settings.php";
</script>
<?php
            }
            else
            {
              ?>
<script>
alert('Password Does not match');
Window.location.href = "settings.php";
</script>
<?php
            }
          }
          else
          {
            ?>
<script>
alert('Invalid Current Password');
Window.location.href = "settings.php";
</script>
<?php
          }
        }

    }
?>
<!doctype html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="row vh-100">
        <div class="col-md-2" style="background-color:#1b395f;">
            <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px">
            <ul class="nav nav-pills flex-column">"
                <li class="nav-item">
                    <a class="nav-link  text-white" href="dashboard.php"><span
                            class="fa fa-home mr-3"></span>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="staff.php"><span
                            class="fa fa-people-line mr-3"></span>Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="orders.php"><span
                            class="fa fa-clipboard-list mr-3"></span>Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="customer.php"><span
                            class="fa fa-people-line mr-3"></span>Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="gallery.php"><span class="fa fa-images mr-3"></span>Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="feedback.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="news.php"><span class="fa fa-square-rss mr-3"></span>News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="messages.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="newsletter.php"><span class="fa fa-envelope mr-3"></span>News
                        Letter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="settings.php"><span class="fa fa-gear mr-3"></span>Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div id="content" class="p-4 p-md-5 pt-5">
                <div class="container mt-4 mb-4">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="card p-4">
                                <h4 class="text-center">Change Password</h4>
                                <form action="" method="POST">
                                    <label for="cp" class=" mt-2 form-label">Current Password</label>
                                    <input type="password" class="form-control" id="cp" name="Txtcp"
                                        placeholder="Current Password" required>
                                    <label for="np" class=" mt-2 form-label">New Password</label>
                                    <input type="password" class="form-control" id="np" name="Txtnp"
                                        placeholder="New Password" required>
                                    <label for="np2" class=" mt-2 form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="np2" name="Txtnp2"
                                        placeholder="Confirm Password" required>
                                    <input class=" mt-2 mb-2 btn btn-outline-dark rounded-3" name="BtnChangePass"
                                        type="submit" value="Change Password">
                                </form>
                                <div class="card-footer bg-light text-center">
                                    <p>this panel is just for admin to control the website data. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>

                <script src="../js/jquery.min.js"></script>
                <script src="../js/popper.js"></script>
                <script src="../js/bootstrap.min.js"></script>
                <script src="../js/main.js"></script>
            </div>
        </div>
</body>

</html>
<?php
}
else
{
    header("location:index.php");
}
?>