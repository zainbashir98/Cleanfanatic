<?php
    include("DatabaseHelper.php");
?>
<?php
    if(isset($_REQUEST['BtnReg']))
    {
        $email = $_REQUEST['Txtemail'];
        $Query = "INSERT INTO newsletter_emails". 
        "(email)". 
        " VALUES ". 
        "('$email')";
        $confirm_status = mysqli_query($conn, $Query);
        if($confirm_status)
        {
?>
<script>
alert('Email is registered for News Letters');
Window.location.href = "";
</script>
<?php
        }
    }
?>
<div class="mt-4" style="background-color:#C6B1E3;">
    <footer class="container mt-4 text-white">
        <div class="row">
            <div class="col-md-3 mt-4">
                <div class="container">
                    <h5 class="mb-4">Opening hours</h5>

                    <table class="table text-white text-center">
                        <tbody class="fw-normal">
                            <tr>
                                <td>Mon - Thu:</td>
                                <td>8am - 9pm</td>
                            </tr>
                            <tr>
                                <td>Fri - Sat:</td>
                                <td>8am - 1am</td>
                            </tr>
                            <tr>
                                <td>Sunday:</td>
                                <td>9am - 10pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 mt-4 mb-4">
                <h5>Contacts</h5>
                <p class="container text-white" style="color: black;"><b>Phone Number:</b> +923XXXXXXXXX<br>
                    <b>Fax Number:</b> +923XXXXXXXXX<br>
                    <b>Email:</b> focuslearning@gmail.com<br>
                </p>
            </div>
            <div class="col-md-3 mt-4 mb-4">
                <h5>Social Media</h5>
                <div class="container">
                    <a href=http://www.instagram.com><i class="text-white fa-brands fa-2x fa-instagram"></i></a>
                    <a href=http://www.twitter.com><i class="text-white fa-brands fa-2x fa-facebook"></i></a>
                    <a href=http://www.facebook.com><i class="text-white fa-brands fa-2x fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-md-3 mt-4 mb-4">
                <h5>Sign Up</h5>
                <p class="text-white">Register for Newsletter here!</p>
                <form action="" name="EmailForm" method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="Txtemail" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <button type="submit" name="BtnReg" class="btn btn-outline-light btn-rounded">Register</button>
                </form>
            </div>
        </div>
</div>
<div class="text-black text-center p-3">
    © 2020 Copyright:
    <a class="text-black" href="index.php">cleanfanatic.com</a>
</div>
</footer>
</div>
</body>

</html>