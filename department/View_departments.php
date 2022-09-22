<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

// select all department
$slelct = "SELECT * FROM `departments`";
$query = mysqli_query($connication, $slelct);

//delete department
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select = "SELECT dip_id  FROM emp_dep_data";
    $result = mysqli_query($connication, $select);
    foreach ($result as $data) {
        if ($id != $data['dip_id']) {
            $delete_dep = "DELETE FROM `departments` WHERE `id`=$id";
            $t = mysqli_query($connication, $delete_dep);
            if ($t)
                path('department/View_departments.php');
        } else {
            echo "<div class ='alert alert-danger' role='alert'>
            Can't Delete This Department This Department have Emplyees
                 </div>";
                 break;

        }
    }
}



?>
<br>
<div class="text-center">
    <h2>View Departments </h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7 mt-5 mx-auto">
            <table class="table ">
                <thead class="thead-dark">
                    <th>#Department ID</th>
                    <th>Department Name</th>
                    <th>Action</th>
                    <th> </th>
                </thead>
                <?php
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><a onclick="return confirm('are u sure !!')" class="btn btn-danger" href="View_departments.php?delete=<?= $data["id"] ?>">Delete</a></td>
                        <td><a class="btn btn-primary" href="update_dep.php?id=<?= $data["id"] ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php';
?>