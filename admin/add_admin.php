<?php
include '../genral/DB.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
// insert employee
admin_auth();
if (isset($_POST["insert"])) {
    $name = $_POST["name"];
    $email = $_POST['email'];
    $pass=$_POST['pass'];
    $newpassword = sha1($pass);
    $roleid=$_POST['roleid'];
    // Image code
    //create new name for image 
    $image_name = time()  . $_FILES['image']['name'];
    //get copy of  image from pc to server(upload folder )
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);
    $insert = "INSERT INTO `admins` VALUES (null,'$name','$email','$location','$newpassword',$roleid)";
    $test = mysqli_query($connication, $insert);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Add Admin </h2>
                </div>
                <div class="form-group">
                    <label for="name">Admin Name </label><br>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Admin Email </label><br>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="salary">Admin Password </label><br>
                    <input type="text" name="pass" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Admin Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="roleid">Role </label><br>
                    <select name="roleid" class="form-control">
                        <?php
                        $slelct = "SELECT * FROM `roles`";
                        $query = mysqli_query($connication, $slelct);
                        foreach ($query as $data) {
                        ?>
                            <option value="<?= $data['id'] ?>">
                                <?= $data["decripation"] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-primary" name="insert">Insert Admin</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../shared/footer.php'
?>