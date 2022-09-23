<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
auth();
$id=$_GET['show'];
$slelct = "SELECT * FROM `emp_dep_data` where  `employee_id`=$id";
$query = mysqli_query($connication, $slelct);
$data = mysqli_fetch_assoc($query);
$name=$data['employee_name'];
$email=$data['email'];
$phone=$data['phone'];
$salary=$data['salary'];
$dep_name=$data['dip_name'];
$image=$data['image'];
?>
<section style="background-color: #eee;">
    <div class="text-center">
        <br>
        <h2> Employee Data </h2>
    </div>
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/ODC BackEnd/S6/employee/<?=$image?>" alt="" width="250" height='300' >
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
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$phone?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">salary</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$salary?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Department</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$dep_name?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center ">
        <a class="btn btn-info mx-3" href="update_emp.php?edit=<?= $data["employee_id"] ?>">Edit</a>
        <a class="btn btn-danger" onclick="return confirm('are u sure !!')" href="view_employee.php?delete=<?= $data["employee_id"] ?>">Delete</a>
    </div>
</section>
<?php
include '../shared/footer.php'
?>