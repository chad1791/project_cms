<?php
    session_start();
    include_once('scripts/db.php');

    if(isset($_SESSION['user_id'])){
        header('location: admin/index.php');
        echo $_SESSION['user_id'];
    }
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

                <?php
                    include_once('scripts/category.php');
                    getPostsByCategoryId();            
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