<?php 
    ob_start();
    session_start();
    if(isset($_SESSION['user_id'])){
        session_destroy();
        header('location: ../../index.php');
    }
?>