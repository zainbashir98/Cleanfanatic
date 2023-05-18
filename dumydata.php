<?php
            $firstname = "test";
            $lastname ="person";
			$username = "username";
			$gender = "male";
			$dp_path = "..\gallery\doctor2.PNG";
			$email = "person@xyz.com";
			$status = "active";
			$dob = "10-10-2001";
			$phone = "0300";
            $i =1;
            while($i<=10):
			$query = "INSERT INTO `staff`(`first_name`, `last_name`, `username`, `gender`, `dp_path`, `email`, `status`, `dob`, `phone`) VALUES ('$firstname','$lastname.$i','$username.$i','$gender','$dp_path','$email','$status','$dob','$phone.$i')";
			$result = mysqli_query($conn, $query);
            if($result){
                echo $i. "entry done";
            }
            endwhile;

?>