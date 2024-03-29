<?php
    ob_start();
    function getPostsByCategoryId(){
        global $connection;
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM posts WHERE post_cat_id={$id}";
            $result = mysqli_query($connection, $query);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){

                    $title = $row['title'];
                    $author = $row['author'];
                    $date = $row['date'];
                    $image = $row['image'];
                    $content = substr($row['content'], 0, 250);
    
                    echo '<h2>'.
                            '<a href="post.php?id='.$row['post_id'].'">'.$title.'</a>'.
                        '</h2>'.
                        '<p class="lead">'.
                            'by <a href="index.php">'.$author.'</a>'.
                        '</p>'.
                        '<p><span class="glyphicon glyphicon-time"></span> Posted on '.$date.'</p>'.
                        '<hr>'.
                        '<img class="img-responsive" src="images/'.$image.'" alt="">'.
                        '<hr>'.
                        '<p>'.$content.'</p>'.
                        '<a class="btn btn-primary" href="post.php?id='.$row['post_id'].'">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>'.
                        '<br/><br/><br/>';
                }
            }
            else {
                echo '<h2>No posts found!</h2>';
            }

        }
        else {
            header('Location: index.php');
        }
    }

?>