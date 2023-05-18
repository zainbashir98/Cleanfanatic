<?php
session_start();
if($_SESSION["username"] == 'admin')
{
    include("../includes/DatabaseHelper.php");
    if(isset($_GET['delete']))
    {
        $del = $_GET['delete'];
        $delquery = "DELETE FROM newsletter_emails WHERE id = '$del' ";
        $confirm_status = mysqli_query($conn, $delquery);
        if($confirm_status)
        {
          header("location: newsletters.php");
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
    <div class="row">
        <div class="col-md-2" style="background-color:#1b395f;">
            <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px">
            <ul class="nav nav-pills flex-column vh-100">"
                <li class="nav-item">
                    <a class="nav-link text-white" href="dashboard.php"><span
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
                    <a class="nav-link active" href="newsletter.php"><span class="fa fa-envelope mr-3"></span>News
                        Letter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="settings.php"><span class="fa fa-gear mr-3"></span>Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Register emails for news letters</h2>
                <?php
        $Query2 ="SELECT * FROM newsletter_emails";
        $result = mysqli_query($conn ,$Query2);
        if($result)
        {
    ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Emails</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                        while($row = $result->fetch_assoc()):
                    ?>
                            <tr>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="newsletter.php?delete=<?php echo $row['id']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        endwhile;
                    }
                    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
<?php
}
else
{
    header("location:index.php");
}
?>