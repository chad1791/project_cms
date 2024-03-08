<?php 
    function showUsers(){
        global $connection;
        $query = "SELECT * FROM users";

        $result = mysqli_query($connection, $query);

        if($result) {
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>".
                        "<td>{$row['user_id']}</td>".
                        "<td>{$row['username']}</td>".
                        "<td>{$row['firstname']}</td>".
                        "<td>{$row['lastname']}</td>".
                        "<td>{$row['email']}</td>".
                        //"<td><img width='100' src='../images/{$row['image']}'</td>".
                        "<td>{$row['picture']}</td>".
                        "<td>{$row['role']}</td>".
                        "<td>{$row['status']}</td>".
                        "<td>{$row['created_on']}</td>".
                        "<td>".
                            "<a href='users.php?edit={$row['user_id']}'>".
                                "<button class='btn btn-primary'><i class='fa fa-pencil'></i></button>".
                            "</a>".
                            "&nbsp;&nbsp;".
                            "<a href='users.php?delete={$row['user_id']}'>".
                                "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                            "</a>".
                        "</td>".
                     "</tr>";
            }
        }

    }

    function addUser(){
        global $connection; 
        if(isset($_POST['addUser'])){
            $username     = $_POST['username'];
            $password     = $_POST['password'];
            $firstname    = $_POST['firstname'];
            $lastname     = $_POST['lastname'];
            $email        = $_POST['email'];
            $role         = $_POST['role'];
            $image        = $_FILES['image']['name'];
            $image_temp   = $_FILES['image']['tmp_name'];

            $timezone = new \DateTimeZone('America/Belize');			
	        $date = new \DateTime('@' . time(), $timezone);
	        $date->setTimezone($timezone);
	        $today = $date->format('Y-m-d H:i:s');	

            move_uploaded_file($image_temp, "./images/$image");
            $query = "INSERT INTO users(username, password, firstname, lastname, email, picture, role, status, created_on)";
            $query .= "VALUES('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}', '{$image}', '{$role}', 0, '{$today}')";

            $result = mysqli_query($connection, $query);
            if(!$result){
                die("Post could not be added to the database." . mysqli_error());
            }
        }   
    }

?>






