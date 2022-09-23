<?php
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/ODC%20BackEnd/s6/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Employees
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/employee/add_employee.php">Create New Employee</a>
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/employee/view_employee.php">List All Employees </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Departments
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/department/add_department.php">Create New Department</a>
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/department/View_departments.php">List All Departments</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Admins
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/admin/add_admin.php">Create New Admin</a>
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/admin/view_admins.php">List All Admins</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Roles
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/Roles/add_role.php">Create New Role</a>
                    <a class="dropdown-item" href="/ODC%20BackEnd/s6/Roles/View_roles.php">List All Role</a>
                </div>
            </li>
        </ul>
    </div>
    <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
            <button name="logout" class="btn btn-danger"> Logout </button>
        </form>
    <?php else : ?>
        <a href="/ODC%20BackEnd/s6/auth/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">login</a>
    <?php endif; ?>
</nav>