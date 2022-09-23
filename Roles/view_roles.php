<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
admin_auth();
// select all department
$slelct = "SELECT * FROM `roles`";
$query = mysqli_query($connication, $slelct);
//delete department
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select = "SELECT id  FROM role_admin_data";
    $result = mysqli_query($connication, $select);
    foreach ($result as $data) {
        if ($id != $data['id']) {
            $delete_dep = "DELETE FROM `roles` WHERE `id`=$id";
            $t = mysqli_query($connication, $delete_dep);
            if ($t)
                path('Roles/View_roles.php');
        } else {
            echo "<div class ='alert alert-danger' role='alert'>
            Can't Delete This Role This Role have Admins
                 </div>";
                 break;

        }
    }
}

?>
<br>
<div class="text-center">
    <h2>View Roles </h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7 mt-5 mx-auto">
            <table class="table ">
                <thead class="thead-dark">
                    <th>#Role ID</th>
                    <th>Role Name</th>
                    <th>Action</th>
                    <th> </th>
                </thead>
                <?php
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['decripation'] ?></td>
                        <td><a class="btn btn-primary" href="update_role.php?id=<?= $data["id"] ?>">Edit</a></td>
                        <td><a class="btn btn-danger" onclick="return confirm('are u sure !!')" href="view_roles.php?delete=<?= $data["id"] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php';
?>