<?php 

    define("SERVER", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "sudoadmin");
    define("DATABASE", "cms");

    $connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

    if(!$connection){
        die("Unable to establish a connection with the database... " .mysqli_error($connection));
    }
    // else {
    //     echo 'connection was successful!';
    // }

?>