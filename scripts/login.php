<?php
    ob_start();
    include_once('db.php');

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";

        $result = mysqli_query($connection, $query);

        if($result){
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    if($row['role'] == 'admin'){
                        session_start();
                        $user_id = $row['user_id'];
                        $_SESSION['user_id'] = $user_id;
                        header('location: ../admin/index.php');
                    }
                    else {
                        header('location: ../index.php');
                    }                    
                }
            }
            else {
                header('location: ../index.php');
            }            
        }
        else {
            header('location: ../index.php');
        }
    }

?>