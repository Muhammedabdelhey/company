<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
auth();
// select data to show on form
$id = $_GET['edit'];
$slelct = "SELECT * FROM `employees`   WHERE `id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$dipid = $data['depid'];
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
    $upsalary = $_POST['upsalary'];
    $upphone = $_POST['upphone'];
    $upemail = $_POST['upemail'];
    $updipid = $_POST['updipid'];
    $update = "UPDATE `employees` SET `name`= '$upname',`email`='$upemail',`salary`= $upsalary,`phone`= '$upphone',`image`='$location',`depid`=$updipid
     WHERE `id` = $id";
    mysqli_query($connication, $update);
    path('employee/view_employee.php');
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
                    <label for="upname">Employee Name </label><br>
                    <input type="text" class="form-control" name="upname" value="<?= $data["name"] ?>">
                </div>
                <div class="form-group">
                    <label for="upemail">Employee Email </label><br>
                    <input type="text" name="upemail" class="form-control" value="<?= $data["email"] ?>">
                </div>
                <div class="form-group">
                    <label for="upsalary">Employee Salary </label><br>
                    <input type="text" name="upsalary" class="form-control" value="<?= $data["salary"]  ?>">
                </div>
                <div class="form-group">
                    <label for="upphone">Employee Phone </label><br>
                    <input type="text" name="upphone" class="form-control" value="<?= $data["phone"] ?>">
                </div>
                <div class="form-group">
                    <label for="">Employee Image : <img width="30" src="/ODC BackEnd/S6/employee/<?= $image_name ?>"></label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="updipid">Department </label><br>
                    <select name="updipid" class="form-control">
                        <?php
                        $slelct = "SELECT * FROM `departments`";
                        $query = mysqli_query($connication, $slelct);
                        foreach ($query as $data) {
                        ?>
                            <option value="<?= $data['id'] ?>" <?php if ($dipid == $data['id']) {
                                                                    echo "selected";
                                                                } ?>>
                                <?= $data["name"] ?>
                            </option>
                        <?php
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