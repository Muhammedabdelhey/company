<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
// select data to show on form
$id = $_GET['edit'];
$slelct = "SELECT * FROM `employees`   WHERE `id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$name = $data["name"];
$salary = $data["salary"];
$phone =  $data["phone"];
$email = $data["email"];
$dipid = $data['depid'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <form action="view_employee.php" method="POST">
                <input hidden name="id" value="<?= $id ?>">
                <div class="text-center">
                    <h2>update </h2>
                </div>
                <div class="form-group">
                    <label for="upname">Employee Name </label><br>
                    <input type="text" class="form-control" name="upname" value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <label for="upemail">Employee Email </label><br>
                    <input type="text" name="upemail" class="form-control" value="<?= $email ?>">
                </div>
                <div class="form-group">
                    <label for="upsalary">Employee Salary </label><br>
                    <input type="text" name="upsalary" class="form-control" value="<?= $salary ?>">
                </div>
                <div class="form-group">
                    <label for="upphone">Employee Phone </label><br>
                    <input type="text" name="upphone" class="form-control" value="<?= $phone ?>">
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