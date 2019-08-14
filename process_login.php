<?php
session_start();
require_once "db.php";
echo $email = $_POST['email'];
echo $password = $_POST['password'];
$sql = "SELECT * FROM `customer` where `email`='$email' and `password` = '$password';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(!empty($row['email'])){
       $d=$_SESSION['uid'] = $row;
       
       if($d['type'] == "seller"){
        header('location:vendor_panel/post.php');
    }
    elseif($d['type'] == "admin"){
        header('location:admin_panel/index.php');
    }
    else{
        
        header('location:user_panel/index.php');
    }
}else{
	echo " <script>
    alert('USERNAME Or PASSWORD don`t Corrrect');
    window.open('login.php','_self');
</script>";
}
?>

