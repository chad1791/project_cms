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
                    include_once('scripts/posts.php');
                    showAllPosts();              
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