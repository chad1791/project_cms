<?php
    include_once('scripts/db.php');
?>

    <!-- Header -->
    <?php include_once('templates/header.php'); ?>

    <!-- Navigation -->
    <?php include_once('templates/navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php
                    include_once('scripts/db.php'); 
                    $query = "SELECT * FROM posts";

                    $result = mysqli_query($connection, $query);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){

                            $title = $row['title'];
                            $author = $row['author'];
                            $date = $row['date'];
                            $image = $row['image'];
                            $content = $row['content'];

                            echo '<h2>'.
                                    '<a href="#">'.$title.'</a>'.
                                '</h2>'.
                                '<p class="lead">'.
                                    'by <a href="index.php">'.$author.'</a>'.
                                '</p>'.
                                '<p><span class="glyphicon glyphicon-time"></span> Posted on '.$date.'</p>'.
                                '<hr>'.
                                '<img class="img-responsive" src="images/'.$image.'" alt="">'.
                                '<hr>'.
                                '<p>'.$content.'</p>'.
                                '<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';
                        }
                    }                
                ?>                

                <!-- <hr>        -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include_once('templates/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

        <?php include_once('templates/footer.php'); ?>