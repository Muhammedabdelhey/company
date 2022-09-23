<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
auth();
$id=$_GET['show'];
$slelct = "SELECT * FROM `admins` where  `id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$name=$data['name'];
$email=$data['email'];
$role_id=$data['role_id'];
$image=$data['image'];
?>
<section style="background-color: #eee;">
    <div class="text-center">
        <br>
        <h2> Admin Data </h2>
    </div>
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/ODC BackEnd/S6/admin/<?=$image?>" alt="" width="250" height='300' >
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$name?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$email?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Role_ID</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$role_id?></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center ">
        <a class="btn btn-info mx-3" href="update_admin.php?edit=<?= $data["id"] ?>">Edit</a>
        <a class="btn btn-danger" onclick="return confirm('are u sure !!')" href="view_admins.php?delete=<?= $data["id"] ?>">Delete</a>
    </div>
</section>
<?php
include '../shared/footer.php'
?>