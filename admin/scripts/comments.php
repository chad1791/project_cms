<?php

    function getAllComments(){
        global $connection;
        $query = "SELECT * FROM comments";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>".
                "<td>{$row['comment_id']}</td>".
                "<td>{$row['author_id']}</td>".
                "<td>{$row['content']}</td>".
                "<td>{$row['author_email']}</td>".
                "<td>{$row['status']}</td>".
                "<td>{$row['post_id']}</td>".
                "<td>{$row['date']}</td>".
                "<td>".
                    "<a href='comments.php?approve={$row['post_id']}'>".
                        "<button class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Approve'><i class='fa fa-check-square-o'></i></button>".
                    "</a>".
                    "&nbsp;&nbsp;".
                    "<a href='comments.php?unapprove={$row['post_id']}'>".
                    "<button class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Unapprove'><i class='fa fa-square-o'></i></button>".
                    "</a>".
                    "&nbsp;&nbsp;".
                    "<a href='comments.php?delete={$row['post_id']}'>".
                        "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                    "</a>".
                "</td>".
              "</tr>";
            }
        }
    }
?>