<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"] == 'admin')
{
    $update = false;
    $news= '';
    if(isset($_REQUEST['Btnsubmit']))
    {
        $pNews = $_REQUEST['Txtnews'];
        $Query = "INSERT INTO news". 
        "(post_news)". 
        " VALUE ". 
        "('$pNews')";
        $confirm_status = mysqli_query($conn, $Query);
        if($confirm_status)
        {
            header("location: News.php");
        }
    }
    if(isset($_GET['delete']))
    {
        $del = $_GET['delete'];
        $delquery = "DELETE FROM news WHERE id = '$del' ";
        $confirm_status = mysqli_query($conn, $delquery);
        if($confirm_status)
        {
          header("location: news.php");
        }
    }
    if(isset($_GET['edit']))
    {
        $ed = $_GET['edit'];
        $update = true;
        $editquery = "SELECT * FROM news WHERE id = $ed ";
        $edit = mysqli_query($conn, $editquery);
        if($edit)
        {
            $row = $edit->fetch_array();
            $news = $row['post_news'];
        }
    }
    if(isset($_REQUEST['Btnupdate']))
    {
        $pNews = $_REQUEST['Txtnews'];
        $updatequery = "UPDATE news SET post_news = '$pNews' WHERE id = '$ed' ";
        $updated = mysqli_query($conn, $updatequery);
        if($updated)
        {
            header("location: news.php");
        }
        else
        {
            echo "connection error" . mysqli_connect_error();
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
    <div class="row vh-100">
        <div class="col-md-2" style="background-color:#1b395f;">
            <img class="justify-content-center mt-3 img-fluid" src="../images/logo1.png" alt="" height="60px">
            <ul class="nav nav-pills flex-column">"
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
                    <a class="nav-link active" href="news.php"><span class="fa fa-square-rss mr-3"></span>News</a>
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
                <h2 class="mb-4">Post News</h2>
                <div class="container">
                    <form action="#" method="POST">
                        <div class="row gy-3 justify-content-center">
                            <label for="pn" class="form-label mt-2">News</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="pn" name="Txtnews"
                                    value="<?php echo $news ?>" placeholder="POST News" required>
                            </div>
                            <div class="col-md-3">
                                <?php
                        if($update)
                        {
                            ?>
                                <button class="btn btn btn-outline-dark rounded-3" name="Btnupdate"
                                    type="submit">Update</button>
                                <?php
                        }
                        else
                        {
                            ?>
                                <button class="btn btn btn-outline-dark rounded-3" name="Btnsubmit"
                                    type="submit">Post</button>
                                <?php
                        }
                            ?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-4 ms-5 mb-4">
                    <h3 class="title">Live News</h3>
                </div>
                <?php
        $Query2 ="SELECT * FROM `news`";
        $result = mysqli_query($conn ,$Query2);
        if($result)
        {
    ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>News</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                        while($row = $result->fetch_assoc()):
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['post_news']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="news.php?edit=<?php echo $row['id']; ?>">Edit</a>
                                    <a class="btn btn-danger"
                                        href="news.php?delete=<?php echo $row['id']; ?>">Delete</a>
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