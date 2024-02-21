<?php 

    include_once('templates/header.php'); 

    $category = array();

    if(isset($_GET['edit']) && $_GET['edit']!=''){    

        $id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE category_id={$id}";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $category = $row;
            }
        }
        else {
            header('Location: categories.php');
        }
    }
    else {
        header('Location: categories.php');
    }  
    
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $query = "UPDATE categories SET title='{$title}' WHERE category_id={$id}";
        $result = mysqli_query($connection, $query);

        if($result){
            header("Location: edit_category.php?edit={$id}");
        }
    }

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
                            Category
                            <small>Edit Category</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Categories
                            </li>
                        </ol>
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input type="hidden" name="id" value="<?php echo $category['category_id']; ?>" />
                                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $category['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Update" name="update">
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
