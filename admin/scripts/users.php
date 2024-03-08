<?php 
    function showUsers(){
        global $connection;
        $query = "SELECT * FROM users";

        $result = mysqli_query($connection, $query);

        if($result) {
            while($row=mysqli_fetch_assoc($result)){

                $status = 'Inactive';

                if($row['status'] == 1){
                    $status = 'Active';
                }
                else {
                    $status = 'Inactive';
                }

                echo "<tr>".
                        "<td>{$row['user_id']}</td>".
                        "<td>{$row['username']}</td>".
                        "<td>{$row['firstname']}</td>".
                        "<td>{$row['lastname']}</td>".
                        "<td>{$row['email']}</td>".
                        "<td><img width='100' src='./images/{$row['image']}'</td>".
                        "<td>{$row['role']}</td>".
                        "<td>{$status}</td>".
                        "<td>{$row['created_on']}</td>".
                        "<td>".
                            "<a href='edit_user.php?edit={$row['user_id']}'>".
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
            $query = "INSERT INTO users(username, password, firstname, lastname, email, image, role, status, created_on)";
            $query .= "VALUES('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}', '{$image}', '{$role}', 0, '{$today}')";

            $result = mysqli_query($connection, $query);
            if(!$result){
                die("Post could not be added to the database." . mysqli_error());
            }
        }   
    }

    function editUser(){
        global $connection;
        global $user;

        if(isset($_GET['edit']) && $_GET['edit']!=''){
            $user_id = $_GET['edit'];
            $query = "SELECT * FROM users WHERE user_id=$user_id";

            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $user = $row;
                }
            }
            else {
                header('Location:users.php');
            }
        }
        else {
            header('Location:users.php');
        }

        if(isset($_POST['update'])){

            $user_id        = $_POST['user_id'];
            $username       = mysqli_real_escape_string($connection, $_POST['username']);
            $password       = $_POST['password'];
            $firstname      = mysqli_real_escape_string($connection, $_POST['firstname']);
            $lastname       = mysqli_real_escape_string($connection, $_POST['lastname']);
            $email          = $_POST['email'];
            $role           = $_POST['role'];
            $c_image        = $_POST['current_image'];
            $image          = $_FILES['image']['name'];
            $image_tmp      = $_FILES['image']['tmp_name'];
            $status         = $_POST['status'];

            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "password = '$password', ";
            $query .= "firstname = '$firstname', ";

            if(!empty($image)){
                move_uploaded_file($image_tmp, "./images/$image");
                if(!empty($c_image)) { unlink('./images/'.$c_image); }
                $query .= "image = '$image', ";
            }
            
            $query .= "lastname = '$lastname', ";
            $query .= "email = '$email', ";
            $query .= "role = '$role', ";
            $query .= "status = '$status' ";
            $query .= " WHERE user_id=$user_id";

            echo $query;

            $result = mysqli_query($connection, $query);

            if($result){
                header("Location: edit_user.php?edit={$user_id}");
            }
           
        }
    }

    function deleteUser(){
        global $connection;
        if(isset($_GET['delete']) && !empty($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id={$id}";

            $result = mysqli_query($connection, $query);

            if($result){
                header('Location:users.php');
            }
        }        
    }

?>






