<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

$id = $_GET['id'];
$select = "SELECT id, `name` FROM `departments` WHERE `id`=$id";
$result = mysqli_query($connication, $select);
$name = mysqli_fetch_assoc($result);
$name =  $name['name'];
//Update departmnet
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $update = "UPDATE `departments` SET `name`='$name' WHERE `id`=$id";
    mysqli_query($connication, $update);
    path('department/View_departments.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-7 mt-5 mx-auto">
            <form  method="POST">
                <input hidden name="id" value="<?= $id ?>">
                <div class="text-center">
                    <h2>Update Department</h2>
                </div>
                <div class="form-group">
                    <label for="name">Department Name </label><br>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>">
                </div>
                <button class="btn btn-info" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>