<?php 

    function showPosts(){
        global $connection;
        $query = "SELECT * FROM posts";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>".
                        "<td>{$row['post_id']}</td>".
                        "<td>{$row['author']}</td>".
                        "<td>{$row['title']}</td>".
                        "<td>{$row['post_cat_id']}</td>".
                        "<td>{$row['status']}</td>".
                        "<td><img width='140' src='../images/{$row['image']}'</td>".
                        "<td>{$row['tags']}</td>".
                        "<td>{$row['comments_count']}</td>".
                        "<td>{$row['date']}</td>".
                        "<td>".
                            "<a href='edit_category.php?edit={$row['post_id']}'>".
                                "<button class='btn btn-primary'><i class='fa fa-pencil'></i></button>".
                            "</a>".
                            "&nbsp;&nbsp;".
                            "<a href='categories.php?delete={$row['post_id']}'>".
                                "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                            "</a>".
                        "</td>".
                      "</tr>";
            }
        }
    }

?>