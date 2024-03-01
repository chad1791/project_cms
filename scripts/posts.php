<?php 
    ob_start();
    function showAllPosts(){
        global $connection;

        $query = "SELECT * FROM posts";

        $result = mysqli_query($connection, $query);

        if($result){
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
    }

    function getPostById(){
        global $connection;
        global $post;
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $post_id = $_GET['id'];
            $query = "SELECT * FROM posts WHERE post_id={$post_id}";
            $result = mysqli_query($connection, $query);

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){ 
                    $post = $row;
                }
            }
            else {
                header('Location: index.php');
            }
        }  
        else {
            header('Location: index.php');
        }
    }

    function addComment(){
        if(isset($_POST['addComment'])){            
            global $connection;
            $post_id = $_GET['id'];
            $author = $_POST['author'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];

            $query = "INSERT INTO comments (post_id, author_id, author_email, content) VALUES('$post_id','$author','$email','$comment')";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die('Error adding comment to the database. '.mysqli_error($connection));
            }
        }
    }

?>