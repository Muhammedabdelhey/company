<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
//select employeesa

auth();
$ID = $_SESSION['admin']['id'];
$slelct = "SELECT * FROM `admins` where `id`=$ID";
$query = mysqli_query($connication, $slelct);
if ($_SESSION['admin']['role'] == 0) {
    $slelct = "SELECT * FROM `admins`";
    $query = mysqli_query($connication, $slelct);
}
//delete employee
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $selectOne = "SELECT * FROM admins where id =$id";
    $ss = mysqli_query($connication, $selectOne);
    $row = mysqli_fetch_assoc($ss);
    $delete = "DELETE FROM `admins` WHERE id=$id";
    $image = $row['image'];
    mysqli_query($connication, $delete);
    path('admin/view_admins.php');
    unlink("$image");
    if ($_SESSION['admin']['role'] != 0) {
        session_unset();
        session_destroy();
    }
}


?>
<br>
<div class="text-center">
    <h2>View Admins </h2>
</div>
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
                            <a class="dropdown-item text-dark" href="show_admin.php?show=<?= $data["id"] ?>"><?= $data["id"] ?></a>
                        </td>
                        <td>
                            <a class="dropdown-item text-dark" href="show_admin.php?show=<?= $data["id"] ?>"><?= $data["name"] ?></a>
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