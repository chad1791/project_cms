<?php

    include_once('scripts/login.php');

    if(isset($_POST['submit'])){
        $search = $_POST['search'];

        $query = "SELECT * FROM posts WHERE tags LIKE '%$search%'";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo '<pre>';
                print_r($row);
                echo '<pre>';
            }
        }
    }
?>

<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4><strong>Blog Search</strong></h4>
    <form action="" method="POST">
        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Login Well -->
<div class="well">
    <h4><strong>Login</strong></h4>
    <form action="scripts/login.php" method="POST">
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        </div>
        <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="login">
                    <span class="">Submit</span>
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4><strong>Blog Categories</strong></h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php 
                
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($connection, $query);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<li><a href='category.php?id={$row['category_id']}'>{$row['title']}</a></li>";
                        }
                    }

                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4><strong>Recent Blog Posts</strong></h4>
    <?php 
        $query = "SELECT post_id, title, content FROM posts WHERE status = 'published'";
        $result = mysqli_query($connection, $query);
        if($result){
            while($row=mysqli_fetch_assoc($result)){

                $short_content = substr($row['content'], 0, 150);

                echo "<h5><strong><a href='post.php?id={$row['post_id']}'>{$row['title']}</a></strong></h5>".
                     "<p>{$short_content}</p>";
            }
        }
    ?>
    
</div>

</div>