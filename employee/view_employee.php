<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
auth();
//select employees
$slelct = "SELECT * FROM `emp_dep_data` ORDER BY `employee_id`";
$query = mysqli_query($connication, $slelct);

//delete employee
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $selectOne = "SELECT * FROM employees where id =$id";
    $ss = mysqli_query($connication, $selectOne);
    $row = mysqli_fetch_assoc($ss);
    $delete = "DELETE FROM `employees` WHERE id=$id";
    $image = $row['image'];
    mysqli_query($connication, $delete);
    path('employee/view_employee.php');
    unlink("$image");
}
if(isset($_POST['search'])){
    $name=$_POST['name'];
    $name="'%".$name."%'";
    $select="SELECT * FROM `emp_dep_data` where `employee_name` like $name ";
    $query = mysqli_query($connication, $select);
}

?>
<br>
<div class="text-center">
    <h2>View Employees </h2>
</div>
<form  method="POST">
    <div class="input-group mx-5">
        <div class="form-outline">
            <input type="text" name="name" class="form-control" />
        </div>
        <button name='search' class="btn btn-primary mx-3"> search </button>
    </div>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-4 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <th>#ID</th>
                    <th>Name</th>
                </thead>
                <?php
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td>
                            <a class="dropdown-item text-dark" href="show_emp.php?show=<?= $data["employee_id"] ?>"><?= $data["employee_id"] ?></a>
                        </td>
                        <td>
                            <a class="dropdown-item text-dark" href="show_emp.php?show=<?= $data["employee_id"] ?>"><?= $data["employee_name"] ?></a>
                        </td>
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