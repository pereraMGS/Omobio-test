<?php
include "config.php";
?>
<?php
session_start();
// Escape user inputs for security
$email = $_POST["email"];
$Password = $_POST["password"];

$sql = "select * from register where email='" . $email . "' and password='" . $Password . "'";
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records == 0) {

 $_SESSION['loginStatus'] = 0;
 header("location:login.php");
} else {
 $_SESSION['loginStatus'] = 1;
 $_SESSION['email'] = $email;
 header("location:index1.php");
}
mysqli_close($conn);


?>