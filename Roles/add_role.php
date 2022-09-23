<?php 
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
admin_auth();
if (isset($_GET['add']) && !empty($_GET['name'])) {
    $role = $_GET['name'];
    $insert = "INSERT INTO `roles` VALUES(null,'$role')";
    $insertDepartment=mysqli_query($connication, $insert);
    testMessage($insertDepartment, "insert Department");
    if($insertDepartment){
    path('Roles/add_role.php');
    }

}
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3 mx-auto">
                <form>
                    <div class="text-center">
                        <h2>Add Role</h2>
                    </div>
                    <div class="form-group">
                        <label for="name">Role Name </label><br>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <button class="btn btn-primary" name="add">Add </button>
                </form>
            </div>
        </div>
    </div>
<?php
include '../shared/footer.php'
?>