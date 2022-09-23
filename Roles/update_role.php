<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
admin_auth();
$id = $_GET['id'];
$select = "SELECT * FROM `roles` WHERE `id`=$id";
$result = mysqli_query($connication, $select);
$name = mysqli_fetch_assoc($result);
$name =  $name['decripation'];
//Update departmnet
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $update = "UPDATE `roles` SET `decripation`='$name' WHERE `id`=$id";
    mysqli_query($connication, $update);
    path('Roles/view_roles.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-7 mt-5 mx-auto">
            <form  method="POST">
                <input hidden name="id" value="<?= $id ?>">
                <div class="text-center">
                    <h2>Update Role</h2>
                </div>
                <div class="form-group">
                    <label for="name">Role Name </label><br>
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