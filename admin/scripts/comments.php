<?php
    ob_start();
    function getAllComments(){
        global $connection;
        $query = "SELECT * FROM comments";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){

                $post_title = '';
                $query2 = "SELECT title FROM posts WHERE post_id={$row['post_id']}";
                $result2 = mysqli_query($connection, $query2);

                if($result2){
                    while($row2=mysqli_fetch_assoc($result2)){
                        $post_title = $row2['title'];
                    }
                }
                else {
                    $post_title = "Undefined";
                }

                echo "<tr>".
                "<td>{$row['comment_id']}</td>".
                "<td>{$row['author_id']}</td>".
                "<td>{$row['content']}</td>".
                "<td>{$row['author_email']}</td>".
                "<td>{$row['status']}</td>".
                "<td><a href='../post.php?id={$row['post_id']}'>{$post_title}</a></td>". 
                "<td>{$row['date']}</td>".
                "<td>".
                    "<a href='comments.php?approve={$row['comment_id']}'>".
                        "<button class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Approve'><i class='fa fa-check-square-o'></i></button>".
                    "</a>".
                    "&nbsp;&nbsp;".
                    "<a href='comments.php?unapprove={$row['comment_id']}'>".
                    "<button class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Unapprove'><i class='fa fa-square-o'></i></button>".
                    "</a>".
                    "&nbsp;&nbsp;".
                    "<a href='comments.php?delete={$row['comment_id']}'>".
                        "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                    "</a>".
                "</td>".
              "</tr>";
            }
        }
    }

    function approveComment(){
        global $connection;
        if(isset($_GET['approve']) && !empty($_GET['approve'])){
            $id = $_GET['approve'];
            $query = "UPDATE comments SET status = 'approved' WHERE comment_id={$id}";
            $result = mysqli_query($connection, $query);

            if($result){
                header('Location: comments.php');
            }
            else {
                die("Error changing comment status. ".mysqli_error($connection));
            }
        }
    }

    function unApproveComment(){
        global $connection;
        if(isset($_GET['unapprove']) && !empty($_GET['unapprove'])){
            $id = $_GET['unapprove'];
            $query = "UPDATE comments SET status = 'unapproved' WHERE comment_id={$id}";
            $result = mysqli_query($connection, $query);

            if($result){
                header('Location: comments.php');
            }
            else {
                die("Error changing comment status. ".mysqli_error($connection));
            }
        }
    }

    function deleteComment(){
        global $connection;
        if(isset($_GET['delete']) && !empty($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "DELETE FROM comments WHERE comment_id={$id}";

            $result = mysqli_query($connection, $query);
            if($result){
                echo $query;
                header('Location: comments.php');
            }
            else {
                die("Error deleting comment. ".mysqli_error($connection));
            }
        }
    }
?>