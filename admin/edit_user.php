<?php 
    include_once('templates/header.php'); 
    include_once('scripts/users.php');
    $user = array();
    editUser();  
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
                            <small>Edit User</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Users 
                            </li>
                        </ol>
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" id="username" value="<?php if(count($user)>0){ echo $user['username']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="text" name="password" id="password" value="<?php if(count($user)>0){ echo $user['password']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input class="form-control" type="text" name="firstname" id="firstname" value="<?php if(count($user)>0){ echo $user['firstname']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input class="form-control" type="text" name="lastname" id="lastname" value="<?php if(count($user)>0){ echo $user['lastname']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" value="<?php if(count($user)>0){ echo $user['email']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Current Image</label><br/>
                                    <img src="./images/<?php if(count($user)>0){ echo $user['image']; } ?>" width="120" />
                                    <input type="hidden" name="current_image" value="<?php if(count($user)>0){ echo $user['image']; } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input class="form-control" type="hidden" name="user_id" id="user_id" value="<?php if(count($user)>0){ echo $user['user_id']; } ?>">
                                    <select class="form-control" id="role" name="role">
                                        <?php 
                                            if(count($user)>0){
                                                if($user['role']=='admin'){
                                                    echo '<option value="admin" selected>Admin</option>'.
                                                         '<option value="subscriber">Subscriber</option>';
                                                } 
                                                elseif($user['role']=='subscriber'){
                                                    echo '<option value="admin">Admin</option>'.
                                                         '<option value="subscriber" selected>Subscriber</option>';
                                                    
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <?php 

                                            if(count($user)>0){
                                                if($user['status']=='0'){
                                                    echo '<option value="0" selected>Inactive</option>'.
                                                         '<option value="1">Active</option>';
                                                } 
                                                elseif($user['status']=='1'){
                                                    echo '<option value="0">Inactive</option>'.
                                                         '<option value="1" selected>Active</option>';
                                                    
                                                }
                                            }
                                        
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Update User" name="update">
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
