<?php include_once('templates/header.php'); ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('templates/navbar.php'); ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Categories
                            <small>Add & View Categories</small>
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
                                <?php 
                                    include_once('scripts/categories.php'); 
                                    manageCategories();
                                ?>
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add Category" name="submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM categories";
                                        $result = mysqli_query($connection, $query);

                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                                echo "<tr>".
                                                        "<td>{$row['category_id']}</td>".
                                                        "<td>{$row['title']}</td>".
                                                        "<td>".
                                                            "<a href='edit_category.php?edit={$row['category_id']}'>".
                                                                "<button class='btn btn-primary'><i class='fa fa-pencil'></i></button>".
                                                            "</a>".
                                                            "&nbsp;&nbsp;".
                                                            "<a href='categories.php?delete={$row['category_id']}'>".
                                                                "<button class='btn btn-danger'><i class='fa fa-trash'></i></button>".
                                                            "</a>".
                                                        "</td>".
                                                      "</tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
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
