<?php
include 'conn.php';
$name= $_POST['name'];
$email= $_POST['email'];
$password= $_POST['password'];
$sql = "INSERT INTO `log_in`( `USER_NAME`, `email`, `PASSWORD`) VALUES('$name', '$email', '$password')";
try {
    //code...
    $fire = mysqli_query($conn,$sql);
    if($fire){
        $sql = "SELECT * from log_in where email='$email' and password='$password' order by USER_ID desc limit 1";
        $fire = mysqli_query($conn,$sql);
        $uid = mysqli_fetch_array($fire)['USER_ID'];
        header("Location: ../index.php");
        setcookie('user',$name,time()+60*60*24*30,'/');
        setcookie('userid',$uid,time()+60*60*24*30,'/');
    }else{
        header("Location: ../register.php?tryagain=1");
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>