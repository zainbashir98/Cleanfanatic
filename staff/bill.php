<?php
    include("../includes/DatabaseHelper.php");
    session_start();
    if($_SESSION["username"])
    {   
        $user = $_SESSION["username"];
        $output = "SELECT * FROM `staff` WHERE `username` = '$user' ";
		$result2 = mysqli_query($conn, $output);
		$row = $result2->fetch_assoc();
        $detail = $_GET['pay'];
        if(isset($_POST['btngene']))
        {
            $hours = $_POST['Txthours'];
            $price = $_POST['Txtprice'];
            $charges = $price*$hours;
            $q3 = "UPDATE `orders` SET `charges` = '$charges' WHERE `order_id`='$detail' ";
            $result = mysqli_query($conn, $q3);
        }
        $output2 = "SELECT * FROM `orders` WHERE order_id = '$detail';";
        $result = mysqli_query($conn, $output2);
        if($result)
        {
            $data = $result->fetch_assoc();

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
                    <a class="nav-link active" href="orders.php"><span class="fa fa-home mr-3"></span>Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="settings.php"><span class="fa fa-home mr-3"></span>Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><span
                            class="fa fa-right-from-bracket mr-3"></span>Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-end align-items-end m-3">
                <h3><?php echo $row['first_name']." ".$row['last_name']; ?> &nbsp; </h3>
                <img src="<?php echo $row['dp_path']; ?>" style="width:40px;" class="rounded-pill">
            </div>
            <a href="orders.php" class="btn btn-dark">Back</a>
            <h2 class="m-4">Bill Details</h2>
            <div class="row">
                <div class="col-md-6">
                    <p class=" form-group text-black ms-5">
                        <?php echo $data['services'] ?>
                    </p>
                    <h4>Generate bill</h4>
                    <form action=""  method="post">
                    <label for="hours" class="form-label mt-2">No. of Hours</label>
                    <input type="number" class="form-control" id="hours" name="Txthours" value="" placeholder="hours" required></input>
                    <label for="price" class="form-label mt-2">No. of Hours</label>
                    <input type="number" class="form-control" id="price" name="Txtprice" value="$" placeholder="Rate Per Hour" required></input>
                    <input type="submit" class="btn btn-primary mt-3" value="Generate" name="btngene">
                    </form>
                </div>
                <div class="col-md-3">
                <div id="bill" class="bg-light">
                    <h2 class="text-center border-bottom">Bill</h2>
                    <p class="text-end"><b>Date: </b><?php echo $data['date'] ?></p>
                    <h4 class="border-bottom"><b>Services</b></h4>
                    <p class="text-black ms-5">
                        <?php echo $data['services'] ?>
                    </p>
                    <h4 class="border-top"><b>Charges:</b></h4>
                    <p><b>$<?php echo $data['charges'] ?></b></p>
                </div>
                <button class="btn btn-primary" onclick="generateBill()">Print Bill</button>
            </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script>
        function generateBill()
        {
            var element = document.getElementById('bill');
            html2pdf(element, {
            margin:       60,
            filename:     'Bill.pdf',
            html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            });
        }
        
</script>
</body>

</html>
<?php
}
    }
else
{
    header("location:index.php");
}
?>