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

    function showCategories(){
        global $connection;
        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>".
                        "<td>{$row['category_id']}</td>".
                        "<td>{$row['title']}</td>".
                        "<td>".
                            "<a href='edit_category.php?edit={$row['category_id']}'>".
                                "<button class='btn btn-primary'><i class='fa fa-pencil'></i></button>".
                            "</a>".
                            "&nbsp;&nbsp;".
                            "<a href='categories.php?delete={$row['category_id']}'>".
                                "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                            "</a>".
                        "</td>".
                      "</tr>";
            }
        }
    }

?>