<?php

    include_once('scripts/db.php');

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
    <h4>Blog Search</h4>
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

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php 
                
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($connection, $query);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<li><a href='#'>{$row['title']}</a></li>";
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
    <h4>Recent Blog Posts</h4>
    <?php 
        $query = "SELECT title, content FROM posts";
        $result = mysqli_query($connection, $query);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                echo "<h5>{$row['title']}</h5>".
                     "<p>{$row['content']}</p>";
            }
        }
    ?>
    
</div>

</div>