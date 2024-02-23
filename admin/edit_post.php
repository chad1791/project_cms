<?php 
    include_once('templates/header.php'); 
    include_once('scripts/posts.php');
    $post = array();
    editPost();  
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
                            <small>Edit Post</small>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input class="form-control" type="hidden" name="post_id" id="post_id" value="<?php if(count($post)>0){ echo $post['post_id']; } ?>">
                                    <select class="form-control" id="category" name="category">
                                        <?php showCategoryOptionsByPost(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input class="form-control" type="text" name="author" id="author" value="<?php if(count($post)>0){ echo $post['author']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control" type="text" name="title" id="title" value="<?php if(count($post)>0){ echo $post['title']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" rows="8" id="content" name="content"><?php if(count($post)>0){ echo $post['content']; } ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input class="form-control" type="text" name="tags" id="tags" value="<?php if(count($post)>0){ echo $post['tags']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Current Image</label><br/>
                                    <img src="../images/<?php if(count($post)>0){ echo $post['image']; } ?>" width="120" />
                                    <input type="hidden" name="current_image" value="<?php if(count($post)>0){ echo $post['image']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Update Post" name="update">
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
