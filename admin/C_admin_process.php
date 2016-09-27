<?php require 'connection.php'; ?>

<?php 
session_start();
if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$result = $dbCon->query("select * from admin where admin_username='$username' AND admin_password ='$password'");

$row = $result->fetch_array(MYSQLI_BOTH);

if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
                 
               if ($_POST['username'] == $row['admin_username'] && 
                    $_POST['password'] == $row['admin_password']) 
    
                        {
                        $_SESSION['user'] = $row['admin_name'];
                        $_SESSION['adminid'] = $row['admin_id'];

                        echo '<script language="javascript">';
                        echo 'alert("successfully logged in")';
                        echo '</script>';
                        header("Refresh: 0; url=dashboard.php");

                         } else {
                         echo '<script language="javascript">';
                         echo 'alert("wrong username or password")';
                         echo '</script>';
                         header("Refresh: 0; url=dashboard.php");


}
} 
}
?>