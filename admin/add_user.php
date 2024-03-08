<?php 
    include_once('templates/header.php'); 
    include_once('scripts/users.php'); 
    addUser();
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
                        Users
                        <small>Add User</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Add User

                        </li>
                    </ol>

                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input class="form-control" type="text" name="firstname" id="firstname">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input class="form-control" type="text" name="lastname" id="lastname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="subscriber">Subscriber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Add" name="addUser">
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
