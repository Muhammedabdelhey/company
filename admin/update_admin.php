<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
auth();
// select data to show on form
$id = $_GET['edit'];
$slelct = "SELECT * FROM `admins`   WHERE `id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$roleid = $data['role_id'];
$pass = $data['password'];
// Image code
$image_name = $data['image'];
$location = "$image_name";
if (!empty($_FILES['image']['name'])) {
    unlink("$image_name");
    $image_name = time()  . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);
}
//update employee
if (isset($_POST['update'])) {
    $upname = $_POST["upname"];
    $upemail = $_POST['upemail'];
    if ($_SESSION['admin']['role'] == 0) {
        $roleid = $_POST['uproleid'];
        if($roleid==1){
            $_SESSION['admin']['role'] =1;
        }
    }
    $update = "UPDATE `admins` SET `name`= '$upname',`email`='$upemail',`image`='$location',`password`='$pass',`role_id`=$roleid
     WHERE `id` = $id";
    mysqli_query($connication, $update);
    
    path('admin/view_admins.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>update </h2>
                </div>
                <div class="form-group">
                    <label for="upname">Admin Name </label><br>
                    <input type="text" class="form-control" name="upname" value="<?= $data["name"] ?>">
                </div>
                <div class="form-group">
                    <label for="upemail">Admin Email </label><br>
                    <input type="text" name="upemail" class="form-control" value="<?= $data["email"] ?>">
                </div>
                <div class="form-group">
                    <label for="">Admin Image : <img width="30" src="/ODC BackEnd/S6/admin/<?= $image_name ?>"></label>
                    <input class="form-control" type="file" name="image">
                </div>
                <?php if ($_SESSION['admin']['role'] == 0) { ?>
                    <div class="form-group">
                        <label for="uproleid">Role </label><br>
                        <select name="uproleid" class="form-control">
                            <?php
                            $slelct = "SELECT * FROM `roles`";
                            $query = mysqli_query($connication, $slelct);
                            foreach ($query as $data) {
                            ?>
                                <option value="<?= $data['id'] ?>" <?php if ($roleid == $data['id']) {
                                                                        echo "selected";
                                                                    } ?>>
                                    <?= $data["decripation"] ?>
                                </option>
                        <?php
                            }
                        } ?>

                        </select>
                        <br>
                        <button class="btn btn-info" name="update">Update Employee</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>