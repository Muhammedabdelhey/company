<?php
function testMessage($connication, $message)
{
    if ($connication) {
        echo "<div class='alert alert-success mx-auto w-50'>
      $message True Proccess
      </div>";
    } else {
        echo "<div class='alert alert-danger mx-auto w-50'>
        $message False Proccess
        </div>";
    }
}


function path($go)
{
    echo "<script>
    location.replace('/ODC%20BackEnd/s6/$go')
    </script>";
}
function auth()
{
    if (!$_SESSION['admin']) {
        path("auth/login.php");
        return false;
    }
    return true;
}
function admin_auth(){
    auth();
    if ($_SESSION['admin']['role'] != 0) {
        path('404.php');
        return false;
    }
    return true;
}
