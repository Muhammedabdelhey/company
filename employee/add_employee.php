<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
// insert employee
auth();
if (isset($_POST["insert"])) {
    $name = $_POST["name"];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dipid = $_POST['dipid'];
    // Image code
    //create new name for image 
    $image_name = time()  . $_FILES['image']['name'];
    //get copy of  image from pc to server(upload folder )
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);

    $insert = "INSERT INTO `employees` VALUES (null,'$name','$email',$salary,'$phone','$location',$dipid)";
    $test = mysqli_query($connication, $insert);
    path('employee/add_employee.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Add Employees </h2>
                </div>
                <div class="form-group">
                    <label for="name">Employee Name </label><br>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Employee Email </label><br>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="salary">Employee Salary </label><br>
                    <input type="text" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Employee Phone </label><br>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Employee Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dipid">Department </label><br>
                    <select name="dipid" class="form-control">
                        <?php
                        $slelct = "SELECT * FROM `departments`";
                        $query = mysqli_query($connication, $slelct);
                        foreach ($query as $data) {
                        ?>
                            <option value="<?= $data['id'] ?>">
                                <?= $data["name"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-primary" name="insert">Insert Employee</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>