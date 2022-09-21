<?php 
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if (isset($_GET['add']) && !empty($_GET['name'])) {
    $depname = $_GET['name'];
    $insert = "INSERT INTO `departments` VALUES(null,'$depname')";
    $insertDepartment=mysqli_query($connication, $insert);
    testMessage($insertDepartment, "insert Department");
    if($insertDepartment){
    path('department/add_department.php');
    }

}
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3 mx-auto">
                <form>
                    <div class="text-center">
                        <h2>Admin</h2>
                    </div>
                    <div class="form-group">
                        <label for="name">Department Name </label><br>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <button class="btn btn-primary" name="add">Add Department</button>
                </form>
            </div>
        </div>
    </div>
<?php
include '../shared/footer.php'
?>