<?php

    function manageCategories(){      
        global $connection;  
        if(isset($_POST['submit'])){
            $title = $_POST['title'];

            if($title == "" || empty($title)){
                echo "This field should not be empty!";
            }
            else {
                $query = "INSERT INTO categories(title) VALUES('$title')";
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die("Error adding category to the database!");
                }
            }
        }

        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE category_id={$id}";
            $result = mysqli_query($connection, $query);

            if($result){
                header('Location: categories.php');
            }
        }
    }

?>