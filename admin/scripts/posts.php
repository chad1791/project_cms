<?php 

    function addPost(){
        global $connection;
        if(isset($_POST['submit'])){

            $category_id = $_POST['category'];
            $author      = $_POST['author'];
            $title       = $_POST['title'];
            $content     = $_POST['content'];
            $tags        = $_POST['tags'];
            $image       = $_FILES['image']['name'];
            $image_temp  = $_FILES['image']['tmp_name'];

            $timezone = new \DateTimeZone('America/Belize');			
	        $date = new \DateTime('@' . time(), $timezone);
	        $date->setTimezone($timezone);
	        $today = $date->format('Y-m-d H:i:s');	

            move_uploaded_file($image_temp, "../images/$image");
            $query = "INSERT INTO posts(post_cat_id, title, author, date, image, content, tags, comments_count)";
            $query .= "VALUES('{$category_id}', '{$title}', '{$author}', '{$today}', '{$image}', '{$content}', '{$tags}', '0')";

            $result = mysqli_query($connection, $query);
            if(!$result){
                die("Post could not be added to the database." . mysqli_error());
            }
        }
    }

    function deletePost(){
        global $connection;
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id={$id}";
            $result = mysqli_query($connection, $query);

            if($result){
                header('Location:posts.php');
            }
        }
    }

    function editPost(){
        global $connection;
        global $post;

        if(isset($_GET['edit']) && $_GET['edit']!=''){
            $post_id = $_GET['edit'];
            $query = "SELECT * FROM posts WHERE post_id=$post_id";

            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $post = $row;
                }
            }
            else {
                header('Location:posts.php');
            }
        }
        else {
            header('Location:posts.php');
        }

        if(isset($_POST['update'])){

            $post_id    = $_POST['post_id'];
            $category   = $_POST['category'];
            $author     = $_POST['author'];
            $title      = $_POST['title'];
            $content    = mysqli_real_escape_string($connection, $_POST['content']);
            $tags       = $_POST['tags'];
            $c_image    = $_POST['current_image'];
            $image      = $_FILES['image']['name'];
            $image_tmp  = $_FILES['image']['tmp_name'];

            $query = "UPDATE posts SET ";
            $query .= "post_cat_id = '$category', ";
            $query .= "title = '$title', ";
            $query .= "author = '$author', ";

            if(!empty($image)){
                move_uploaded_file($image_tmp, "../images/$image");
                if(!empty($c_image)) { unlink('../images/'.$c_image); }
                $query .= "image = '$image', ";
            }
            
            $query .= "content = '$content', ";
            $query .= "tags = '$tags' ";
            $query .= " WHERE post_id=$post_id";

            echo $query;

            $result = mysqli_query($connection, $query);

            if($result){
                header("Location: edit_post.php?edit={$post_id}");
            }
           
        }
    }

    function showCategoryOptions(){
        global $connection;
        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo "<option value='{$row['category_id']}'>{$row['title']}</option>";
            }
        }
    }

    function showCategoryOptionsByPost(){
        global $connection;
        global $post;
        $post_id = $_GET['edit'];

        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                if($row['category_id'] == $post['post_cat_id']){
                    echo "<option value='{$row['category_id']}' selected>{$row['title']}</option>";
                }
                else {
                    echo "<option value='{$row['category_id']}'>{$row['title']}</option>";
                }
                
            }
        }
    }

    function showPosts(){
        global $connection;
        $query = "SELECT * FROM posts";
        $result = mysqli_query($connection, $query);

        if($result){

            while($row=mysqli_fetch_assoc($result)){

                $cat_name = '';
                $comments_count = 0;

                $query2 = "SELECT title FROM categories WHERE category_id={$row['post_cat_id']}";
                $result2 = mysqli_query($connection, $query2);

                if($result2){
                    while($row2=mysqli_fetch_assoc($result2)){
                        $cat_name = $row2['title'];
                    }
                }
                else {
                    $cat_name = "Undefined";
                }

                $query3 = "SELECT COUNT(post_id) as count FROM comments WHERE post_id={$row['post_id']}";
                $result3 = mysqli_query($connection, $query3);
                
                if($result3){
                    while($row3=mysqli_fetch_assoc($result3)){
                        //print_r($row3);
                        //update comment count here...   
                        $query4 = "UPDATE posts SET comments_count={$row3['count']} WHERE post_id={$row['post_id']}";
                        $result4 = mysqli_query($connection, $query4);
                        
                        if(!$result){
                            die("Error updating comment count. ". mysqli_error($connection));
                        }
                        else {
                            $comments_count = $row3['count'];
                        }
                    }
                }

                echo "<tr>".
                        "<td>{$row['post_id']}</td>".
                        "<td>{$row['author']}</td>".
                        "<td>{$row['title']}</td>".
                        "<td>{$cat_name}</td>".
                        "<td>{$row['status']}</td>".
                        "<td><img width='100' src='../images/{$row['image']}'</td>".
                        "<td>{$row['tags']}</td>".
                        "<td>{$comments_count}</td>".
                        "<td>{$row['date']}</td>".
                        "<td>".
                            "<a href='edit_post.php?edit={$row['post_id']}'>".
                                "<button class='btn btn-primary'><i class='fa fa-pencil'></i></button>".
                            "</a>".
                            "&nbsp;&nbsp;".
                            "<a href='posts.php?delete={$row['post_id']}'>".
                                "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                            "</a>".
                        "</td>".
                      "</tr>";
            }
        }
    }

?>