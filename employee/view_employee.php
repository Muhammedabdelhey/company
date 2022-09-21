<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

//select employees
$slelct = "SELECT * FROM `emp_dep_data` ORDER BY `employee_id`";
$query = mysqli_query($connication, $slelct);

//delete employee
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `employees` WHERE id=$id";
    mysqli_query($connication, $delete);
    path('employee/view_employee.php');
  }

//update employee
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $upname = $_POST["upname"];
    $upsalary = $_POST['upsalary'];
    $upphone = $_POST['upphone'];
    $upemail = $_POST['upemail'];
    $updipid = $_POST['updipid'];
    $update = "UPDATE `employees` SET `name`= '$upname',`email`='$upemail',`salary`= $upsalary,`phone`= '$upphone',`depid`=$updipid
     WHERE `id` = $id";
    mysqli_query($connication, $update);
    path('employee/view_employee.php');
  }

?>
<br>
<div class="text-center">
    <h2>View Employees </h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Phone</th>
                    <th>Department Name</th>
                    <th>Action</th>
                    <th> </th>
                </thead>
                <?php
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data["employee_id"] ?></td>
                        <td><?php echo $data["employee_name"] ?></td>
                        <td><?php echo $data["email"] ?></td>
                        <td><?php echo $data["salary"] ?></td>
                        <td><?php echo $data["phone"] ?></td>
                        <td><?php echo $data["dip_name"] ?></td>
                        <td><a class="btn btn-primary" href="update_emp.php?edit=<?= $data["employee_id"] ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="view_employee.php?delete=<?= $data["employee_id"] ?>">Delete</a></td>

                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>