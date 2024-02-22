<?php 
    include_once('templates/header.php'); 
    include_once('scripts/posts.php');
    addPost();    
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('templates/navbar.php'); ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                            <small>Add Post</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Posts 
                            </li>
                        </ol>
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <?php showCategoryOptions(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" rows="8" id="content" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input class="form-control" type="text" name="tags" id="tags">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add Post" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include_once('templates/footer.php'); ?>
