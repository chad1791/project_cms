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

?>






